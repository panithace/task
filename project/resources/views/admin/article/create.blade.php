@extends('Layout.Project')


@section('content')

    <h1> My Project </h1>

    {{--@php--}}
    {{--dd($errors->all() );--}}
      {{--@endphp--}}
      @if($errors->any())
  <div class="alert alert-danger">
      <ul>
        @foreach($errors->all() as $error)
            <li> {{ $error }} </li>
        @endforeach
      </ul>
</div>
@endif
  <form action="/admin/article/create", method="post">
     @csrf
     <div class="form-group">
       <label for="title"> title : </label>
       <input type="text" name="title" class="form-control">
    </div>
    <div class="form-group">
       <label for="body"> body : </label>
       <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <button class="btn btn-danger">Send</button>

    {{--<form action"/admin/article/create">--}}
 {{--<label for="title">title:</label>--}}
  {{--<<nput type="text" name="title">--}}
    {{--<button>Send</button>--}}
    {{--</form>--}}

  {{--<label for="title">title:</label>--}}
   {{-- <input type="text" name="title">--}}
    {{--<button>Send</button>--}}
  </form>
@endsection