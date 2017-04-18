@extends('layouts.sidebar')

@section('container')
    
    <a href="{{route('posts.create')}}" class="btn btn-default btn-e-kako">
        <i class="fa fa-file-text-o" aria-hidden="true"></i> Novi post
    </a>

    <hr>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr class="info">
                    <th>#</th>
                    <th>Naslov</th>
                    <th>Kategorija</th>
                    <th style="text-align: center;">Objavljeno</th>
                    <th class="center">Opcije</th>
                </tr>
            </thead>
            <tbody>
            @foreach($posts as $key => $value)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $value->title }}</td>
                    <td>{{ $value->category->name }}</td>
                    <td>
                        @if($value->public)
                        <div class="published-icon-outer">
                            <div class="public-icon-inner"></div>
                        </div>
                        @else
                        <div class="published-icon-outer">
                            <div class="not-public-icon-inner"></div>
                        </div>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('posts.edit', ['post' => $value]) }}">
                            <i class="fa fa-pencil edit-icon" aria-hidden="true"></i>
                        </a>
                        <a href="{{ route('posts.destroy', ['post' => $value]) }}"
                                onclick="{{'confirmDelete' . $value->id . '()'}}">
                            <i class="fa fa-trash delete-icon" aria-hidden="true"></i>
                        </a>
    					<form id="delete-{{$value->id}}" action="{{ route('posts.destroy', ['post' => $value]) }}" method="POST" style="display: none;">
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
                            text: "Da li zaista želite obrisati post {{$value->title}}?",
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
    {{ $posts->links() }}
@endsection