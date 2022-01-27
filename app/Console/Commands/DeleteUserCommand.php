<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class DeleteUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:user {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Удаляет пользователя';

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
        $id = $this->argument('id');
        User::deleteUser('users', $id);

        $items = range(1, 1);
        $progressBar = $this->output->createProgressBar(count($items));
        $progressBar->start();

        foreach ($items as $item){
            sleep(1);
            $progressBar->advance();
        }

        $progressBar->finish();
    }
}
