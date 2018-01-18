<?php

namespace BDD\Context\Domain;

use AppBundle\Calculator;
use BDD\Service\SharedStorageInterface;
use Behat\Behat\Context\Context;
use Webmozart\Assert\Assert;

final class CalculatorContext implements Context
{
    /**
     * @var SharedStorageInterface
     */
    private $sharedStorage;

    /**
     * @var Calculator
     */
    private $calculator;

    public function __construct(Calculator $calculator, SharedStorageInterface $sharedStorage)
    {
        $this->calculator = $calculator;
        $this->sharedStorage = $sharedStorage;
    }

    /**
     * @When นำเลขใน :number1 กับ :number2 มาบวกกัน เก็บผลลัพธ์ลง ถังข้อมูล :key
     */
    public function addNumber($number1, $number2, $key)
    {
        $this->sharedStorage->set($key, $this->calculator->add($number1, $number2));
    }

    /**
     * @When นำเลขใน :number1 กับ :number2 มาลบกัน เก็บผลลัพธ์ลง ถังข้อมูล :key
     */
    public function subtractNumber($number1, $number2, $key)
    {
        $this->sharedStorage->set($key, $this->calculator->subtract($number1, $number2));
    }

    /**
     * @When นำเลขใน :number1 กับ :number2 มาคูณกัน เก็บผลลัพธ์ลง ถังข้อมูล :key
     */
    public function multiplyNumber($number1, $number2, $key)
    {
        $this->sharedStorage->set($key, $this->calculator->multiply($number1, $number2));
    }

    /**
     * @When นำเลขใน :number1 กับ :number2 มาหารกัน เก็บผลลัพธ์ลง ถังข้อมูล :key
     */
    public function divideNumber($number1, $number2, $key)
    {
        $this->sharedStorage->set($key, $this->calculator->divide($number1, $number2));
    }

    /**
     * @Then :resultInStorage จะต้องมีค่าเท่ากับ :resultExpect
     */
    public function assertResultEqual($resultInStorage, $resultExpect)
    {
        Assert::eq(floatval($resultInStorage), floatval($resultExpect));
    }
}
