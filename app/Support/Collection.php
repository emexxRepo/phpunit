<?php

namespace App\Support;


use Traversable;

class Collection implements \IteratorAggregate,\JsonSerializable
{

    private $items = array();

    public function __construct(array $items = array())
    {
        $this->items = $items;
    }

    public function get(): array
    {
        return $this->items;
    }

    public function countItems(): int
    {
        return count($this->items);
    }

    /**
     * Retrieve an external iterator
     * @link https://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     * @since 5.0.0
     */
    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->items);
    }

    public function add(array $items): void
    {
        $this->items = array_merge($this->items, $items);
    }

    /**
     * @param Collection $collection
     */
    public function merge(Collection $collection)
    {
        return $this->add($collection->get());
    }

    public function toJson()
    {
        return json_encode($this->items);
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return $this->items;
    }
}