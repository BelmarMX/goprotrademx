<?php

namespace App\Http\Controllers;

use App\GalleryImage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryImageController extends Controller
{
    private $img_dir;
    private $img_mw;
    private $img_mh;

    public function __construct()
    {
        $this -> img_dir    = env('MIX_IMG_GALERIA_DIR');
        $this -> img_mw     = env('MIX_IMG_GALERIA_MW');
        $this -> img_mh     = env('MIX_IMG_GALERIA_MH');
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response() -> json( GalleryImage::withTrashed() -> get() );
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function edit($id): JsonResponse
    {
        return response() -> json( GalleryImage::find($id) );
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $valid = $request -> validate([
                'gallery_id'    => 'required|integer|exists:App\BlogGallery,id'
            ,   'title'         => 'required'
            ,   'description'   => 'required'
            ,   'image'         => "required|image|dimensions:min_width={$this -> img_mw},min_height:{$this -> img_mh}"
        ]);

        $image      = parent::upload_image($valid['image'], $this -> img_dir, $valid['name']);
        $thumb      = parent::thumbnail($valid['image'], $this -> img_dir, $this -> img_tw, $this -> img_tw, $valid['name']);
        unlink($valid['image']);

        return response() -> json( GalleryImage::create([
                'gallery_id'    => $valid['gallery_id']
            ,   'title'         => $valid['title']
            ,   'description'   => $valid['description']
            ,   'image'         => $image
            ,   'thumbnail'     => $thumb
        ]) );
    }

    /**
     * @param $id
     * @param Request $request
     * @return JsonResponse
     */
    public function update($id, Request $request): JsonResponse
    {
        $valid = $request -> validate([
                'gallery_id'    => 'required|integer|exists:App\BlogGallery,id'
            ,   'title'         => 'required'
            ,   'description'   => 'required'
        ]);

        $record = GalleryImage::find($id);
        $record -> gallery_id   = $valid['gallery_id'];
        $record -> title        = $valid['title'];
        $record -> description  = $valid['description'];

        return response() -> json( $record -> save() );
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        return response() -> json( GalleryImage::find($id) -> delete() );
    }

    public function restore($id)
    {
        return response() -> json( GalleryImage::withTrashed() -> find($id) -> restore() );
    }
}
