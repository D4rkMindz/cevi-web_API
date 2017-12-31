<?php
/**
 * Created by PhpStorm.
 * User: Björn Pfoster
 * Date: 30.12.2017
 * Time: 21:15
 */

namespace App\Service\Login;


use App\Repository\UserRepository;
use Slim\Container;

class LoginValidation
***REMOVED***
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * LoginValidation constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        $this->userRepository = $container->get(UserRepository::class);
***REMOVED***

    /**
     * Check if user can login.
     *
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function canLogin(string $username, string $password): bool
    ***REMOVED***
        if (is_email($username)) ***REMOVED***
            $canLogin = $this->userRepository->checkLoginByEmail($username, $password);
    ***REMOVED*** else ***REMOVED***
            $canLogin = $this->userRepository->checkLoginByUsername($username, $password);
    ***REMOVED***

        return $canLogin;
***REMOVED***
***REMOVED***
