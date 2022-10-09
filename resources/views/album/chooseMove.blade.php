@extends('app')

@section('content')
<Form action="{{ route('album.moveTo',$albumToDelete) }}" method="POST">
    @csrf
<div class="container mt-3">
    <label for=""></label>
    <select name="newAlbum" class=" form-select" aria-label="Default select example">
        <option selected disabled>Choose album Name you want photos move to</option>
        @foreach ($albums as $album )
        @if($album->id == $albumToDelete->id)
            @continue
        @endif
            <option value="{{ $album->id }}">{{ $album->title }}</option>
        @endforeach
      </select>
      <button type="submit" class="mt-3 btn btn-success">Move</button>
</div>

</Form>
@endsection
