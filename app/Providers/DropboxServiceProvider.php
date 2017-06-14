<?php
/**
 * Created by PhpStorm.
 * User: HuyenTran
 * Date: 6/15/2017
 * Time: 12:03 AM
 */

namespace App\Providers;

use Illuminate\Support\Facades\Storage;
use League\Flysystem\Filesystem;
use Spatie\Dropbox\Client as DropboxClient;
use Illuminate\Support\ServiceProvider;
use Spatie\FlysystemDropbox\DropboxAdapter;

class DropboxServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        Storage::extend('dropbox', function ($app, $config) {
            $client = new DropboxClient(
                $config['CsKUvSQmK0AAAAAAAAAAodEb_UpEiHsS7My-2ASZmjHAjLm39YENc5UjmvRczXUM']
            );

            return new Filesystem(new DropboxAdapter($client));
        });
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}