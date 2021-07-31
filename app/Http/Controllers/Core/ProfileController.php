<?php
namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserPreference;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Render Profile basic page
     * @return Response Inertia Render Response
     */
    public function renderProfileGeneral(): Response
    {
        return Inertia::render('Profile/General');
    }

    /**
     * Render Profile security page
     * @return Response Inertia Render Response
     */
    public function renderProfileSecurity(): Response
    {
        return Inertia::render('Profile/Security');
    }

    /**
     * Render Profile notification setting page
     * @return Response Inertia Render Response
     */
    public function renderProfileNotifications(Request $request): Response
    {
        return Inertia::render('Profile/Notifications', [
            'preferences' => $request->user()->preferences
        ]);
    }

    /**
    * Update User Profile
    * @return RedirectResponse Inertia Render Response
    */
    public function updateProfile(Request $request): RedirectResponse {
        $request->validate([
            'first_name'=>'required|string|max:255',
            'last_name'=>'required|string|max:255',
            'username'=>'required|string|max:255|unique:users,username' . $request->user()->id,
            'email'=>'required|string|max:255|unique:users,email' . $request->user()->id,
            'biography'=>'nullable|string'
        ]);

        $user = $request->user();
        $user->update($request->all());
        $user->save();

        return back();
    }

    /**
     * Update user preferences
     * @param Request $request
     * @return RedirectResponse
     */
    public function updatePreferences(Request $request): RedirectResponse
    {
        $request->validate([
            'notification_projects' => 'nullable|boolean',
            'notification_weekly_newsletter' => 'nullable|boolean',
            'notification_weekly_evaluation' => 'nullable|boolean',
            'notification_account_related' => 'nullable|boolean'
        ]);

        $user = $request->user();
        $data = array_merge($request->all(), ['user_id' => $request->user()->id]);

        if ($user->preferences) {
            $user->preferences->update($data);
            $user->preferences->save();
        } else {
            UserPreference::create($data);
        }


        return back();
    }

    /**
    * Change current User password
    * @return RedirectResponse Inertia Render Response
    * @throws AuthenticationException
    */
    public function changePassword(Request $request): RedirectResponse {
        $request->validate([
            'current_password'=>'required|string|max:255',
            'password'=>'required|string|max:255|confirmed'
        ]);

        $user = $request->user();
        if (!Hash::check($request->current_password, $user->password)) throw new AuthenticationException('Invalid Password');
        $user->password = Hash::make($request->password);
        $user->save();

        return back();
    }

    /**
     * Update banner from user
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateBanner(Request $request): RedirectResponse
    {
        $request->validate([
            'banner'=>'required|image|max:5120'
        ]);

        $request->user()->setBanner($request->file("banner"));

        return back();
    }

    /**
     * Update profile image from user
     * @param Request $request
     * @return RedirectResponse
     */
    public function updateProfileImage(Request $request): RedirectResponse
    {
        $request->validate([
            'profile_image'=>'required|image|max:5120'
        ]);

        $request->user()->setProfileImage($request->file("profile_image"));

        return back();
    }
}
