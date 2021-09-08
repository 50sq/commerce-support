<?php

namespace FiftySq\Commerce\Support\Data;

class Order extends DataObject
{
    protected string $channel;
    protected string $id;
    protected array $items;
    protected string $status;
    protected ?BillingAddress $billingAddress;
    protected ?ShippingAddress $shippingAddress;

    private array $costs;
    private $externalOrderId;

    /**
     * Order constructor.
     *
     * @param  string  $channel
     * @param  string  $id
     * @param  array  $items
     * @param  string  $status
     */
    public function __construct(
        string $channel,
        string $id,
        array $items,
        string $status = 'draft'

    ) {
        $this->channel = $channel;
        $this->id = $id;
        $this->items = $items;
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getChannel(): string
    {
        return $this->channel;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @return mixed
     */
    public function getExternalOrderId()
    {
        return $this->externalOrderId;
    }

    /**
     * @param  mixed  $externalOrderId
     */
    public function setExternalOrderId($externalOrderId): void
    {
        $this->externalOrderId = $externalOrderId;
    }

    /**
     * @return array
     */
    public function getCosts(): array
    {
        return $this->costs;
    }

    /**
     * @param  array  $costs
     */
    public function setCosts(array $costs): void
    {
        $this->costs = $costs;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param  string  $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return BillingAddress|null
     */
    public function getBillingAddress(): ?BillingAddress
    {
        return $this->billingAddress;
    }

    /**
     * @param  BillingAddress|null  $billingAddress
     */
    public function setBillingAddress(?BillingAddress $billingAddress): void
    {
        $this->billingAddress = $billingAddress;
    }

    /**
     * @return ShippingAddress|null
     */
    public function getShippingAddress(): ?ShippingAddress
    {
        return $this->shippingAddress;
    }

    /**
     * @param  ShippingAddress|null  $shippingAddress
     */
    public function setShippingAddress(?ShippingAddress $shippingAddress): void
    {
        $this->shippingAddress = $shippingAddress;
    }
}
