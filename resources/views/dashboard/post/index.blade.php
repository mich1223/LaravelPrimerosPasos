@extends('dashboard.layout')

@section('content')
    
   

    <table>
            <thead>
                <tr>
                    <th>
                        Titulo
                    </th>
                    
                    <th>
                        Categoria
                    </th>

                    <th>
                        Posted
                    </th>

                    <th>
                        Acciones
                    </th>
                
                    <th>
                        Modificar
                    </th>
                </tr>
            </thead>    
        

        <tbody>
            @foreach ($posts as $p)
                    <tr>
                        <td>
                            {{$p->title}}
                        </td>
                        
                        <td>
                            {{$p->category->title}}
                        </td>
        
                        <td>
                            {{$p->posted}}
                        </td>
        
                        <td>
                            Acciones
                        </td>
                       
                        <td>
                            <a href={{route("post.edit", $p)}}>Editar</a>
                            <a href={{route("post.show", $p)}}>Ver</a>
                            <form action="{{route("post.destroy", $p)}}" method="post">
                                @method("DELETE")
                                    @csrf
                                    <button type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                        
            @endforeach
        </tbody>
    </table>
    {{$posts->links()}}
@endsection