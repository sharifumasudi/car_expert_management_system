@if (session('success'))
<div class="alert alert-success">
{{session('success')}}
</div>
@endif

@if(session('message'))
  <div class="alert alert-danger">
    {{session('message')}}
  </div>
@endif
