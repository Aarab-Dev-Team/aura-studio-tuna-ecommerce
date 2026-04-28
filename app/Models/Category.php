<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use HasFactory;
    use SoftDeletes ;

    protected $fillable = [
        'name' , 
        'slug' , 
        "description" , 
    ] ; 

    public function products(){

        return $this->hasMany(Product::class) ; 

    }

    // Manually soft delete products when category is deleted
    protected static function booted()
    {
        static::deleting(function ($category) {
            if (!$category->isForceDeleting()) {
                $category->products()->delete(); // soft delete products
            }
        });
    }
}
