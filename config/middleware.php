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
            $permission = new Permissions();
            $userId = $decoded['data']->user_id;
            $level = $permission->***REMOVED***strtolower($method)***REMOVED***;
            $hasPermission = $container->get(Role::class)->hasPermission($level, $userId);
            if (!$hasPermission) ***REMOVED***
                return false;
        ***REMOVED***
            return true;
    ***REMOVED***,
        'error' => function (Request $request, Response $response, $message) ***REMOVED***
            $errorMessage = JsonResponseFactory::error(['message' => $message['message'], 'token' => $message['token']]);
            return $response->withStatus(403)->withJson($errorMessage);
    ***REMOVED***,
        'rules' => [new PassthroughRule($container)],
    ]));
***REMOVED***


$app->add(function (Request $request, Response $response, $next) use ($container) ***REMOVED***
    $response = $next($request, $response);
    $response = $response->withHeader('Access-Control-Allow-Origin', 'http://localhost:4200');
    return $response;
***REMOVED***);
