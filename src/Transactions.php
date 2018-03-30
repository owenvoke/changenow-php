<?php

namespace pxgamer\ChangeNow;

/**
 * Class Transactions
 */
class Transactions
{
    use Traits\ApiCallable;

    /**
     * Retrieve transactions initiated by the active user.
     *
     * @return mixed
     */
    public function get()
    {
        return $this->call('transactions/'.$this->apiKey);
    }

    /**
     * Retrieve the status of a single transaction by its id.
     *
     * @param string $transactionId
     * @return mixed
     */
    public function status(string $transactionId)
    {
        return $this->call('transactions/'.$transactionId.'/'.$this->apiKey);
    }
}
