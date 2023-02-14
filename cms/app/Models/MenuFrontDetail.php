<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuFrontDetail extends Model
{
    use HasFactory;
    protected $table = 'menu_front_details';
    protected $fillable = 'menu_id, title, created_by, link';
}
