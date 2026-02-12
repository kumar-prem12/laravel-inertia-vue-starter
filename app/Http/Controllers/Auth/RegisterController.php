<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Inertia\Inertia;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function __construct(protected UserService $userService) {}

    public function create()
    {
        return Inertia::render('Auth/Register');
    }
    public function store(UserRequest $request)
    {
        $user = $this->userService->register($request->validated());
        event(new Registered($user));
        Auth::login($user);

        return to_route('home')->with('toast', [
            'type' => 'success',
            'message' => 'User created successfully',
        ]);
    }
}
