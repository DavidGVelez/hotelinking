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

    $this->login(LoginRequest::createFrom($request));

    return redirect(route('home'));
  }

  public function login(LoginRequest $request)
  {

    if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
      return redirect(route('home'));
    } else {
      return redirect('login')->withErrors(['login' => 'Fallo']);
    }
  }

  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect(route('home'));
  }
}
