<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class, 'city_id');
    }

    public function homePageImage()
    {
        $image = $this->images()->limit(1)->pluck('file_name')->implode('');
        return  $image;
    }
}