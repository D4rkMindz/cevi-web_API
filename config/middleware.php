<?php

use App\Factory\JsonResponseFactory;
use App\JwtAuthRules\PassthroughRule;
use App\Util\Permissions;
use App\Util\Role;
use Monolog\Logger;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Middleware\JwtAuthentication;
use Symfony\Component\Translation\Translator;

$container = $app->getContainer();

//
$app->add(function (Request $request, Response $response, $next) use ($container) {
    $locale = $request->getAttribute('lang');

    $translator = $container->get(Translator::class);
    $translator->setLocale($locale);
    return $next($request, $response);
});

$app->add(function (Request $request, Response $response, $next) use ($container) {
    $whitelist = $container->get('settings')->get('language_whitelist');

    $language = $request->getParam('lang');
    $language = !empty($language) ? $language : $request->getHeader('X-App-Language');
    if (!empty($language) && is_array($language)) {
        $language = $language[0];
    }

    if (empty($language)) {
        // Browser language
        $language = array_key_exists(0, $request->getHeader('accept-language')) ? $request->getHeader('accept-language')[0] : 'de-CH,';
        $language = explode(',', $language)[0];
        $language = explode('-', $language)[0];
    }

    $language = !empty($language) ? $language : 'de';

    $container->get(Logger::class)->info(sprintf(
        'Using language: %s(%s) for requesting %s',
        $language,
        $whitelist[$language],
        $request->getRequestTarget()
    ));

    $language = $whitelist[$language];

    if (empty($language)) {
        $language = 'de';
        //throw new \Slim\Exception\NotFoundException($request, $response);
    }

    $request = $request->withAttribute('lang', $language);

    return $next($request, $response);
});

$jwt = $container->get('settings')->get('jwt');
if ($jwt['active']) {
    $secret = $container->get('settings')->get('jwt')['secret'];
    $app->add(new JwtAuthentication([
        'secret' => $secret,
        'header' => 'X-Token',
        'message' => __('Authentication failed'),
        'callback' => function (Request $request, Response $response, array $arguments) use ($container) {
            $container['jwt_decoded'] = $decoded = (array)$arguments['decoded'];
            $method = $request->getMethod();
            $path = $request->getRequestTarget();
            // todo disable useless logging
            $container->get(\Monolog\Logger::class)->info(sprintf('[%s] %s checking permission ...', $method, $path));
            $permission = new Permissions();
            $userId = $decoded['data']->user_id;
            $level = $permission->{strtolower($method)};
            // return true if the user has the correct permission
            return $container->get(Role::class)->hasPermission($level, $userId, $path, $method);
        },
        'error' => function (Request $request, Response $response, $message) use ($container) {
            $userId = '[User ID not known]';
            if ($container->has('jwt_decoded')) {
                $decoded = $container['jwt_decoded'];
                $userId = $decoded['data']->user_id;
            }
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
        },
        'rules' => [new PassthroughRule($container)],
    ]));
}

/**
 * Logging middleware
 */
$app->add(function (Request $request, Response $response, $next) use ($container) {
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
    $xTokenHeader = $request->getHeader('X-Token');
    $xToken = is_array($xTokenHeader) && array_key_exists(0, $xTokenHeader) ? $xTokenHeader[0] : '';

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
});

/**
 * Options middleware
 */
$app->add(function (Request $request, Response $response, $next) {
    $method = $request->getMethod();
    if (strtoupper($method) == 'OPTIONS') {
        return $response->withStatus(200);
    }

    return $next($request, $response);
});

/**
 * For CORS
 */
$app->add(function (Request $request, Response $response, $next) use ($container) {
    /** @var Response $response */
    $response = $next($request, $response);
    $corsEnabled = $container->get('settings')->get('enableCORS');
    if ($corsEnabled) {
        $response = $response->withHeader('Access-Control-Allow-Origin', 'http://localhost:4200')
            ->withHeader('Access-Control-Allow-Headers', 'X-App-Language, X-Token, Content-Type')
            ->withHeader('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,OPTIONS');
    }
    return $response;
});
