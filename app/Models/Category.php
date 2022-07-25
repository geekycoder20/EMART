<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{

    use Sluggable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getLink()
    {
        return url('category/'.$this->slug);
    }


    use HasFactory;
    protected $fillable = [
        'title',
        'order_no',
        'status',
    ];

    public function foods()
    {
        return $this->hasMany(Food::class,"cat_id","id");
    }

}
