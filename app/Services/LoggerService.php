<?php

namespace App\Services;


use App\Contracts\Services\LoggerServiceInterface;
use Exception;
use Illuminate\Support\Facades\Log;

class LoggerService extends BaseService implements LoggerServiceInterface
{
    /**
     * Logs an exception
     *
     * @param Exception $e
     * @param $level
     * @return Exception
     * @throws Exception
     */
    public function logException(Exception $e,$level){
        if(env('APP_DEBUG')){
            /** @var Exception $e */
            throw $e;
        }
        else{
            $message = "{$level} level Error occur at {$e->getLine()} in file {$e->getFile()} and displays this message \"{$e->getMessage()}\"";
            Log::error($message);
        }
    }

    /**
     * @param string $message
     */
    public function logInfoMessage(string $message)
    {
        Log::info($message);
    }


}