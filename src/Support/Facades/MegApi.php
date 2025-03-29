<?php

namespace Zhylon\MegapiClient\Support\Facades;

use Illuminate\Support\Facades\Facade;

class MegApi extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'megapi';
    }
}
