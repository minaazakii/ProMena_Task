@extends('app')

@section('content')
<form action="{{ route('album.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container border-1 mt-3">
        <div class="input-group mb-3">
            <span class="input-group-text" >Album Name</span>
            <input type="text" class="form-control" name="AlbumName">
        </div>

        <div class="mb-3">
            <label class="form-label">Choose Album Photos</label>
            <input class="form-control" type="file" name="image[]" accept="image/*" multiple>
        </div>
        <button class="btn btn-primary" type="submit">Save Album</button>
    </div>
</form>


@endsection
