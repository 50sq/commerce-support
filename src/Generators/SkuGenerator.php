<?php

namespace FiftySq\Commerce\Support\Generators;

use FiftySq\Commerce\Support\Contracts\SkuGeneratorContract;
use Illuminate\Support\Str;

class SkuGenerator implements SkuGeneratorContract
{
    /**
     * Generate a new recovery code.
     *
     * @return string
     */
    public static function generate($product, $variant)
    {
        return Str::random(10).'-'.Str::random(10);
    }
}
