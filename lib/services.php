<?php

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
function is_email(string $email): bool
***REMOVED***
    return filter_var($email, FILTER_VALIDATE_EMAIL);
***REMOVED***

function baseurl($path = '')
***REMOVED***
    $environment = container()->get('environment');
    $scriptName = $environment->get('SCRIPT_NAME');
    $baseUri = dirname(dirname($scriptName));
    $result = str_replace('\\', '/', $baseUri) . $path;
    $result = str_replace('//', '/', $result);
    return $result;
***REMOVED***

function preg_replace_array($pattern, $replacement, $subject, $limit = -1)
***REMOVED***
    if (is_array($subject)) ***REMOVED***
        foreach ($subject as &$value) $value = preg_replace_array($pattern, $replacement, $value, $limit);
        return $subject;
***REMOVED*** else ***REMOVED***
        return preg_replace($pattern, $replacement, $subject, $limit);
***REMOVED***
***REMOVED***

function array_value(string $key, array $array)
***REMOVED***
    if (array_key_exists($key, $array)) ***REMOVED***
        return $array[$key];
***REMOVED***
    return null;
***REMOVED***
