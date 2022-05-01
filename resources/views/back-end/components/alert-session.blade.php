@if (Session::has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong> {{ Session::get('success') }} </strong> 
      <a href="{{ $path_home }}">Back to list</a>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>
@endif