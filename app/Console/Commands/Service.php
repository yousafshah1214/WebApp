<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class Service extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name} {interface?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Service Class for wrapping your Application/business logic separate.';

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
            $this->createClass_Interface();
        }
        else{
            $this->createClass();
        }

    }

    private function createClass_Interface()
    {
        $newclass = "<?php

namespace App\\Services;


use App\\Contracts\\Services\\" . $this->argument('interface') . ";

class " . $this->argument('name') . " extends BaseService implements " . $this->argument('interface') . "
{

}";

        $newInterface = "<?php

namespace App\\Contracts\\Services;


interface " . $this->argument('interface') . " extends BaseServiceInterface
{

}";
        // creates a service class
        Storage::disk('service')->put($this->argument('name') . ".php", $newclass);
        Storage::disk('serviceInterface')->put($this->argument('interface') . ".php", $newInterface);
    }

    private function createClass()
    {
        $newclass = "<?php

namespace App\\Services;


class " . $this->argument('name') . " extends BaseService
{

}";
        Storage::disk('service')->put($this->argument('name') . ".php", $newclass);
    }
}
