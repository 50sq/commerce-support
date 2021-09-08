<?php

namespace FiftySq\Commerce\Support\Data\Concerns;

use FiftySq\Commerce\Support\Events\ProductCreated;

trait HasEvents
{
    /**
     * @return array
     */
    public function getDispatchesEvents(): array
    {
        return array_merge([
            'created' => ProductCreated::class,
        ], $this->dispatchesEvents);
    }
}
