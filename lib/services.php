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
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function baseurl($path = '')
{
    $environment = container()->get('environment');
    $scriptName = $environment->get('SCRIPT_NAME');
    $baseUri = dirname(dirname($scriptName));
    $result = str_replace('\\', '/', $baseUri) . $path;
    $result = str_replace('//', '/', $result);
    return $result;
}

function preg_replace_array($pattern, $replacement, $subject, $limit = -1)
{
    if (is_array($subject)) {
        foreach ($subject as &$value) $value = preg_replace_array($pattern, $replacement, $value, $limit);
        return $subject;
    } else {
        return preg_replace($pattern, $replacement, $subject, $limit);
    }
}

function array_value(string $key, array $array)
{
    if (array_key_exists($key, $array)) {
        return $array[$key];
    }
    return null;
}
