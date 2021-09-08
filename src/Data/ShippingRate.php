<?php

namespace FiftySq\Commerce\Support\Data;

class ShippingRate extends DataObject
{
    protected string $id;
    protected string $name;
    protected string $rate;
    protected string $currency;
    protected int $minDays;
    protected int $maxDays;

    /**
     * ShippingRate constructor.
     *
     * @param  string  $id
     * @param  string  $name
     * @param  string  $rate
     * @param  string  $currency
     * @param  int  $minDays
     * @param  int  $maxDays
     */
    public function __construct(
        string $id,
        string $name,
        string $rate,
        string $currency,
        int $minDays,
        int $maxDays
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->rate = $rate;
        $this->currency = $currency;
        $this->minDays = $minDays;
        $this->maxDays = $maxDays;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getRate(): string
    {
        return $this->rate;
    }

    /**
     * @return string
     */
    public function getCurrency(): string
    {
        return $this->currency;
    }

    /**
     * @return int
     */
    public function getMinDays(): int
    {
        return $this->minDays;
    }

    /**
     * @return int
     */
    public function getMaxDays(): int
    {
        return $this->maxDays;
    }
}
