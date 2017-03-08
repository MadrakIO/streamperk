<?php

use Symfony\Component\HttpFoundation\Request;

/*
 * @var Composer\Autoload\ClassLoader
 */
$loader = require __DIR__.'/../app/autoload.php';
include_once __DIR__.'/../app/bootstrap.php.cache';

// Enable APC for autoloading to improve performance.
// You should change the ApcClassLoader first argument to a unique prefix
// in order to prevent cache key conflicts with other applications
// also using APC.
/*
$apcLoader = new Symfony\Component\ClassLoader\ApcClassLoader(sha1(__FILE__), $loader);
$loader->unregister();
$apcLoader->register(true);
*/

$environment = 'prod';
if (isset($_SERVER['HTTP_HOST']) === true && empty($_SERVER['HTTP_HOST']) === false) {
    $splitUpHost = explode('.', $_SERVER['HTTP_HOST']);
    if (count($splitUpHost) > 0) {
        $proposedEnvironment = $splitUpHost[0];
        if (strlen($proposedEnvironment) >= 3) {
            $multisiteConfig = __DIR__ . '/../app/config/multisite/' . $proposedEnvironment . '.yml';
            if (file_exists($multisiteConfig) === true) {
                $environment = $proposedEnvironment;
            }
        }
    }
}

$kernel = new AppKernel($environment, false);
$kernel->loadClassCache();
//$kernel = new AppCache($kernel);

// When using the HttpCache, you need to call the method in your front controller instead of relying on the configuration parameter
//Request::enableHttpMethodParameterOverride();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
