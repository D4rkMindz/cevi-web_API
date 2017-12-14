<?php

use Slim\Exception\NotFoundException;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Middleware\Session;

$app = app();
$container = $app->getContainer();

//$app->add(new Session($container->get('settings')->get('session')));
//
//$app->add(function (Request $request, Response $response, $next) use ($container) ***REMOVED***
//    $locale = $request->getAttribute('language');
//    if ($locale == 'de') ***REMOVED***
//        $locale = 'de_DE';
//***REMOVED***
//    $translator = $container->get(Translator::class);
//    $resource = __DIR__ . "/../resources/locale/" . $locale . "_messages.mo";
//    $translator->setLocale($locale);
//    $translator->setFallbackLocales(['en_US']);
//    $translator->addResource('mo', $resource, $locale);
//    return $next($request, $response);
//***REMOVED***);
//
//$app->add(function (Request $request, Response $response, $next) ***REMOVED***
//    $language = $request->getAttribute('language');
//    $hasLanguage = !empty($language);
//    if (empty($language)) ***REMOVED***
//        // Browser language
//        $language = $request->getHeader('accept-language')[0];
//        $language = explode(',', $language)[0];
//        $language = explode('-', $language)[0];
//***REMOVED***
//    $whitelist = [
//        'de' => 'de_CH',
//        'en' => 'en_US',
//    ];
//    if (!isset($whitelist[$language])) ***REMOVED***
//        throw new NotFoundException($request, $response);
//***REMOVED***
//    if (!$hasLanguage) ***REMOVED***
//        return $response->withRedirect($this->router->pathFor('root', ['language' => $language]));
//***REMOVED***
//    return $next($request, $response);
//***REMOVED***);
//
//$app->add(function (Request $request, Response $response, $next) ***REMOVED***
//    $route = $request->getAttribute('route');
//    if (empty($route)) ***REMOVED***
//        return $next($request, $response);
//***REMOVED***
//    $language = $route->getArgument('language');
//    $request = $request->withAttribute('language', $language);
//    return $next($request, $response);
//***REMOVED***);