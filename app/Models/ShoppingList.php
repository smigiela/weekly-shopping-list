<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShoppingList extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'shopping_date'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'shopping_list_user');
    }

    public function positions()
    {
        return $this->hasMany(Position::class);
    }

    public static function check_permission($shoppingList)
    {
        if (! $shoppingList->users->contains(auth()->user())){
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
