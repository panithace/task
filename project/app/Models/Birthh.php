<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Birthh extends Model
{
    protected $table ="birth";
    use HasFactory;
    protected $fillable = ['username'];
    use HasFactory;
}
