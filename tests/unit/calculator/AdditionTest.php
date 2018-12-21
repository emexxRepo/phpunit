<?php

use PHPUnit\Framework\TestCase;

class AdditionTest extends TestCase
{
    /** @test */
    public function adds_up_given_operands()
    {

        $addtion = new App\Calculator\Addition;
        $addtion->setOperands([5, 10]);

        $this->assertEquals(15, $addtion->calculate());
    }

    /**@test */
    public function no_operands_given_throws_exception_when_calculating()
    {
        $this->excepctException(\App\Calculator\Exceptions\NoOperandsException::class);
        $addtion = new App\Calculator\Addition();
        $addtion->calculate();

    }
}