<?php

namespace App\Models;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Notifications\VerifyEmailNotification;

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
        'banner',
        'biography',

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
        $this->notify(new VerifyEmailNotification);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token, $this->email));
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
        if (str_starts_with($this->profile_image, 'http')) return $this->profile_image;
        return Storage::response($this->profile_image);
    }

    /**
     * Set profile image helper
     * @param $image Image Request Image (must be validated)
     * @return string String with the path of the image
     */
    public function setProfileImage($image): string
    {
        $path = $image->store('profile_images');
        $this->profile_image = $path;
        $this->save();

        return $path;
    }

    /**
     * Get banner helper
     * @return StreamedResponse|null
     */
    public function getBanner(): ?StreamedResponse
    {
        if (!$this->banner) return null;
        if (str_starts_with($this->banner, 'http')) return $this->banner;
        return Storage::response($this->banner);
    }

    /**
     * Set banner helper
     * @param $image Image Request Image (must be validated)
     * @return string String with the path of the image
     */
    public function setBanner($image): string
    {
        $path = $image->store('profile_banner');

        $this->banner = $path;
        $this->save();

        return $path;
    }

    /**
     * Get preferences belongs to user
     * @return HasOne
     */
    public function preferences(): HasOne
    {
        return $this->hasOne(UserPreference::class);
    }
}
