<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    protected $fillable=['category_name','category_slug'];
    use HasFactory;
    use SoftDeletes;
  
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);

    }



}
