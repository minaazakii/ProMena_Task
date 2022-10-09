@extends('app')

@section('content')
<div class="container mt-3">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Album Title</th>
            <th scope="col">No. of Photos</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
            @foreach ( $albums as $index => $album )
            <tr>
                <th scope="row">{{ $index+1 }}</th>
                <td>{{ $album->title }}</td>
                <td>{{ $album->images->count() }}</td>
                <td><a href="{{ route('album.show',$album) }}"  class="btn btn-outline-info">View Album</a></td>
                <td>
                    <button type="button" onclick="getId({{ $album->id }})" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Delete Album
                    </button>
                </td>
                <!-- Modal -->
                <form id="deleteForm">
                    @csrf
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            What Do you want to do?
                            </div>
                            <div class="modal-footer">
                            <button type="button"  onclick="moveAlbum()" class="move btn btn-secondary">Move to Another Album</button>
                            <button type="submit"  class="delete btn btn-danger">Delete Album</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
                <td><a href="{{ route('album.edit',$album) }}" class="btn btn-outline-warning">Edit Album</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
