@extends('layouts.sidebar')

@section('container')
    
    <a href="{{route('categories.create')}}" class="btn btn-default btn-e-kako">
        <i class="fa fa-tag" aria-hidden="true"></i></i> Nova kategorija
    </a>

    <hr>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr class="info">
                    <th>#</th>
                    <th>Ime</th>
                    <th>Opis</th>
                    <th class="center">Opcije</th>
                </tr>
            </thead>
            <tbody>
            @foreach($categories as $key => $value)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->description }}</td>
                    <td>
                        <a href="{{ URL::to('categories/' . $value->id . '/edit') }}">
                            <i class="fa fa-pencil edit-icon" aria-hidden="true"></i>
                        </a>
                        <a href="{{ URL::to('categories/' . $value->id) }}"
                                onclick="{{'confirmDelete' . $value->id . '()'}}">
                            <i class="fa fa-trash delete-icon" aria-hidden="true"></i>
                        </a>
    					<form id="delete-{{$value->id}}" action="{{ URL::to('categories/' . $value->id ) }}" method="POST" style="display: none;">
    						{{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
    					</form>
                    </td>
                </tr>
                 <script>
                    function {{'confirmDelete' . $value->id . '()'}}{
                        event.preventDefault();
                        var r = confirm("Da li zaista želite obrisati kategoriju {{$value->name}}?");
                        if (r == true) {
                            document.getElementById('delete-{{$value->id}}').submit();
                        }
                    }
                </script>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection