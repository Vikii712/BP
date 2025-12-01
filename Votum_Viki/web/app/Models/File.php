<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'section_id',
        'event_id',
        'title_sk',
        'title_en',
        'url',
        'type',
    ];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
