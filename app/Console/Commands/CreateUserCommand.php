<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user {name} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $name = $this->argument('name');
        $email = $this->argument('email');
        $password = bcrypt($this->argument('password'));

        $data = [
            'username' => $name,
            'email' => $email,
            'password' => $password,
        ];

        User::add('users', $data);

        $items = range(1, 3);
        $progressBar = $this->output->createProgressBar(count($items));
        $progressBar->start();

        foreach ($items as $item){
            sleep(1);
            $progressBar->advance();
        }

        $progressBar->finish();
    }
}
