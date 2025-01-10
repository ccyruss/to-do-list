<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listModel extends Model
{
    use HasFactory;

    protected $table = 'list';

    protected $fillable = [
        'title',
    ];

    public $timestamps = true;

}
