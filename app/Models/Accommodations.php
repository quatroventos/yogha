<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodations extends Model
{
    use HasFactory;
    //public $timestamps = false;

    // - You might need to adjust the namespace of App\Product
    // - category_products refers to the pivot table name

    public function pictures()
    {
        return $this->hasMany(Pictures::class, 'accommodationId', 'AccommodationId');
    }

    public function views()
    {
        return $this->hasMany(Stats::class, 'content_id','AccommodationId');
    }

    public function rates()
    {
        return $this->hasMany(Rates::class, 'AccommodationId', 'AccommodationId');
    }

    public function descriptions()
    {
        return $this->hasMany(Descriptions::class, 'AccommodationId', 'AccommodationId');
    }

    public function localizations()
    {
        return $this->hasMany(Localizations::class, 'AccommodationId', 'AccommodationId');
    }

    public function rules()
    {
        return $this->hasMany(Occuppationalrules::class, 'AccommodationId', 'AccommodationId');
    }

    public function availabilities()
    {
        return $this->hasMany(Availabilities::class, 'AccommodationId', 'AccommodationId');
    }

}
