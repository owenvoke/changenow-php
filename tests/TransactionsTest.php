<?php

namespace pxgamer\ChangeNow;

use PHPUnit\Framework\TestCase;

/**
 * Class TransactionsTest
 *
 * @coversDefaultClass \pxgamer\ChangeNow\Transactions
 */
class TransactionsTest extends TestCase
{
    /**
     * @var Transactions
     */
    private $transactions;

    public function setUp()
    {
        $this->transactions = new Transactions();

        $this->transactions->setApiKey(getenv('CHANGENOW_API_KEY'));
    }

    /**
     * @covers ::get()
     */
    public function testCanGetTransactions()
    {
        $result = $this->transactions->get();

        $this->assertInternalType('array', $result);
    }
}
