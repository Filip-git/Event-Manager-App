@if(session('success'))
<div class="alert alert-success container" role="alert">
    {{ session('success') }}
  </div>
@endif

@if(session('error'))
<div class="alert alert-danger container" role="alert">
    {{ session('error') }}
  </div>
@endif
