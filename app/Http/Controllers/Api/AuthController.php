<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Seller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password as FacadesPassword;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();

        $token = $user->createToken($user->name . '_auth_token')->plainTextToken;
        if ($user->seller) {
            return response()->json([
                'message' => 'Login success',
                'access_token' => $token,
                'token_type' => 'Bearer',
                'seller' => 'true'
            ]);
        }

        return response()->json([
            'message' => 'Login success',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'seller' => 'false'
        ]);
    }

    public function getUserDetails()
    {
        if (Auth::user()) {
            return response()->json([
                'message' => 'Successfully',
                'data' => Auth::user()
            ], 200);
        }
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        event(new Registered($user));
        return response()->json([
            'message' => 'Successfully Registered',
            'data' => $user,
        ]);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'message' => 'logout success'
        ]);
    }
    public function update(Request $request)
    {
        $user = auth()->user();

        $validator = $request->validate([
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($request->user()->id)],
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

        $user->save();

        if ($request->hasFile('avatar')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $slugAvatar = Str::slug($request->user()->name . '-' . $request->user()->uuid);
            $avatarPath = $request->file('avatar')->storeAs('images/avatars', $slugAvatar . '-' . time() . '.' . $request->file('avatar')->getClientOriginalExtension(), 'public');
            $request->user()->avatar = $avatarPath;
            $request->user()->save();
        }
        return response()->json([
            'message' => 'Successfully Updated',
            'data' => $user,
        ]);
    }
    /**
     * Update the user's password.
     */
    public function updatePassword(Request $request)
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil ganti Password'
        ], 200);
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = FacadesPassword::sendResetLink(
            $request->only('email')
        );

        if ($status == FacadesPassword::RESET_LINK_SENT) {
            return response()->json(['message' => __('Password reset link sent.')], 200);
        } else {
            return response()->json(['message' => __('Unable to send password reset link.')], 400);
        }
    }
    public function becomeSeller(User $user, Request $request)
    {
        $validator = $request->validate([
            'address' => ['required'],
            'no_handphone' => ['required'],
            'gender' => ['required'],
            'bio' => ['required'],
            'dateofbirth' => ['required'],
            'city_code' => ['required'],
            'district_code' => ['required'],
            'village_code' => ['required'],
            'province_code' => ['required'],
            'terms' => ['accepted']
        ]);

        $request->user()->fill($validator);

        $request->user()->save();

        if (!$request->user()->seller) {
            Seller::create([
                'user_id' => $request->user()->id,
            ]);
            return response()->json([
                'message' => 'User is now a seller'
            ], 200);
        } else {
            return response()->json([
                'message' => 'User is already a seller'
            ], 400);
        }
    }
}
