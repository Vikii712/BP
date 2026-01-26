<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title_sk',
        'title_en',
        'content_sk',
        'content_en',
        'inCalendar',
        'inHome',
        'inGallery',
        'archived',
        'color',
        'main_pic',
        'pic_alt_sk',
        'pic_alt_en'
    ];

    protected $casts = [
        'inCalendar' => 'boolean',
        'inHome' => 'boolean',
        'inGallery' => 'boolean',
        'archived' => 'boolean',
    ];

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function dates()
    {
        return $this->hasMany(EventDate::class);
    }

    public function sponsors()
    {
        return $this->belongsToMany(Sponsor::class, 'event_sponsor');
    }
}
