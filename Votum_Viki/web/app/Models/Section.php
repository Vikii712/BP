<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{

    protected $table = 'sections';
    protected $fillable = [
        'title_sk',
        'title_en',
        'content_sk',
        'content_en',
        'year',
        'position',
        'category',
    ];
    public function files()
    {
        return $this->hasMany(File::class);
    }

}
