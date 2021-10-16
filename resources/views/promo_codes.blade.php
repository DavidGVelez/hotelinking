@extends('template')

@section('main')

<section class="codes">
  <form class="d-flex justify-content-end" method="get" action="/codes/create">
    <button class="btn btn-info">Create code</button>
  </form>

  <h1 class="title mb-3">
    My promo codes
  </h1>
  <form action="/codes/redeem" method="post">
   @csrf 
    <ul class="list-group">
    @foreach (Auth::user()->promo_codes as $code)
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <span class="font-weight-bold">{{$code->code}}</span>
        @if ($code->active)
         <input class="mr-5" type="checkbox" name="codes[]" value="{{$code->code}}">
        @else
        <span>Already redeemed</span>
        @endif 
      </li>
    @endforeach
    </ul>
    <div class="d-flex justify-content-end mt-3">
      <button class="btn btn-primary">Redeem</button>
    </div>
  
  </form>
</section>

@endsection