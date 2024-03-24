<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Ticket extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Existing payment relationship
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    // Event relationship
    public function event()
    {
        return $this->belongsTo(Event::class);
    }


}
