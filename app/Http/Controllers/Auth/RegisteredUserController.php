<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\RoleUser;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'hp' => ['required', 'string', 'max:13', 'min:10', 'unique:users'],
        ]);

        $token = Str::random(100);
        
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'hp' => $request->hp,
            'password' => Hash::make($request->password),
            'remember_token' => $token,
        ];
        $user = User::create($data);

        RoleUser::insert([
            'role_id' => '6',
            'user_id' => $user->id,
            'user_type' => 'App\Models\User',
        ]);

        SendWa($request->hp, 'Link aktivasi akun e-Catalog:

https://e-catalog.test/verifikasi/'.$token);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
