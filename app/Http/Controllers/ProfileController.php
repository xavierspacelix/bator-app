<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Province;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;


class ProfileController extends Controller
{
    /**
     * Display the user's profile view.
     */
    public function index(Request $request): View
    {
        return view('profile.edit', [
            'province' => Province::all(),
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        // dd($request->all());
        $validator = $request->validate([
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($request->user()->id)],
            'address' => ['string'],
            'no_handphone' => ['numeric'],
            'gender' => ['string'],
            'bio' => ['string'],
            'dateofbirth' => ['date'],
            'city_code' => ['numeric'],
            'district_code' => ['numeric'],
            'village_code' => ['numeric'],
            'province_code' => ['numeric'],
        ]);

        $request->user()->fill($validator);

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        $request->user()->save();

        if ($request->hasFile('avatar')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $slugAvatar = Str::slug($request->user()->name . '-' . $request->user()->uuid);
            $avatarPath = $request->file('avatar')->storeAs(
                'images/avatars',
                $slugAvatar . '-' . time() . '.' . $request->file('avatar')->getClientOriginalExtension(),
                'public'
            );
            $request->user()->avatar = $avatarPath;
            $request->user()->save();
        }
        flash()->addSuccess('Profile Kamu Berhasil Diperbarui');
        return redirect()->route('profile.index');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
