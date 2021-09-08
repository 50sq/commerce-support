<?php

namespace FiftySq\Commerce\Support\Data\Concerns;

use FiftySq\Commerce\Support\Contracts\SkuGeneratorContract;
use Illuminate\Database\Eloquent\Model;

trait HasSku
{
    public static function bootHasSku()
    {
        static::creating(function (Model $model) {
            $model->sku = app(SkuGeneratorContract::class)->generate($model->product, $model);
        });
    }
}
