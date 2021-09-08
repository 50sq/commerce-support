<?php

namespace FiftySq\Commerce\Support\Data;

class Payment extends DataObject
{
    protected string $gatewayCheckoutId;
    protected int $amountCents;
    protected string $paymentStatus;

    /**
     * Payment constructor.
     *
     * @param  string  $gatewayCheckoutId
     * @param  int  $amountCents
     * @param  string  $paymentStatus
     */
    public function __construct(
        string $gatewayCheckoutId,
        int $amountCents,
        string $paymentStatus
    ) {
        $this->gatewayCheckoutId = $gatewayCheckoutId;
        $this->amountCents = $amountCents;
        $this->paymentStatus = $paymentStatus;
    }

    /**
     * @return string
     */
    public function getGatewayCheckoutId(): string
    {
        return $this->gatewayCheckoutId;
    }

    /**
     * @return int
     */
    public function getAmountCents(): int
    {
        return $this->amountCents;
    }

    /**
     * @return string
     */
    public function getPaymentStatus(): string
    {
        return $this->paymentStatus;
    }
}
