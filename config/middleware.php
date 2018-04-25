<?php

use App\Factory\JsonResponseFactory;
use App\JwtAuthRules\PassthroughRule;
use App\Service\Permissions;
use App\Service\Role;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Middleware\JwtAuthentication;
use Symfony\Component\Translation\Translator;

$container = $app->getContainer();

//
$app->add(function (Request $request, Response $response, $next) use ($container) ***REMOVED***
    $locale = $request->getAttribute('lang');
    $translator = $container->get(Translator::class);
    $resource = __DIR__ . '/../resources/locale/' . $locale . '_messages.mo';
    $translator->setLocale($locale);
    $translator->setFallbackLocales(['en_US']);
    $translator->addResource('mo', $resource, $locale);
    return $next($request, $response);
***REMOVED***);

$app->add(function (Request $request, Response $response, $next) use ($container) ***REMOVED***
    $whitelist = $container->get('settings')->get('language_whitelist');

    $language = $request->getParam('lang');
    $language = !empty($language) ? $language : $request->getHeader('X-App-Language');

    if (empty($language)) ***REMOVED***
        // Browser language
        $language = array_key_exists(0, $request->getHeader('accept-language')) ? $request->getHeader('accept-language')[0] : 'de-CH,';
        $language = explode(',', $language)[0];
        $language = explode('-', $language)[0];
***REMOVED***

    $language = !empty($language) ? $language : 'de';
    $language = $whitelist[$language];

    if (empty($language)) ***REMOVED***
        $language = 'de';
        //throw new \Slim\Exception\NotFoundException($request, $response);
***REMOVED***

    $request = $request->withAttribute('lang', $language);

    return $next($request, $response);
***REMOVED***);

$jwt = $container->get('settings')->get('jwt');
if ($jwt['active']) ***REMOVED***
    $secret = $container->get('settings')->get('jwt')['secret'];
    $app->add(new JwtAuthentication([
        'secret' => $secret,
        'header' => 'X-Token',
        'message' => __('Authentication failed'),
        'callback' => function (Request $request, Response $response, array $arguments) use ($container) ***REMOVED***
            $container['jwt_decoded'] = $decoded = (array)$arguments['decoded'];
            $method = $request->getMethod();
            $path = $request->getRequestTarget();
            // todo disable useless logging
            $container->get(\Monolog\Logger::class)->info(sprintf('[%s] %s checking permission ...', $method, $path));
            $permission = new Permissions();
            $userId = $decoded['data']->user_id;
            $level = $permission->***REMOVED***strtolower($method)***REMOVED***;
            // return true if the user has the correct permission
            return $container->get(Role::class)->hasPermission($level, $userId, $path, $method);
    ***REMOVED***,
        'error' => function (Request $request, Response $response, $message) use ($container) ***REMOVED***
            $userId = '[User ID not known]';
            if ($container->has('jwt_decoded')) ***REMOVED***
                $decoded = $container['jwt_decoded'];
                $userId = $decoded['data']->user_id;
        ***REMOVED***
            /** @var \Monolog\Logger $logger */
            $logger = $container->get(\Monolog\Logger::class);

            /** @var Request $request */
            $request = $container->get("request");
            $method = $request->getMethod();
            $route = $request->getRequestTarget();
            $ip = $request->getServerParam("REMOTE_ADDR");

            $error = sprintf("User %s tried to get [%s] %s from %s", $userId, $method, $route, $ip);
            $logger->error($error);
            $errorMessage = JsonResponseFactory::error(['message' => $message['message']]);
            return $response->withStatus(403)->withJson($errorMessage);
    ***REMOVED***,
        'rules' => [new PassthroughRule($container)],
    ]));
***REMOVED***

/**
 * Logging middleware
 */
$app->add(function (Request $request, Response $response, $next) use ($container) ***REMOVED***
    /**
     * @var \Monolog\Logger $logger
     */
    $logger = $container->get(Monolog\Logger::class . '_request');
    $method = $request->getMethod();
    $route = $request->getRequestTarget();
    /**
     * @var Response $response
     */
    $start = (int)(microtime(true) * 1000);
    $response = $next($request, $response);
    $end = (int)(microtime(true) * 1000);
    $time = $end - $start;
    $statusCode = $response->getStatusCode();
    // TODO find better solution to get $_SERVER data
    $ip = $request->getServerParam('REMOTE_ADDR');
    $userAgent = $request->getServerParam('HTTP_USER_AGENT');
    $xToken = $request->getHeader('X-Token')[0];

    $logger->info(sprintf(
        '(%s) %sms %s -> %s from %s (%s) using %s',
        $statusCode,
        $time,
        $method,
        $route,
        $ip,
        $userAgent,
        $xToken
    ));
    return $response;
***REMOVED***);

/**
 * Options middleware
 */
$app->add(function (Request $request, Response $response, $next) ***REMOVED***
    $method = $request->getMethod();
    if (strtoupper($method) == 'OPTIONS') ***REMOVED***
        return $response->withStatus(200);
***REMOVED***

    return $next($request, $response);
***REMOVED***);

/**
 * For CORS
 */
$app->add(function (Request $request, Response $response, $next) use ($container) ***REMOVED***
    /** @var Response $response */
    $response = $next($request, $response);
    $corsEnabled = $container->get('settings')->get('enableCORS');
    if ($corsEnabled) ***REMOVED***
        $response = $response->withHeader('Access-Control-Allow-Origin', 'http://localhost:4200')
            ->withHeader('Access-Control-Allow-Headers', 'X-App-Language, X-Token, Content-Type')
            ->withHeader('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
***REMOVED***
    return $response;
***REMOVED***);
