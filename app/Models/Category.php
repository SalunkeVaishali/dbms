<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table="categories";
    protected $fillable = ['category_name', 'category_description'];
    public function products()
    {
        return $this->hasMany(Product::class);
    }

   
}
