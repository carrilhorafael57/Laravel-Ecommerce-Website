<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

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
            'street' => ['required', 'string', 'max:50'],
            'city' => ['required', 'string', 'max:20'],
            'postcode' => ['required', 'regex:^(?!.*[DFIOQU])[A-VXY][0-9][A-Z] ?[0-9][A-Z][0-9]$^'],
            'province' => ['required', 'max:2'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'address_id' => $address->address_id
        ]);

        Address::create([
            'street' => $request->input('street'),
            'city' => $request->input('city'),
            'postcode' => $request->input('postcode'),
            'province' => $request->input('province'),
            'user_id' => $user->id
        ]);

        // dd($address->address_id);



        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    public function show(User $user)
    {
        $user_info = auth()->user();
        $address_info = Address::find($user_info->address_id);
        return view('users.show', compact('user_info', 'address_info'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_info = auth()->user();
        $address_info = Address::find($user_info->address_id);
        return view('users.index', compact('user_info', 'address_info'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit()
    {
        $user_info = auth()->user();
        $address_info = User::find($user_info->id)->address;
        return view('users.edit', compact('user_info', 'address_info'));
    }

    public function update(Request $request, User $user, Address $address)
    {
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $address->update([
            'street' => $request->input('street'),
            'city' => $request->input('city'),
            'postcode' => $request->input('postcode'),
            'province' => $request->input('province'),
        ]);

        return redirect()->route('users.index');
    }
}
