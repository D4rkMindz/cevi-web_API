<?php

namespace App\Service\Login;


use App\Repository\UserRepository;
use Slim\Container;

class LoginValidation
{
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
    {
        $this->userRepository = $container->get(UserRepository::class);
    }

    /**
     * Check if user can login.
     *
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function canLogin(string $username, string $password): bool
    {
        if (is_email($username)) {
            $canLogin = $this->userRepository->checkLoginByEmail($username, $password);
        } else {
            $canLogin = $this->userRepository->checkLoginByUsername($username, $password);
        }

        return $canLogin;
    }
}
