@extends('Layout.project')

@section('content')
    <h1> My Project </h1>
 <form action="/admin/article/create",method="post">
     @csrf
    <label for="title">title:</label>
    <input type="text" name="title">
    <button>Send</button>
</form>
@endsection