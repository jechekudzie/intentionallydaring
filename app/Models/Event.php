<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Event extends Model
{
    use HasFactory,HasSlug;

    protected $guarded = [];

    // Relationship with tickets
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    //relationship with payment
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('address')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
