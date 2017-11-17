<?php

/**
 * Generates a normalized URI for the given path.
 *
 * @param string $path A path to use instead of the current one
 * @param boolean $full return absolute or relative url
 *
 * @return string The normalized URI for the path
 */
function baseurl($path = '', $full = false)***REMOVED***
    $scriptName = $_SERVER['SCRIPT_NAME'];
    $baseUri = dirname(dirname($scriptName));
    $result = str_replace('\\', '/', $baseUri) . $path;
    $result = str_replace('//', '/', $result);
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
function hosturl() ***REMOVED***
    $host = $_SERVER['SERVER_NAME'];
    $port = $_SERVER['SERVER_PORT'];
    $result = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != "off") ? "https://" : "http://";
    $result .= ($port == '80' || $port == '443') ? $host : $host . ":" . $port;
    return $result;
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