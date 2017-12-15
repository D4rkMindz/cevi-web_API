<?php


namespace App\Repository;


use App\Table\PostcodeTable;
use Slim\Container;

class PostcodeRepository
***REMOVED***
    /**
     * @var PostcodeTable
     */
    private $postcodeTable;

    /**
     * PostcodeRepository constructor.
     * @param Container $container
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __construct(Container $container)
    ***REMOVED***
        $this->postcodeTable = $container->get(PostcodeTable::class);
***REMOVED***

    /**
     * Check if postcode exists in repository.
     *
     * @param string $postcode
     * @return bool true if found.
     */
    public function existsPostcode(string $postcode): bool
    ***REMOVED***
        return $this->postcodeTable->existsPostcode($postcode);
***REMOVED***
***REMOVED***
