<?php

use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Middleware\JwtAuthentication;
use Symfony\Component\Translation\Translator;

$app = app();
$container = $app->getContainer();

//
$app->add(function (Request $request, Response $response, $next) use ($container) ***REMOVED***
    $locale = $request->getAttribute('lang');
    $translator = $container->get(Translator::class);
    $resource = __DIR__ . "/../resources/locale/" . $locale . "_messages.mo";
    $translator->setLocale($locale);
    $translator->setFallbackLocales(['en_US']);
    $translator->addResource('mo', $resource, $locale);
    return $next($request, $response);
***REMOVED***);

$app->add(function (Request $request, Response $response, $next) ***REMOVED***
    $whitelist = [
        'de' => 'de_CH',
        'fr' => 'fr_CH',
        'it' => 'it_CH',
        'en' => 'en_GB',
    ];

    $language = $request->getParam('lang');
    $language = !empty($language) ? $language : $request->getHeader('X-App-Language');

    if (empty($language)) ***REMOVED***
        // Browser language
        $language = $request->getHeader('accept-language')[0];
        $language = explode(',', $language)[0];
        $language = explode('-', $language)[0];
***REMOVED***

    $language = empty($language) ? $language : 'de';
    $language = $whitelist[$language];

    if (empty($language)) ***REMOVED***
        throw new \Slim\Exception\NotFoundException($request, $response);
***REMOVED***

    $request = $request->withAttribute('lang', $language);

    return $next($request, $response);
***REMOVED***);


if ($container->get('settings')->get('jwt')['active']) ***REMOVED***
    $secret = $container->get('settings')->get('jwt')['secret'];
    $passthrough = $container->get('settings')->get('jwt')['passthrough'];
    $app->add(new JwtAuthentication([
        'secret' => $secret,
        'passthrough' => $passthrough,
        'callback' => function ($request, $response, $arguments) use ($container) ***REMOVED***
            $container['jwt'] = $arguments['decoded'];
    ***REMOVED***,
    ]));
***REMOVED***
