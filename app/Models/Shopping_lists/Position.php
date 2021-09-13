<?php

namespace App\Models\Shopping_lists;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'amount', 'type', 'shopping_list_id', 'is_done'];

    public function shoppingList()
    {
        return $this->belongsTo(ShoppingList::class);
    }

    public static function check_permission($position)
    {
        $shoppingList = ShoppingList::find($position->shopping_list_id);

        if ( $shoppingList->team_id != auth()->user()->currentTeam->id) {
            abort(404, __('custom.global.messages.dont_have_permission_message'));
        }
    }
}
