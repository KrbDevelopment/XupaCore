<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Inertia\Response;

class AccountController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Render Accounts overview page
     * @return Response Inertia Render Response
     */
    public function renderAccountsOverview(): Response
    {
        return Inertia::render('Accounts/Overview',  [
            'accounts' => User::paginate(15)
        ]);
    }

    /**
     * Delete single user account
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete_account_single(Request $request): RedirectResponse
    {
        error_log(print_r($request->account, true));
        $user = User::findOrFail($request->account);
        $user->delete();
        return back();
    }

    /**
     * Delete array of user accounts
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete_account_array(Request $request): RedirectResponse
    {
        $request->validate([
           'accounts' => 'required|array',
           'accounts.*' => 'required|int|exists:users,id'
        ]);

        foreach ($request->accounts as $account) {
            $account = User::findOrFail($account);
            $account->delete();
        }

        return back();
    }

    public function createAccount(Request $request): RedirectResponse
    {
        $request->validate([
           'first_name' => 'required|string|max:255',
           'last_name' => 'required|string|max:255',
           'username' => 'required|string|max:255|unique:users,username',
           'email' => 'required|string|max:255|unique:users,email',
           'password' => 'required|string|max:255|confirmed'
        ]);

        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return back();
    }
}
