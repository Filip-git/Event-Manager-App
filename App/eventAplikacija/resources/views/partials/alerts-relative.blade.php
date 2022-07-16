@if(session('warning'))
<div class="alert alert-warning container" role="alert">
    {{ session('warning') }}
  </div>
@endif

@if(session('info'))
<div class="alert alert-info container" role="alert">
    {{ session('info') }}
  </div>
@endif
