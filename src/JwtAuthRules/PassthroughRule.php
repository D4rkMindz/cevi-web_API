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
        $requestedRoute = $request->getAttribute('route')->getPattern();
        $method = $request->getMethod();
        $pass = in_array($method, $this->passthrough[$requestedRoute]);
        return !$pass;
***REMOVED***
***REMOVED***
