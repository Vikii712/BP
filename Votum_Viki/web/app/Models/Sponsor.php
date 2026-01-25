<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $fillable = [
        'name',
        'file_id',
    ];

    public function file()
    {
        return $this->belongsTo(File::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_sponsor');
    }
}
