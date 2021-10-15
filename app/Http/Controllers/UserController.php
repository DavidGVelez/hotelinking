<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepository;

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

    $this->login($request);

    return redirect(route('home'));
  }

  public function login($user)
  {
    Auth::attempt(['email' => $user->email, 'password' => $user->password,], true);
  }
}
