<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'amount', 'type', 'shopping_list_id', 'is_done'];

    public function shoppingList()
    {
        return $this->belongsTo(ShoppingList::class);
    }

    public static function check_permission($position)
    {
        $shoppingList = ShoppingList::find($position->shopping_list_id);

        if (! $shoppingList->users->contains(auth()->user())) {
            abort(404, __('custom.global.messages.dont_have_permission'));
        }
    }
}
