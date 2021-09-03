<?php

namespace App\Models;
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['title'];

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public static function arrForCategory()
    {
        $categories = Category::all();
        $categoryList = [];
        foreach ($categories as $category) {
            $categoryList[$category->id] = $category->title;
        }
        return $categoryList;
    }
}
