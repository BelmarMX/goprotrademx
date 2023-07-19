<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response() -> json( Gallery::with('elements') -> where('id', '<>', 1) -> withTrashed() -> get() );
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function edit($id): JsonResponse
    {
        return response() -> json( Gallery::find($id) );
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
            ,   'slug'      => 'required|unique:App\Gallery,slug'
            ,   'summary'   => 'required'
        ]);

        return response() -> json( Gallery::create([
                'insertion_code'    => uniqid('GIV')
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
            ,   'slug'      => 'required|unique:App\Gallery,slug,'.$id
            ,   'summary'   => 'required'
        ]);

        $record = Gallery::find($id);
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
        return response() -> json( Gallery::find($id) -> delete() );
    }

    public function restore($id): JsonResponse
    {
        return response() -> json( Gallery::withTrashed() -> find($id) -> restore() );
    }
}
