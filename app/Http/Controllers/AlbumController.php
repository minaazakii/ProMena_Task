<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        return view('album.index',
        [
            'albums'=>$albums
        ]);
    }

    public function show(Album $album)
    {
        return view('album.show',
        [
            'album'=>$album
        ]);
    }

    public function create()
    {
        return view('album.create');
    }

    public function store(Request $request)
    {
        $album = new Album();
        $album->title = $request->AlbumName;
        $album->save();
        if($request->has('image'))
        {
            foreach($request->image as $image)
            {
                $imageName = '-image-'.time().rand(1,1000).'.'.$image->extension();
                $image->move(public_path('album_images'),$imageName);
                $newImage = new Image();
                $newImage->album_id = $album->id;
                $newImage->name = $imageName;
                $newImage->save();
            }
        }

        return redirect()->route('album.index')->with('success','Album Added Successfully');
    }

    public function edit(Album $album)
    {
        return view('album.edit',
        [
            'album'=>$album
        ]);
    }

    public function update(Album $album,Request $request)
    {
        $imagesDestination = public_path('album_images');
        foreach($album->images as $image)
        {
            File::delete($imagesDestination.'\\'.$image->name);
            $image->delete();
        }

        $album->title = $request->AlbumName;
        $album->update();
        if($request->has('image'))
        {
            foreach($request->image as $image)
            {
                $imageName = '-image-'.time().rand(1,1000).'.'.$image->extension();
                $image->move(public_path('album_images'),$imageName);
                $newImage = new Image();
                $newImage->album_id = $album->id;
                $newImage->name = $imageName;
                $newImage->save();
            }
        }

        return redirect()->route('album.index')->with('success','Album updated Successfully');
    }

    public function delete(Request $request)
    {

        $album = Album::find($request->id);
        $imagesDestination = public_path('album_images');
        foreach($album->images as $image)
        {
            File::delete($imagesDestination.'\\'.$image->name);
            $image->delete();
        }
        $album->delete();
    }

    public function moveIndex($id)
    {
        $album = Album::find($id);
        $albums = Album::all();
        return view('album.chooseMove',
        [
           'albumToDelete'=>$album,
           'albums'=>$albums
        ]);
    }

    public function moveTo(Album $albumToDelete,Request $request)
    {
        foreach($albumToDelete->images as $image)
        {
            $image->album_id = $request->newAlbum;
            $image->update();
        }
        $albumToDelete->delete();
        return redirect()->route('album.index')->with('success','Album Moved Successfully');
    }


}
