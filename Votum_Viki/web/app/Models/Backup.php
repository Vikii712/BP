<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Backup extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'file_name',
        'created_at',
    ];
}
