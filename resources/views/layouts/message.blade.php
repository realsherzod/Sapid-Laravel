@if (session('success'))
<div class="alert alert-success alert-dismissible show fade mb-3">
  <div class="alert-body">
    <button class="close" data-dismiss="alert">
      <span>×</span>
    </button>
    {{session('success')}}
  </div>
</div>
@elseif (session('warning'))
<div class="alert alert-warning alert-dismissible show fade mb-3">
  <div class="alert-body">
    <button class="close" data-dismiss="alert">
      <span>×</span>
    </button>
   {{session('warning')}}
  </div>
</div>
@elseif (session('danger'))
<div class="alert alert-danger alert-dismissible show fade mb-3">
  <div class="alert-body">
    <button class="close" data-dismiss="alert">
      <span>×</span>
    </button>
   {{session('danger')}}
  </div>
</div>
@endif