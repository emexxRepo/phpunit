<?php
/**
 * Created by PhpStorm.
 * User: murat
 * Date: 21.12.2018
 * Time: 10:04
 */

namespace App\Calculator;


class Calculator
{

    protected $operations = array();

    public function setOperation(OperatorInterface $operation)
    {
        $this->operations[] = $operation;
    }

    public function setOperations(array $operations): void
    {

        foreach ($operations as $index => $operation) {

            if (!$operation instanceof OperatorInterface) {
                unset($operations[$index]);
            }
        }

        $this->operations = array_merge($this->operations, $operations);
    }

    public function getOperations(): array
    {
        return $this->operations;
    }

    public function calculate(): int
    {
        return $this->operations[0]->calculate();
    }
}