@extends('app')

@section('content')

<div class="container mt-3">
    <div class="row">
    @foreach ($album->images as $image )
    <div class="col" >
        <img src="{{ asset('album_images') }}/{{ $image->name }}" class="card-img-top" style="width: 250px; height:300px">
        <div class="card-body">
            <h5 class="card-title">{{ $image->name }}</h5>
        </div>
    </div>

    @endforeach
    </div>
</div>

@endsection
