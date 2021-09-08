<?php

namespace FiftySq\Commerce\Support\Data\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasUuid
{
    public static function bootHasUuid()
    {
        static::creating(function (Model $model) {
            $model->uuid = Str::uuid();
        });
    }
}
