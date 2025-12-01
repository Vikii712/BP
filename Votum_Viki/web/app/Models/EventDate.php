<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventDate extends Model
{
    protected $table = 'dates';

    protected $fillable = [
        'event_id',
        'date',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
