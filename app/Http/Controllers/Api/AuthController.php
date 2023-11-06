<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

        return response()->json([
            'message' => 'Login success',
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function getUserDetails()
    {
        if (Auth::check()) {
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

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            // Tambahkan validasi lain sesuai kebutuhan
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // Perbarui kolom lain sesuai kebutuhan

        $user->save();

        return response()->json([
            'message' => 'Successfully Registered',
            'data' => $user,
        ]);
    }

    public function becomeSeller(User $user)
    {
        $user = Auth::user();
        $requiredProperties = [
            'address',
            'no_handphone',
            'gender',
            'avatar',
            'bio',
            'dateofbirth',
            'city_code',
            'district_code',
            'village_code',
            'province_code',
        ];

        foreach ($requiredProperties as $property) {
            if (is_null($user->$property)) {
                return response()->json([
                    'message' => 'Mohon lengkapi data diri terlebih dahulu',
                ], 422);
            }
        }
        if (!$user->seller) {
            $seller = new Seller();
            $user->seller()->save($seller);
            return response()->json([
                'message' => 'User is now a seller'
            ], 200);
        } else {
            return response()->json([
                'message' => 'User is already a seller'
            ], 400);
        }
    }

    public function onboarding(User $user, Request $request)
    {
        // dd('sampe');
        $request->user()->fill(
            $request->validate([
                'address' => ['required', 'string'],
                'no_handphone' => ['required', 'unique:users,no_handphone,' . auth()->id(), 'numeric'],
                'gender' => ['required'],
                'avatar' => ['required'],
                'bio' => ['required', 'string'],
                'dateofbirth' => ['required', 'date'],
                'province_code' => ['required'],
                'city_code' => ['required'],
                'district_code' => ['required'],
                'village_code' => ['required'],
            ])
        );

        $request->user()->save();

        return response()->json([
            'message' => 'Data user berhasil diperbarui',
            'user' => auth()->user()
        ], 200);
    }
}
