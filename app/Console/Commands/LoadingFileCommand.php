<?php

namespace App\Console\Commands;

use App\Models\File;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class LoadingFileCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'loading:file {url}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Эта команда загружает файл на сайт.';

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
        $url = $this->argument('url');
        $file_full_path = 'public/upload/';
        $file_name = basename($url);

        Storage::disk('local')->put($file_full_path . $file_name, file_get_contents($url), 'public');
        File::addFile('files', ['url' => '/storage/upload/' . $file_name]);

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
