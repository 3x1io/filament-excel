<?php

namespace io3x1\FilamentExcel\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;

class ExcelGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'filament:export {resource} {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new export for selected resource';

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
        $resourceName = $this->argument('resource');
        $modelName = $this->argument('model');

        //Get Resources File
        $resourcesPath = app_path('Filament/Resources/' . $resourceName . '.php');
        $modelPath = app_path('Models/' . $modelName . '.php');
        //Check if Resources Exist
        if (File::exists($resourcesPath)) {
            //Check if Model Exists
            if (File::exists($modelPath)) {
                //Generate Export
                Artisan::call('make:export ' . $modelName . 'sExport --model=' . $modelName);
                $this->info('The Export Class Has Generated');

                //Add Action To List Page For Import & Export
                $getFileContent = view('filament-excel-templates::actions', [
                    "resource" => $resourceName,
                    "model" => $modelName
                ]);

                $listResourcePath = app_path('Filament/Resources/' . $resourceName . '/Pages/List' . $modelName . 's.php');
                if (File::exists($listResourcePath)) {
                    File::put($listResourcePath, $getFileContent);

                    $this->info('The The Resource Class Has Updated');

                    //TODO START Import Excel
                } else {
                    $this->error('Can Not Found ListResources Path');
                }
            } else {
                $this->error('Sorry This Model Is Not Exist!');
            }
        } else {
            $this->error('Sorry This Resources Is Not Exist!');
        }


        return Command::SUCCESS;
    }
}
