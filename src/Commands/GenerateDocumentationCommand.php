<?php

namespace MultidocLaravel\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;
use MultidocLaravel\Facades\MultidocLaravelFacade;

class GenerateDocumentationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'multidoc:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates the MultiDoc files';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $configuration = Config::get('multidoc');
        $this->info('Starting generation of documentation');
        MultidocLaravelFacade::generate(
            $configuration['input_folder'],
            public_path($configuration['public_output_path'])
        );
        $this->info('Documentation generation has ended');
    }
}