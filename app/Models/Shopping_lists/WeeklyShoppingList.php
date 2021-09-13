<?php

namespace App\Models\Shopping_lists;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyShoppingList extends Model
{
    use HasFactory;

    protected $fillable = [
        'shopping_date',
        'date_from',
        'date_to',
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
