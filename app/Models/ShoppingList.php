<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShoppingList extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'shopping_date', 'weekly_shopping_list_id', 'team_id'];

    public function positions()
    {
        return $this->hasMany(Position::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function weeklyShoppingLists()
    {
        return $this->belongsTo(WeeklyShoppingList::class);
    }

    public static function check_permission($shoppingList)
    {
        if ( $shoppingList->team_id != auth()->user()->currentTeam->id){
            abort(401, __('custom.global.messages.dont_have_permission'));
        }
    }

    public static function mark_after_expiration($shoppingList)
    {
        if ($shoppingList->shopping_date < now()) {
            return true;
        }
    }

}
