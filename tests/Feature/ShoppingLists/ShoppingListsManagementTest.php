<?php

namespace Tests\Feature\ShoppingLists;

use App\Models\Shopping_lists\ShoppingList;
use App\Models\Team;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShoppingListsManagementTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->withPersonalTeam()->create();
        $this->actingAs($this->user);
    }

    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function user_can_show_create_form()
    {
        $response = $this->get('/shopping_lists');

        $response->assertSee(__('custom.shopping_lists.create.header'));
    }

    /**
     * @test
     * @return void
     */
    public function user_can_save_new_shopping_list()
    {
        // tworzę użytkownika z team_id == 2
        $user2 = User::factory()->withPersonalTeam()->create();

        // szukam teamu gdzie id == current_team_id nowego użytkownika
        $team = Team::find($user2->currentTeam->id);

        // tworzę przykładową listę zakupów
        $shoppingList = ShoppingList::factory()->make(['team_id' => '']);

        // wysyłam listę postem jako user2
        $this->actingAs($user2)->post('/shopping_lists', $shoppingList->toArray());

        // sprawdzam, czy lista o team_id użytkownika user2 istnieje oraz czy liczba list == 1
        $this->assertCount(1, ShoppingList::where('team_id', 2)->get());
        $this->assertDatabaseCount('shopping_lists', 1);
    }
}
