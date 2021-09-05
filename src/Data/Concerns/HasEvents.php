<?php

namespace FiftySq\Commerce\Data\Concerns;

use FiftySq\Commerce\Events\ProductCreated;

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
