<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WeeklyShoppingList extends Model
{
    use HasFactory;

    protected $fillable = ['shopping_date', 'team_id'];

    public function shoppingLists()
    {
        return $this->hasMany(ShoppingList::class);
    }

    public function positionsByShoppingLists()
    {
        return $this->hasManyThrough(Position::class, ShoppingList::class);
    }

    public function positions()
    {
        return $this->belongsToMany(Position::class, 'position_weekly_shopping_list');
    }
}
