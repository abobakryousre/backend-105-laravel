<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'category_id'
    ];

    public function scopeFilter($query, $filter)
    {
        if ($filter->has('q')) {
            $searchValue = $filter->get('q');
            $query = $query->where('name', 'like', "%$searchValue%")->orWhere("price", "LIKE", "%$searchValue%");
        }
        // dd($filter->get('category_id'));
        if ($filter->has('category_id')) {
            $categoryID = $filter->get('category_id');
            $query =  $query->orWhere('category_id', $categoryID);
        }

        if ($filter->has('price')) {
            $price = $filter->get('price');
            $query = $query->orWhere('price', ">", $price);
        }

        return $query;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function myCategory()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
