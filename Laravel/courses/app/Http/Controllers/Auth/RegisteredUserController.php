<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'regex:/^[А-ЯЁ][а-яё]+\s[А-ЯЁ][а-яё]+\s[А-ЯЁ][а-яё]+$/u', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'login' => ['required', 'string', 'unique:'.User::class],
            'password' => ['required', 'string', 'min:6', 'max:255', 'confirmed', 'regex:/^[a-zA-Z]+$/'],
            'avatar' => ['required','image', 'mimes:jpg,jpeg', 'max:20480'],
        ], [
            'name.regex' => 'ФИО должно содержать только кириллицу без цифр и знаков препинания',
            'password.regex' => 'Пароль должен содержать не менее 6 символов английской раскладки, верхнего и нижнего регистра',
            'avatar.mimes' => 'Изображение должно быть в формате JPG',
            'avatar.image'=>'Добавьте изображение',
            'avatar.max'=>'Изображение превышает допустимый размер',
        ]);

        $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $avatar->storeAs('/public/avatars', $avatarName);

            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->login = $request->input('login');
            $user->password = Hash::make($request->input('password'));
            $user->avatar = $avatarName;
            $user->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('index');
    }
}
