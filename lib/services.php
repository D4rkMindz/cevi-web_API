<?php

/**
 * Generates a normalized URI for the given path.
 *
 * @param string $path A path to use instead of the current one
 * @param boolean $full return absolute or relative url
 *
 * @return string The normalized URI for the path
 */
function baseurl($path = '/', $full = false)
***REMOVED***
    $router = app()->getContainer()
        ->get('router');
    $result = $router->pathFor($path);
    if ($full === true) ***REMOVED***
        $result = hosturl() . $result;
***REMOVED***

    return $result;
***REMOVED***

/**
 * Returns current url
 *
 * @return string URL
 */
function hosturl()
***REMOVED***
    $serverName = app()->getContainer()
        ->get('request')
        ->getServerParam('SERVER_NAME');

    return is_secure() ? "https://" : "http://" . $serverName;
***REMOVED***

/**
 * Handling email
 *
 * This function is shortening for filter_var.
 *
 * @see filter_var()
 *
 * @param string $email to check
 *
 * @return mixed
 */
function is_email($email)
***REMOVED***
    return filter_var($email, FILTER_VALIDATE_EMAIL);
***REMOVED***

/**
 * Check if connection is secure.
 *
 * @return bool
 */
function is_secure()
***REMOVED***
    $https = app()->getContainer()
        ->get('request')
        ->getServerParam('HTTPS');

    return isset($https) && $https != "off";
***REMOVED***
