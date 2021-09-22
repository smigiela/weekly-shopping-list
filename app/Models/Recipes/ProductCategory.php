<?php

namespace App\Models\Recipes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
