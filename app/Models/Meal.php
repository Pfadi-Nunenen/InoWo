<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $fillable = [
        'fk_users',
        'fk_meal_types',
        'meal_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mealType()
    {
        return $this->belongsTo(MealType::class);
    }
}
