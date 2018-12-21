<?php
/**
 * Created by PhpStorm.
 * User: murat
 * Date: 19.12.2018
 * Time: 10:04
 */

use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    protected $collection;

    public function setUp()
    {
        $this->collection = new \App\Support\Collection;
    }

    /** @test */
    public function empty_instantiated_collection_returns_no_item()
    {
        $this->assertEmpty($this->collection->get());
    }

    /** @test */
    public function count_is_correct_for_items_passed_in()
    {
        $collection = new \App\Support\Collection([
            'one', 'two', 'three'
        ]);

        $this->assertEquals(3, $collection->countItems());
    }

    /** @test */
    public function collection_is_instance_of_iterator_aggregate()
    {
        $collection = new \App\Support\Collection();

        $this->assertInstanceOf(IteratorAggregate::class, $collection);
    }

    /** @test */
    public function collection_can_be_iterated()
    {
        $collection = new \App\Support\Collection([
            'test', 'there', 'are'
        ]);

        $items = array();

        foreach ($collection as $item) {
            $items[] = $item;
        }


        $this->assertCount(3, $items);

    }

    /** @test */
    public function collection_can_be_merged_with_another_collection()
    {
        $collection1 = new \App\Support\Collection(['one', 'two']);
        $collection2 = new \App\Support\Collection(['three', 'four', 'five']);

        $collection1->merge($collection2);
        $this->assertCount(5, $collection1->get());
        $this->assertEquals(5, $collection1->countItems());
    }


    /** @test */
    public function can_add_to_existing_collection()
    {
        $collection = new \App\Support\Collection(['one', 'two']);
        $collection->add(['three']);

        $this->assertEquals(3, $collection->countItems());

        $this->assertCount(3, $collection->get());
    }

    /** @test */
    public function returns_json_encoded_items()
    {
        $collection = new \App\Support\Collection(
            [
                ['username' => 'Alex'],
                ['username' => 'Delta'],

            ]
        );


        $this->assertEquals('[{"username":"Alex"},{"username":"Delta"}]', $collection->toJson());
    }

    /** @test */
    public function json_encoding_a_collection_object_returns_json()
    {
        $collection = new \App\Support\Collection(
            [
                ['username' => 'Alex'],
                ['username' => 'Delta'],

            ]
        );

        $encoded = json_encode($collection);
        $this->assertEquals('[{"username":"Alex"},{"username":"Delta"}]', $encoded);


    }

}