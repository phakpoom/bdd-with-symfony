<?php

namespace BDD\Context\Hook;

use BDD\Service\SharedStorageInterface;
use Behat\Behat\Context\Context;

final class ClearStorageContext implements Context
{
    /**
     * @var SharedStorageInterface
     */
    private $sharedStorage;

    public function __construct(SharedStorageInterface $sharedStorage)
    {
        $this->sharedStorage = $sharedStorage;
    }

    /**
     * @BeforeScenario
     */
    public function clear()
    {
        $this->sharedStorage->setClipboard([]);
    }
}
