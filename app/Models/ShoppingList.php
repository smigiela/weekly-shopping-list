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
}
