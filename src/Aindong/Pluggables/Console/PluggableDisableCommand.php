<?php

namespace Aindong\Pluggables\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;

class PluggableDisableCommand extends Command
{
    /**
     * @var string The console command name.
     */
    protected $name = 'pluggables:disable';

    /**
     * @var string The console command description.
     */
    protected $description = 'Disable a pluggable';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $pluggable = $this->argument('pluggable');

        if ($this->laravel['pluggables']->isEnabled($this->argument('pluggable'))) {
            $this->laravel['pluggables']->disable($pluggable);

            $this->info("Pluggable [{$pluggable}] was disabled successfully.");
        } else {
            $this->comment("Pluggable [{$pluggable}] is already disabled.");
        }
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['pluggable', InputArgument::REQUIRED, 'Pluggable slug.'],
        ];
    }
}
