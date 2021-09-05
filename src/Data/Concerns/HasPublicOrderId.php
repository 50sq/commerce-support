<?php

namespace FiftySq\Commerce\Data\Concerns;

use FiftySq\Commerce\Contracts\OrderIdGeneratorContract;
use Illuminate\Database\Eloquent\Model;

trait HasPublicOrderId
{
    public static function bootHasPublicOrderId()
    {
        static::created(function (Model $model) {
            $model->forceFill([
                'public_order_id' => app(OrderIdGeneratorContract::class)->generate($model->customer, $model->cart),
            ])->save();
        });
    }
}
