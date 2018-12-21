<?php
/**
 * Created by PhpStorm.
 * User: murat
 * Date: 21.12.2018
 * Time: 08:18
 */

namespace App\Calculator;

use App\Calculator\Exceptions\NoOperandsException;

class Division extends OperationAbstract implements OperatorInterface
{

    public function calculate(): int
    {

        if (count($this->operands) === 0) {
            throw new NoOperandsException;
        }

        $result = 0;

        return array_reduce(array_filter($this->operands), function ($a, $b) {

            if ($a !== null && $b !== null) {
                return $a / $b;
            }
            return $b;
        }, null);
    }
}