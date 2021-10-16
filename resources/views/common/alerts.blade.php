@if(session()->has('info'))
  <div class="alert alert-info alert-dismissible fade show" role="info">
  {{session()->get('info')}} 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>
@endif

@if(session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="success">
  {{session()->get('success')}} 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>
@endif

@if(session()->has('alert'))
  <div class="alert alert-alert alert-dismissible fade show" role="alert">
  {{session()->get('alert')}} 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>
@endif

@if(session()->has('error'))
  <div class="alert alert-error alert-dismissible fade show" role="error">
  {{session()->get('error')}} 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>
@endif

@if(session()->has('warning'))
  <div class="alert alert-warning alert-dismissible fade show" role="warning">
  {{session()->get('warning')}} 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  </div>
@endif

