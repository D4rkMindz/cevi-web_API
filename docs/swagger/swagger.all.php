<?php

if (!defined('SWAGGER_API_VERSION')) {
    define('SWAGGER_API_VERSION', 'v2');
}
if (!defined('SWAGGER_HOST')) {
    define('SWAGGER_HOST', 'https://api.cevi-web.com');
}
/**
 * @SWG\Swagger(
 *     schemes={"http"},
 *     host=SWAGGER_HOST,
 *     basePath="/",
 *     @SWG\Info(
 *          title="The API for CEVI Web",
 *          version="0.0.1"
 *     )
 * )
 *
 *
 * @SWG\Response(
 *     response="403",
 *     description="You've tried to access a location without authentication. Provide the X-Token!"
 * )
 */