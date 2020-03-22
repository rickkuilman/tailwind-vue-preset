<?php

namespace RickKuilman\TailwindVuePreset;

use Illuminate\Filesystem\Filesystem;
use Laravel\Ui\Presets\Preset as LaravelPreset;
use Illuminate\Support\Facades\File;

class TailwindVuePreset extends LaravelPreset
{
    public static function install()
    {
        static::ensureComponentDirectoryExists();
        static::updatePackages();
        static::updateScripts();
        static::updateExampleComponent();
        static::updateWelcomePage();
        static::updateBootstrapping();
        static::updateStyles();
        static::removeNodeModules();
    }

    /**
     * Update the javascript scripts.
     *
     * @return void
     */
    protected static function updateScripts()
    {
        copy(__DIR__ . '/stubs/resources/js/app.js', resource_path('js/app.js'));
    }

    /**
     * Update the example component.
     *
     * @return void
     */
    protected static function updateExampleComponent()
    {
        copy(
            __DIR__ . '/stubs/resources/js/components/ExampleComponent.vue',
            resource_path('js/components/ExampleComponent.vue')
        );
    }

    /**
     * Update the welcome page.
     *
     * @return void
     */
    protected static function updateWelcomePage()
    {
        copy(__DIR__ . '/stubs/resources/views/welcome.blade.php', resource_path('views/welcome.blade.php'));
    }

    /**
     * Update bootstrapping
     *
     * @return void
     */
    protected static function updateBootstrapping()
    {
        copy(__DIR__ . '/stubs/tailwind.config.js', base_path('tailwind.config.js'));
        copy(__DIR__ . '/stubs/webpack.mix.js', base_path('webpack.mix.js'));
    }

    /**
     * Update styles
     *
     * @return void
     */
    protected static function updateStyles()
    {
        tap(new Filesystem, function (Filesystem $filesystem) {
            $filesystem->deleteDirectory(resource_path('sass'));
            $filesystem->delete(public_path('js/app.js'));
            $filesystem->delete(public_path('css/app.css'));

            if (!$filesystem->isDirectory($directory = resource_path('css'))) {
                $filesystem->makeDirectory($directory, 0755, true);
            }
        });

        copy(__DIR__ . '/stubs/resources/css/app.css', resource_path('css/app.css'));
    }

    /**
     * Update gitignore with files that are generated
     *
     * @return void
     */
    public static function updateGitignore()
    {
        File::append(base_path('.gitignore'), "/public/js\n/public/css\n/public/mix-manifest.json\n");
    }

    /**
     * @param $packages
     * @return array
     */
    protected static function updatePackageArray($packages)
    {
        return $packages + [
                'vue-template-compiler' => '^2.6.11',
                'vue' => '^2.5.17',
                'laravel-mix-purgecss' => '^4.1',
                'laravel-mix-tailwind' => '^0.1.0',
                'tailwindcss' => '^1.0',
            ];
    }
}
