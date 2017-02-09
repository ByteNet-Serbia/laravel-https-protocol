<?php

/**
 * Created by Byte Net IT Company.
 *
 * PHP version 7.1
 *
 * @package ByteNet\LaravelHttpsProtocol
 * @author  Byte Net <office@bytenet.rs>
 * @license http://bytenet.rs/licenses/btnt-license-v1-0 BTNT-License v1.0
 * @link    http://bytenet.rs Byte Net IT company
 */

namespace ByteNet\LaravelHttpsProtocol;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use Route;


/**
 * Class HttpsProtocolServiceProvider
 *
 * @package ByteNet\LaravelHttpsProtocol
 */
class HttpsProtocolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // use the vendor configuration file as fallback
        $this->mergeConfigFrom(__DIR__ . '/config/bytenet/httpsProtocol.php', 'bytenet.httpsProtocol');

        $this->map();

        // -------------
        // PUBLISH FILES
        // -------------
        // publish config file
        $this->publishes([__DIR__.'/config' => config_path()], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Define the routes for the application.
     *
     * @param \Illuminate\Routing\Router $router
     *
     * @return void
     */
    public function map()
    {
        // register the 'HttpsProtocol' middleware
        Route::prependMiddlewareToGroup('web', app\Http\Middleware\ByteNetHttpsProtocol::class);
    }
}
