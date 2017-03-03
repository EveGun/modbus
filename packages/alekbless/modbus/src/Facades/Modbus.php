<?php

namespace Alekbless\Modbus\Facades;

use Illuminate\Support\Facades\Facade;

class Modbus extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'modbus';
    }
}
