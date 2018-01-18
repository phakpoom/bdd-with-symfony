<?php

namespace BDD\Context\Transform;

use BDD\Service\SharedStorageInterface;
use Behat\Behat\Context\Context;

final class CalculatorContext implements Context
{
    /**
     * @var SharedStorageInterface
     */
    private $sharedStorage;

    /**
     * @param SharedStorageInterface $sharedStorage
     */
    public function __construct(SharedStorageInterface $sharedStorage)
    {
        $this->sharedStorage = $sharedStorage;
    }

    /**
     * @Transform /^ถังข้อมูล (.+)$/
     */
    public function getSymfonyParameter($key)
    {
        return $this->sharedStorage->get($key);
    }
}
