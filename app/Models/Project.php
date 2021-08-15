<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

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

    /**
     * Get Project thumbnail helper
     * @return StreamedResponse|null
     */
    public function getThumbnail(): ?StreamedResponse
    {
        if (!$this->thumbnail) return null;
        if (str_starts_with($this->thumbnail, 'http')) return $this->thumbnail;
        return Storage::response($this->thumbnail);
    }

    /**
     * Set Project thumbnail helper
     * @param $image Image Request Image (must be validated)
     * @return string String with the path of the image
     */
    public function setThumbnail($image): string
    {
        $path = $image->store('project_thumbnails');
        $this->thumbnail = $path;
        $this->save();

        return $path;
    }

    /**
     * Get Project logo helper
     * @return StreamedResponse|null
     */
    public function getLogo(): ?StreamedResponse
    {
        if (!$this->logo) return null;
        if (str_starts_with($this->logo, 'http')) return $this->logo;
        return Storage::response($this->logo);
    }

    /**
     * Set Project logo helper
     * @param $image Image Request Image (must be validated)
     * @return string String with the path of the image
     */
    public function setLogo($image): string
    {
        $path = $image->store('project_logos');
        $this->logo = $path;
        $this->save();

        return $path;
    }
}
