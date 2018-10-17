<?php

namespace pxgamer\ChangeNow;

/**
 * Class Currencies
 */
class Currencies
{
    use Traits\ApiCallable;

    /**
     * Retrieve the list of available currencies.
     *
     * @param bool $activeOnly
     * @return mixed
     */
    public function get(bool $activeOnly = false)
    {
        $data = [];
        if ($activeOnly) {
            $data['active'] = true;
        }
        
        return $this->call(
            'currencies',
            $data
        );
    }

    /**
     * Retrieve the minimal payment amount required to make an exchange.
     *
     * @param string $from
     * @param string $to
     *
     * @return mixed
     */
    public function minimumAmount(string $from, string $to)
    {
        return $this->call('min-amount/'.$from.'_'.$to);
    }

    /**
     * Retrieve the estimated exchange amount of coins to be received on the exchange.
     *
     * @param string $from
     * @param string $to
     * @param float  $amount
     *
     * @return mixed
     */
    public function exchangeAmount(string $from, string $to, float $amount)
    {
        return $this->call('exchange-amount/'.$amount.'/'.$from.'_'.$to);
    }
}
