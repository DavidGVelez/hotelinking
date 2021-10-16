
<header class="p-3 bg-dark text-white">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-between lg-start">
      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="/" class="nav-link px-2 text-secondary">Home</a></li>
        @if (Auth::user())
        <li><a href="/codes" class="nav-link px-2 text-white">My promo codes</a></li>
        @endif
      </ul>
      <div class="text-end">
        @if(Auth::user())
          <a href="/logout" type="button" class="btn btn-outline-light me-2">Logout</a>
        @else
          <a href="/login" type="button" class="btn btn-outline-light me-2">Login</a>
          <a href="/signup" type="button" class="btn btn-warning">Sign-up</a>
        @endif
      </div>
    </div>
  </div>
</header>