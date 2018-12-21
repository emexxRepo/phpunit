<?php
/**
 * Created by PhpStorm.
 * User: murat
 * Date: 21.12.2018
 * Time: 10:01
 */

class CalculatorTest extends \PHPUnit\Framework\TestCase
{

    /** @test */
    public function can_set_single_operation()
    {
        $addition = new \App\Calculator\Addition;
        $addition->setOperands([5, 10]);

        $calculator = new \App\Calculator\Calculator();
        $calculator->setOperation($addition);
        $this->assertCount(1, $calculator->getOperations());
    }

    /** @test */

    public function can_set_multiple_operations()
    {
        $addition = new \App\Calculator\Addition();

        $addition->setOperands([5, 10]);

        $addition2 = new \App\Calculator\Addition();
        $addition2->setOperands([2, 2]);

        $calculator = new \App\Calculator\Calculator();
        $calculator->setOperations([$addition, $addition2]);

        $this->assertCount(2, $calculator->getOperations());
    }

    /** @test */
    public function can_calculate_result()
    {
        $addition = new \App\Calculator\Addition;
        $addition->setOperands([5, 10]);

        $calculator = new \App\Calculator\Calculator();
        $calculator->setOperation($addition);

        $this->assertEquals(15, $calculator->calculate());
    }



}