<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuFront extends Model
{
    use HasFactory;

    protected $table = 'menu_fronts';
    protected $fillable = 'unit_id, title, created_by, pic, link';
}
