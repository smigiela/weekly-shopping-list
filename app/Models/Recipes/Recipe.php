<?php

namespace App\Models\Recipes;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Recipe extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = ['name', 'description', 'amount_of_people', 'team_id', 'user_id', 'is_public', 'image'];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('recipe_cover')
            ->singleFile();
    }

    public static function check_permission($recipe)
    {
        if ( $recipe->user_id != auth()->id()){
            abort(401, __('custom.global.messages.dont_have_permission_message'));
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function recipeItems()
    {
        return $this->hasMany(RecipeItem::class);
    }
}
