<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $dates = [
        'delete_at',
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'name',
    ];
    protected $table = 'categories';

    public function product() {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}

