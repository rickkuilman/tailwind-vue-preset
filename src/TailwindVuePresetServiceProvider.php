<?php

namespace RickKuilman\TailwindVuePreset;

use Illuminate\Foundation\Console\PresetCommand;
use Illuminate\Support\ServiceProvider;

class TailwindVuePresetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        PresetCommand::macro('tailwind-vue', function (PresetCommand $command) {

            TailwindVuePreset::install();

            if ($command->confirm('Do you want to add the generated assets to .gitignore?', true)) {
                TailwindVuePreset::updateGitignore();
            }

            $command->info('Tailwind & Vue scaffolding installed successfully.');
            $command->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
        });
    }
}
