<?php

namespace BDD\Context\Setup;

use BDD\Service\SharedStorageInterface;
use Behat\Behat\Context\Context;

final class StorageSetupContext implements Context
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
     * @Given ในถังข้อมูล :key มีเลข :number
     */
    public function setNumber($key, $number)
    {
        $this->sharedStorage->set($key, floatval($number));
    }
}
