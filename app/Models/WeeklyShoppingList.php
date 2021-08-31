<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyShoppingList extends Model
{
    use HasFactory;

    protected $fillable = [
        'shopping_date',
        'shopping_from',
        'shopping_to',
        'team_id'
    ];

    public function shoppingLists()
    {
        return $this->hasMany(ShoppingList::class);
    }

    public function positions()
    {
        return $this->hasManyThrough(Position::class, ShoppingList::class);
    }
}
