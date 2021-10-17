<form method="POST" action="/signup">
  @csrf
  <span class="text-danger fs-6">{{$errors->first('signup')}}</span>
  <div class="mb-3">
    <label for="email"  class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="email">
    <span class="text-danger fs-6">{{$errors->first('email')}}</span>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="password">
    @foreach($errors->get('password') as $error)
    <span class="text-danger fs-6 d-block">{{$error}}</span>
    @endforeach
  </div>
  <div class="mb-3">
    <label for="password_confirmation"  class="form-label">Confirm Password</label>
    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
    @foreach($errors->get('password_confirmation') as $error)
    <span class="text-danger fs-6 d-block">{{$error}}</span>
    @endforeach
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
