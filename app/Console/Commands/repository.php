<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class repository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "make:repository {name} {interface?}";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make Repository for model';

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
     * @return mixed
     */
    public function handle()
    {
        if($this->argument('interface')){
            $this->createClassAnd_Interface();
        }
        else{
            $this->createClass();
        }

        $this->info("Repository Successfully Created.");
    }

    /**
     *  Create Class in App\Repositories folder with creating/implementing App\Repositories\Contracts interface.
     *
     */
    private function createClassAnd_Interface()
    {
$newClass = "<?php

namespace App\\Repositories;


class " . $this->argument('name') . " " . "implements " . $this->argument('interface') . "{

}";

$newInterface = "<?php

namespace App\\Repositories\\Contracts;


interface " . $this->argument('interface') . " {

}";

        Storage::disk('repo')->put($this->argument('name') . ".php", $newClass);
        Storage::disk('repoInterface')->put($this->argument('interface') . ".php", $newInterface);
    }

    /**
     *  Create Class in App\Repositories folder without creating/implementing interface.
     *
     */
    private function createClass()
    {
$newClass = "<?php

namespace App\\Repositories;


class " . $this->argument('name') . "{

}";

        Storage::disk('repo')->put($this->argument('name') . ".php", $newClass);
    }
}
