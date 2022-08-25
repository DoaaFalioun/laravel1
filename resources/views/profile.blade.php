@extends('layouts.navbar')

@section('content')

    <h1>Profile Page</h1>
<h2>Hello,{{session('user')}}</h2>

<a href="/logout">logout</a>

@endsection
