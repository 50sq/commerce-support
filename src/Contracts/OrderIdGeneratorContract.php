<?php

namespace FiftySq\Commerce\Support\Contracts;

interface OrderIdGeneratorContract
{
    public static function generate($customer, $cart);
}
