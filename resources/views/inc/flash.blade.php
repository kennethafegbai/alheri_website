@if(session()->has('success'))
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-bs-dismiss="alert">&times;</button>
    <strong>{{session('success')}}</strong>
  </div>
  @endif

  @if(session()->has('error'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-bs-dismiss="alert">&times;</button>
    <strong>{{session('error')}}</strong>
  </div>
  @endif