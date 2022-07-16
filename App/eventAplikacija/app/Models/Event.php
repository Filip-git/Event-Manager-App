<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'date',
        'image',
        'organizer_id',
        'location_id',
    ];

    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public function location()
    {
        return $this->belongsTo('App\Models\Location');
    }

    public function organizer()
    {
        return $this->belongsTo('App\Models\User', 'organizer_id');
    }
}
