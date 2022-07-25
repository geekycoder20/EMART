<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewRating extends Model
{
    use HasFactory;
    protected $table = "rating_and_review";

    public function users()
    {
        return $this->hasMany(User::class,"id","userid");
    }
}
