<?php

namespace Tests;

use App\User\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
    * @var User
    */
    private $user;

    protected function setUp(): void
    {
        $this->user = new User();
    }

    public function testGetContractLengthMonths()
    {
        $contractMonths = $this->user->getContractLengthMonths();

        $this->assertEquals(6, $contractMonths);
    }
}
