<?php

namespace FiftySq\Commerce\Data\Concerns;

use FiftySq\Commerce\Data\Models\Address;

trait HasAddresses
{
    public function addresses()
    {
        return $this->hasMany(Address::class, $this->prefix('customer_id'));
    }

    public function defaultAddress($type)
    {
        return $this->hasOne(Address::class, $this->prefix('customer_id'))
            ->ofMany(['id' => 'max'], fn ($query) => $query->where('is_default', true)->where('type', $type));
    }

    public function defaultBillingAddress()
    {
        return $this->defaultAddress(Address::TYPE_BILLING);
    }

    public function defaultShippingAddress()
    {
        return $this->defaultAddress(Address::TYPE_SHIPPING);
    }
}
