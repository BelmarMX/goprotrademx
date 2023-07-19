<?php

namespace App\Http\Controllers;

use App\GalleryVideo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryVideoController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response() -> json( GalleryVideo::withTrashed() -> get() );
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function edit($id): JsonResponse
    {
        return response() -> json( GalleryVideo::find($id) );
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request['slug'] = Str::slug($request -> title);

        $valid = $request -> validate([
                'gallery_id'        => 'required|integer|exists:App\BlogGallery,id'
            ,   'title'             => 'required'
            ,   'description'       => 'required'
            ,   'insertion_code'    => 'required'
            ,   'full_script'       => 'required'
        ]);

        return response() -> json( GalleryVideo::create([
                'gallery_id'        => $valid['gallery_id']
            ,   'title'             => $valid['title']
            ,   'description'       => $valid['description']
            ,   'thumbnail'         => $valid['image']
            ,   'insertion_code'    => $valid['image']
            ,   'full_script'       => $valid['image']
        ]) );
    }

    /**
     * @param $id
     * @param Request $request
     * @return JsonResponse
     */
    public function update($id, Request $request): JsonResponse
    {
        $request['slug'] = Str::slug($request -> title);
        $valid = $request -> validate([
                'gallery_id'        => 'required|integer|exists:App\BlogGallery,id'
            ,   'title'             => 'required'
            ,   'description'       => 'required'
            ,   'insertion_code'    => 'required'
            ,   'full_script'       => 'required'
        ]);

        $record = GalleryVideo::find($id);
        $record -> gallery_id       = $valid['gallery_id'];
        $record -> title            = $valid['title'];
        $record -> description      = $valid['description'];
        $record -> thumbnail        = $valid['image'];
        $record -> insertion_code   = $valid['insertion_code'];
        $record -> full_script      = $valid['full_script'];

        return response() -> json( $record -> save() );
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        return response() -> json( GalleryVideo::find($id) -> delete() );
    }

    public function restore($id): JsonResponse
    {
        return response() -> json( GalleryVideo::withTrashed() -> find($id) -> restore() );
    }
}
