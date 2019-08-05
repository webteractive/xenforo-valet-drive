<?php

class XenForoValetDriver extends ValetDriver
{
    /**
     * Determine if the driver serves the request.
     *
     * @param  string  $sitePath
     * @param  string  $siteName
     * @param  string  $uri
     * @return bool
     */
    public function serves($sitePath, $siteName, $uri)
    {
        return is_dir("{$sitePath}/public/src/XF");
    }

    /**
     * Determine if the incoming request is for a static file.
     *
     * @param  string  $sitePath
     * @param  string  $siteName
     * @param  string  $uri
     * @return string|false
     */
    public function isStaticFile($sitePath, $siteName, $uri)
    {
        if (file_exists("$sitePath/public/$uri")) {
            return $uri;
        }

        return false;
    }

    /**
     * Get the fully resolved path to the application's front controller.
     *
     * @param  string  $sitePath
     * @param  string  $siteName
     * @param  string  $uri
     * @return string
     */
    public function frontControllerPath($sitePath, $siteName, $uri)
    {
        // echo "<pre>";
        // print_r([$sitePath, $siteName, $uri]); exit;
        // if ($uri === '/admin') {
        //     return $sitePath . "/public/admin.php";
        // }

        $uris = [
            '/admin.php',
            '/css.php'
        ];

        if (in_array($uri, $uris)) {
            return $sitePath . "/public/{$uri}";
        }

        return $sitePath.'/public/index.php';
    }
}
