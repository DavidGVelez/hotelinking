<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\SignUpRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
  protected $model;

  public function __construct(User $user)
  {
    $this->model = new UserRepository($user);
  }

  public function store(SignUpRequest $request)
  {
    $user = $request->only($this->model->getModel()->fillable);
    $user['password'] = Hash::make($request->password);

    $this->model->create($user);

    Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember_me ?? null);

    return redirect(route('home'))->with('success', 'User successfully created!');
  }

  public function login(LoginRequest $request)
  {
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember_me)) {
      return redirect(route('home'))->with('info', 'Logged in successfully!');
    }
    return redirect(route('login'))->withErrors(['login' => 'Email or password incorrect!']);
  }

  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect(route('home'))->with('info', 'User logged out!');
  }
}
