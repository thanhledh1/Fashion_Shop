<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = [
        'delete_at',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'name',
        'price',
        'description',
        'description_ct',
        'quantity',
        'status',
        'category_id',
        'image',
    ];
    protected $primarykey = 'id';
    protected $table = 'products';
    public $timestamps = true;

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
