<?php

namespace App\Http\Controllers;

use App\VideoGallery;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VideoGalleryController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response() -> json( VideoGallery::with('elements') -> withTrashed() -> get() );
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function edit($id): JsonResponse
    {
        return response() -> json( VideoGallery::find($id) );
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request['slug'] = Str::slug($request -> title);

        $valid = $request -> validate([
                'title'     => 'required'
            ,   'slug'      => 'required|unique:App\VideoGallery,slug'
            ,   'summary'   => 'required'
        ]);

        return response() -> json( VideoGallery::create([
                'insertion_code'    => uniqid('VG')
            ,   'type'              => 'mixed'
            ,   'title'             => $valid['title']
            ,   'slug'              => $valid['slug']
            ,   'summary'           => $valid['summary']
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
                'title'     => 'required'
            ,   'slug'      => 'required|unique:App\VideoGallery,slug,'.$id
            ,   'summary'   => 'required'
        ]);

        $record = VideoGallery::find($id);
        $record -> title    = $valid['title'];
        $record -> slug     = $valid['slug'];
        $record -> summary  = $valid['summary'];

        return response() -> json( $record -> save() );
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        return response() -> json( VideoGallery::find($id) -> delete() );
    }

    public function restore($id): JsonResponse
    {
        return response() -> json( VideoGallery::withTrashed() -> find($id) -> restore() );
    }
}
