<form method="POST" action="/login">
  @csrf
    <span class="text-danger fs-6 d-block">{{$errors->first('login')}}</span>
  <div class="mb-3">
    <label for="email"  class="form-label">Email address</label>
    <input type="text" name="email" class="form-control" id="email">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="password">
  </div>
  <div class="mb-3">
    <label for="remember_me" class="form-label">Remember me</label>
    <input type="checkbox" name="remember_me" class="" id="remember_me">
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
