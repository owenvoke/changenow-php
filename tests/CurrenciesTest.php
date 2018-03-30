<?php

namespace pxgamer\ChangeNow;

use PHPUnit\Framework\TestCase;

/**
 * Class CurrenciesTest
 *
 * @coversDefaultClass \pxgamer\ChangeNow\Currencies
 */
class CurrenciesTest extends TestCase
{
    /**
     * @var Currencies
     */
    private $currencies;

    public function setUp()
    {
        $this->currencies = new Currencies();

        $this->currencies->setApiKey(getenv('CHANGENOW_API_KEY'));
    }

    /**
     * @covers ::get()
     */
    public function testCanGetCurrencies()
    {
        $result = $this->currencies->get();

        $first = $result[0];

        $this->assertInstanceOf(\stdClass::class, $first);
        $this->assertObjectHasAttribute('ticker', $first);
        $this->assertObjectHasAttribute('name', $first);
        $this->assertObjectHasAttribute('image', $first);
    }

    /**
     * @covers ::get()
     */
    public function testCanGetCurrenciesWithActiveOnly()
    {
        $result = $this->currencies->get(true);

        $first = $result[0];

        $this->assertInstanceOf(\stdClass::class, $first);
        $this->assertObjectHasAttribute('ticker', $first);
        $this->assertObjectHasAttribute('name', $first);
        $this->assertObjectHasAttribute('image', $first);
    }

    /**
     * @covers ::minimumAmount()
     */
    public function testCanGetMinimumAmount()
    {
        $result = $this->currencies->minimumAmount('btc', 'etc');

        $this->assertObjectHasAttribute('minAmount', $result);
    }

    /**
     * @covers ::exchangeAmount()
     */
    public function testCanGetExchangeAmount()
    {
        $result = $this->currencies->exchangeAmount('btc', 'etc', 1.0);

        $this->assertObjectHasAttribute('estimatedAmount', $result);
        $this->assertObjectHasAttribute('networkFee', $result);
        $this->assertObjectHasAttribute('serviceCommission', $result);
        $this->assertObjectHasAttribute('transactionSpeedForecast', $result);
    }
}
