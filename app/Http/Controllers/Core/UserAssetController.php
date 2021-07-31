<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class UserAssetController extends Controller
{
    public function getProfileImage(User $user): ?StreamedResponse
    {
        return $user->getProfileImage();
    }

    public function getProfileBanner(User $user): ?StreamedResponse
    {
        return $user->getBanner();
    }
}
