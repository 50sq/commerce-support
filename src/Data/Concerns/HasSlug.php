<?php

namespace FiftySq\Commerce\Data\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasSlug
{
    public static function bootHasSlug()
    {
        static::creating(function (Model $model) {
            $model->slug = Str::slug($model->title);
        });
    }
}
