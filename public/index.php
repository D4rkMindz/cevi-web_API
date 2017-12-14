<?php

use Monolog\Logger;

require_once __DIR__ . "/../config/bootstrap.php";

try ***REMOVED***
    app()->run();
***REMOVED*** catch (\Slim\Exception\MethodNotAllowedException $e) ***REMOVED***
***REMOVED*** catch (\Slim\Exception\NotFoundException $e) ***REMOVED***
***REMOVED*** catch (Exception $e) ***REMOVED***
***REMOVED***
if (!empty($e)) ***REMOVED***
    $logger = app()->getContainer()->get(Logger::class);
    $message = $e->getMessage() . "\n" . $e->getTraceAsString();
    $logger->addAlert($message);
***REMOVED***
