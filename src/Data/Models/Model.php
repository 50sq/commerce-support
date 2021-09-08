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
     * @param $name
     * @return string
     */
    protected function prefix($name): string
    {
        return Commerce::prefix($name);
    }
}
