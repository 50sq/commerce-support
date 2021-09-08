<?php

namespace FiftySq\Commerce\Support\Contracts;

interface SkuGeneratorContract
{
    public static function generate($product, $variant);
}
