<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Inertia\Inertia;
use App\Services\UserService;

class RegisterController extends Controller
{
    public function __construct(protected UserService $userService) {}

    public function create()
    {
        return Inertia::render('Auth/Register');
    }
    public function store(UserRequest $request)
    {
        $this->userService->register($request->validated());
        return to_route('register');
    }
}
