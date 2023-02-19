<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    
    protected $fillable = [
        'title',
        'unit_id',
        'created_by',
        'updated_by'    
    ];

    public function berita(){
    	return $this->hasMany(Berita::class, 'id', 'category_id');
    }
}
