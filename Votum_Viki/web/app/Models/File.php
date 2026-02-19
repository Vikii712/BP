<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'section_id',
        'event_id',
        'title_sk',
        'title_en',
        'url',
        'type',
    ];

    public $image_file;

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
