<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Event extends Model
{
    protected $fillable = [
        'title_sk',
        'title_en',
        'content_sk',
        'content_en',
        'inCalendar',
        'inHome',
        'inGallery',
        'color',
        'main_pic',
    ];

    protected $casts = [
        'inCalendar' => 'boolean',
        'inHome' => 'boolean',
        'inGallery' => 'boolean',
    ];

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function dates()
    {
        return $this->hasMany(EventDate::class);
    }

//    public function sponsors()
//    {
//        return $this->belongsToMany(Sponsor::class, 'event_sponsor');
//    }
}
