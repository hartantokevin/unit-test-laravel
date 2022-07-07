<?php

namespace Tests\Feature\Http\Controllers;

use App\CategoryModel;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductControllerTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_store_data()
    {
        //TODO: code inside here --Created by Kiddy
    }

    /**
     * @test
     */
    public function it_stores_data()
    {
        //TODO: code inside here

        $user = factory(User::class)->create();
        $category = factory(CategoryModel::class)->create();

        $response = $this->actingAs($user)
            ->post(route('product.store'), [
                'name' => $this->faker->words(3, true),
                'cat' => $category->id,
                'quantity' => $this->faker->randomNumber(3),
                'buy_price' => $this->faker->randomNumber(6),
                'sell_price' => $this->faker->randomNumber(6),
            ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('product.index'));
    }
}
