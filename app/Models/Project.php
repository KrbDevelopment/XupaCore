<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // Base
        'user_id', // ID from the Creator/Owner

        'title',
        'slogan',
        'description',

        'thumbnail',
        'logo',
        'color',

        // Location Info
        'location_address',
        'location_city',

        // Website Info
        'website_link',
        'website_title'
    ];
}
