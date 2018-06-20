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
{
    private $passthrough;

    /**
     * PassthroughRule constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    {
        $this->passthrough = $container->get('settings')->get('jwt')['passthrough'];
    }

    /**
     * Invoke method.
     *
     * @param RequestInterface $request
     * @return bool true if the user MUST authenticate.
     * @throws NotFoundException
     */
    public function __invoke(RequestInterface $request)
    {
        $route = $request->getAttribute('route');
        if (empty($route)) {
            throw new NotFoundException($request, new Response());
        }
        $requestedRoute = $route->getPattern();
        $method = $request->getMethod();
        if (!isset($this->passthrough[$requestedRoute])) {
            return true;
        }
        $pass = in_array($method, (array)$this->passthrough[$requestedRoute]);
        return !$pass;
    }
}
