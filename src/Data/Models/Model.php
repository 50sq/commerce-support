<?php

namespace FiftySq\Commerce\Support\Data\Models;

use FiftySq\Commerce\Support\Commerce;
use FiftySq\Commerce\Support\Data\Concerns\HandlesSchemaNames;
use Illuminate\Database\Eloquent\Model as Eloquent;

abstract class Model extends Eloquent
{
    use HandlesSchemaNames;

    protected $guarded = [];

    /**
     * Prefix string with Commerce prefix.
     *
     * @param $string
     * @return string
     */
    protected function prefix($string): string
    {
        return Commerce::prefix($string);
    }
}
