@extends('dashboard.layout')

@section('content')

    @include('dashboard.fragment._errors-form')
 <h1>Crear Categoria</h1>

    <form action="{{route('category.store')}}" method="post">
       @include('dashboard.category._form')
    </form>



@endsection