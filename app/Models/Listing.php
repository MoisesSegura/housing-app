<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'description', 'price_per_night', 'location', 'province_id','latitude', 'longitude', 
        'max_guests', 'bedrooms', 'bathrooms', 'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function images()
    {
        return $this->hasMany(ListingImage::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function tags()
{
    return $this->belongsToMany(Tag::class);
}

}

