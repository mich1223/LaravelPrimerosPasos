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
                
                </tr>
            </thead>    
        

        <tbody>
            @foreach ($posts as $p)
                    <tr>
                        <td>
                            {{$p->title}}
                        </td>
                        
                        <td>
                            Categoria
                        </td>
        
                        <td>
                            {{$p->posted}}
                        </td>
        
                        <td>
                            Acciones
                        </td>
                    </tr>
                        
            @endforeach
        </tbody>
    </table>
    {{$posts->links()}}
@endsection