<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Food extends Model
{

    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getLink()
    {
        return url('food/'.$this->slug);
    }



    use HasFactory;
    protected $table = "foods";
    protected $fillable = ['cat_id','name','description','image','status'];

    public function category()
    {
        return $this->belongsTo(Category::class,"cat_id","id");
    }

    public function wishlist()
    {
        return $this->belongsTo(WishList::class,"food_id","id");
    }

    public function food_details(){
    	return $this->hasMany(FoodDetail::class,"food_id","id")->orderby('price','asc');
    }

    public function food_reviews(){
        return $this->hasMany(ReviewRating::class,"foodid","id");
    }

    public function food_images(){
        return $this->hasMany(FoodGallery::class,"foodid","id");
    }
    
    
}
