<?php

namespace Juicebox\Automatedpush\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\File;

class SetupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'automatedpush:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installs the test file to your local git setup to run automated tests on push.';

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
     *
     * @return int
     */
    public function handle()
    {
        if(!File::exists(base_path('.git/hooks/pre-push'))){
            File::copy(__DIR__ . '/../assets/run-tests.php', base_path('.git/hooks/pre-push'));
            $this->info('Git pre-push hook was added successfully.');
        }else{
            $this->warn('Git pre-push hook has already been added.');
        }
        return 0;
    }
}
