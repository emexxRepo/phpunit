<?php
/**
 * Created by PhpStorm.
 * User: murat
 * Date: 21.12.2018
 * Time: 08:18
 */

namespace App\Calculator;

use App\Calculator\Exceptions\NoOperandsException;

class Addition extends OperationAbstract implements OperatorInterface
{

    public function calculate(): int
    {

        if (count($this->operands) === 0) {
            throw new NoOperandsException;
        }
        return array_sum($this->operands);
    }
}