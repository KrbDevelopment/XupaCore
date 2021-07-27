<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Notifications\VerifyEmail;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // Base
        'username',
        'first_name',
        'last_name',

        'profile_image',

        'email',
        'password',

        // Social Login
        'social_facebook',
        'social_github'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Emails
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmail);
    }

    /**
     * Profile Image
     */

    /**
     * Get profile image helper
     * @return StreamedResponse|null
     */
    public function getProfileImage(): ?StreamedResponse
    {
        if (!$this->profile_image) return null;
        return Storage::response(`profile_images/${$this->id}/${$this->profile_image}`);
    }

    /**
     * Set profile image helper
     * @param $image Image Request Image (must be validated)
     * @return array Array with path and url of image
     */
    public function setProfileImage($image): array
    {
        $path = $image->store(`profile_images/${$this->id}`);
        $url = Storage::url($path);

        return [
            'path' => $path,
            'url' => $url
        ];
    }
}
