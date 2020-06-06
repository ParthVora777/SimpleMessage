<?php

namespace ParthVora777\SimpleMessage;

use Illuminate\Support\ServiceProvider;

class SimpleMessageServiceProvider extends ServiceProvider
{
    const PACKAGE_NAME = 'parthvora777/simplemessage';

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $installedJsonFile = base_path('/vendor/composer/installed.json');
        if (file_exists($installedJsonFile)) {
            $installedPackages = json_decode(file_get_contents($installedJsonFile));
            foreach ($installedPackages as $installedPackage) {
                if (isset($installedPackage->name) && $installedPackage->name === self::PACKAGE_NAME) {
                    $simplemessage = '<div style="text-align: center;
                            background: lightgrey;
                            font-weight: bold;
                            padding: 10px;
                            border: dotted;">' .
                    'A simple message from ' . self::PACKAGE_NAME . ' ' . $installedPackage->version .
                        '</div>';

                    echo $simplemessage;
                }
            }
        }
    }
}
