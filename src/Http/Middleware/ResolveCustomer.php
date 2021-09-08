<?php

namespace FiftySq\Commerce\Support\Http\Middleware;

use Closure;
use FiftySq\Commerce\Support\Commerce;
use FiftySq\Commerce\Support\Contracts\CustomerContract;
use Illuminate\Http\Request;

class ResolveCustomer
{
    /**
     * Resolve the customer by authenticated user.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $customerSessionKey = $this->customerSessionKey();
        $customerSessionValue = $this->customerSessionValue();

        $search = $request->user() ? ['user_id' => $request->user()->id] : [];
        $values = $search;

        if ($value = $this->findExistingCustomer($customerSessionKey)) {
            $search = [$customerSessionValue => $value];
        }

        $customer = CustomerContract::updateOrCreate(array_filter($search), $values);

        $this->setSession($customer, $customerSessionKey, $customerSessionValue);

        $request = $request->merge(['customer' => $customer]);

        return $next($request);
    }

    /**
     * Find an existing customer if the session is active.
     *
     * @param $customerSessionKey
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Session\SessionManager|\Illuminate\Session\Store|mixed|null
     */
    protected function findExistingCustomer($customerSessionKey)
    {
        if (session()->isStarted() && session()->has($customerSessionKey)) {
            return session($customerSessionKey);
        }

        return null;
    }

    /**
     * Set the session if the session is active.
     *
     * @param CustomerContract $customer
     * @param $sessionKey
     * @param $sessionValue
     */
    protected function setSession(CustomerContract $customer, $sessionKey, $sessionValue)
    {
        if (session()->isStarted()) {
            session()->put($sessionKey, (string) $customer->{$sessionValue});
        }
    }

    /**
     * Key to be used for customer session.
     *
     * @return string
     */
    protected function customerSessionKey()
    {
        return Commerce::customerSessionKey();
    }

    /**
     * Customer value to be used for the session value.
     *
     * @return string
     */
    protected function customerSessionValue()
    {
        return Commerce::customerSessionValue();
    }
}
