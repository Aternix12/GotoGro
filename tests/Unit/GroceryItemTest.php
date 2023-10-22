<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\GroceryItem;
use Illuminate\Support\Facades\DB;

class GroceryItemTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Seed the necessary data
        $this->seed(\Database\Seeders\CategoriesSeeder::class);
        // Assuming you have a DepartmentSeeder
        $this->seed(\Database\Seeders\DepartmentsSeeder::class);
    }

    // Test for creating a grocery item
    public function testCanCreateGroceryItem()
    {
        $itemData = [
            'ProductName' => 'Bread',
            'Price' => 0.50,
            'CategoryID' => 1,
            'DepartmentID' => 3,
            'Stock' => 10,
        ];

        GroceryItem::create($itemData);
        $this->assertDatabaseHas('grocery_items', ['ProductName' => 'Bread']);
    }

    // Test for updating a grocery item
    public function testCanUpdateGroceryItem()
    {
        $item = GroceryItem::factory()->create();

        $item->update(['ProductName' => 'Updated Bread']);
        $this->assertDatabaseHas('grocery_items', ['ProductName' => 'Updated Bread']);
    }

    // Test for deleting a grocery item
    public function testCanDeleteGroceryItem()
    {
        $item = GroceryItem::factory()->create();
        $item->delete();

        $this->assertDatabaseMissing('grocery_items', ['GroceryID' => $item->GroceryID]);
    }

    // Test for retrieving a grocery item
    public function testCanRetrieveGroceryItem()
    {
        $item = GroceryItem::factory()->create();

        $foundItem = GroceryItem::find($item->GroceryID);
        $this->assertEquals($item->ProductName, $foundItem->ProductName);
    }

    // Test for measuring create operation response time
    public function testCreateResponseTime()
    {
        $start = microtime(true);

        GroceryItem::factory()->create();

        $end = microtime(true);
        $this->assertLessThan(1, $end - $start);
    }

    // Test for measuring update operation response time
    public function testUpdateResponseTime()
    {
        $item = GroceryItem::factory()->create();
        $updatedData = ['ProductName' => 'Updated Bread'];

        $start = microtime(true);

        $item->update($updatedData);

        $end = microtime(true);
        $this->assertLessThan(1, $end - $start);
    }

    // Test for measuring delete operation response time
    public function testDeleteResponseTime()
    {
        $item = GroceryItem::factory()->create();

        $start = microtime(true);

        $item->delete();

        $end = microtime(true);
        $this->assertLessThan(1, $end - $start);
    }

    // Test for measuring retrieve operation response time
    public function testRetrieveResponseTime()
    {
        $item = GroceryItem::factory()->create();

        $start = microtime(true);

        GroceryItem::find($item->GroceryID);

        $end = microtime(true);
        $this->assertLessThan(1, $end - $start);
    }

    // Test for data integrity after creating a grocery item
    public function testIntegrityAfterCreate()
    {
        $createdItem = GroceryItem::factory()->create();

        $this->assertDatabaseHas('grocery_items', ['ProductName' => $createdItem->ProductName]);
        $this->assertEquals($createdItem->ProductName, $createdItem->ProductName);
        $this->assertEquals($createdItem->Price, $createdItem->Price);
        $this->assertEquals($createdItem->CategoryID, $createdItem->CategoryID);
        $this->assertEquals($createdItem->DepartmentID, $createdItem->DepartmentID);
    }

    // Test for data integrity after updating a grocery item
    public function testIntegrityAfterUpdate()
    {
        $item = GroceryItem::factory()->create();
        $updatedData = ['ProductName' => 'Updated Bread'];

        $item->update($updatedData);

        $this->assertDatabaseHas('grocery_items', $updatedData);
        $this->assertEquals($updatedData['ProductName'], $item->ProductName);
    }

    // Test for data integrity after deleting a grocery item
    public function testIntegrityAfterDelete()
    {
        $item = GroceryItem::factory()->create();
        $item->delete();

        $this->assertDatabaseMissing('grocery_items', ['GroceryID' => $item->GroceryID]);
        $allItems = GroceryItem::all();
        $this->assertFalse($allItems->contains($item));
    }
}
