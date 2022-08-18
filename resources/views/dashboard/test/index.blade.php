@extends('layout.master')
@section('content')
    


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
@include ("fragment.subview")
    {{$name}}
    {{--$age--}}
    
    @if($name == "Andres")
        Es true
    @endif
    @foreach($posts as $a)
    <div class="box item">
        <p>{{$a}}</p>
    </div>
    @endforeach
<hr>
@include ("fragment.subview")
    @forelse ($posts as $a)
    <div class="box item">
        <p>*{{$a}}</p>
    </div>
    @empty
        NO HAY NADA
    @endforelse
    @endsection
    
    
</body>
</html>