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
                        <a href="{{ route('categories.edit', ['category' => $value]) }}">
                            <i class="fa fa-pencil edit-icon" aria-hidden="true"></i>
                        </a>
                        <a href="{{ route('categories.destroy', ['category' => $value])  }}"
                                onclick="{{'confirmDelete' . $value->id . '()'}}">
                            <i class="fa fa-trash delete-icon" aria-hidden="true"></i>
                        </a>
    					<form id="delete-{{$value->id}}" action="{{ route('categories.destroy', ['category' => $value]) }}" method="POST" style="display: none;">
    						{{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
    					</form>
                    </td>
                </tr>
                 <script>
                    function {{'confirmDelete' . $value->id . '()'}}{
                        event.preventDefault();
                        swal({
                            title: "Pažnja",
                            text: "Da li zaista želite obrisati kategoriju {{$value->name}}?",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#cf6766",
                            confirmButtonText: "Da, izbriši!",
                            cancelButtonText: "Ne vrati se!",
                            closeOnConfirm: false,
                            closeOnCancel: true
                        },
                        function(isConfirm){
                            if (isConfirm) {
                                document.getElementById('delete-{{$value->id}}').submit();
                            }
                        });
                    }
                </script>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection