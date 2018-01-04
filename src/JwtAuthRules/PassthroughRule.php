<?php
/**
 * Created by PhpStorm.
 * User: Björn Pfoster
 * Date: 31.12.2017
 * Time: 17:34
 */

namespace App\JwtAuthRules;


use Psr\Http\Message\RequestInterface;
use Slim\Container;
use Slim\Exception\NotFoundException;
use Slim\Http\Response;
use Slim\Middleware\JwtAuthentication\RuleInterface;

class PassthroughRule implements RuleInterface
***REMOVED***
    private $passthrough;

    /**
     * PassthroughRule constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        $this->passthrough = $container->get('settings')->get('jwt')['passthrough'];
***REMOVED***

    /**
     * Invoke method.
     * @param RequestInterface $request
     * @return bool
     */
    public function __invoke(RequestInterface $request)
    ***REMOVED***
        $route = $request->getAttribute('route');
        if (empty($route)) ***REMOVED***
            throw new NotFoundException($request, new Response());
    ***REMOVED***
        $requestedRoute = $route->getPattern();
        $method = $request->getMethod();
        $pass = in_array($method, $this->passthrough[$requestedRoute]);
        return !$pass;
***REMOVED***
***REMOVED***
