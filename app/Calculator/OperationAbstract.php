<?php
/**
 * Created by PhpStorm.
 * User: murat
 * Date: 21.12.2018
 * Time: 09:36
 */

namespace App\Calculator;


abstract class OperationAbstract
{
    protected $operands = array();

    public function setOperands(array $operands): void
    {
        $this->operands = $operands;
    }


}