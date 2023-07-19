<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\GalleryElements;
use App\GalleryImage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Mixed_;
use PhpParser\Node\Scalar\String_;

class GalleryElementsController extends Controller
{
    private $img_dir;
    private $img_mw;
    private $img_mh;
    private $img_tw;
    private $img_th;

    public function __construct()
    {
        $this -> img_dir    = env('MIX_IMG_GALERIA_DIR');
        $this -> img_mw     = env('MIX_IMG_GALERIA_MW');
        $this -> img_mh     = env('MIX_IMG_GALERIA_MH');
        $this -> img_tw     = env('MIX_IMG_GALERIA_TW');
        $this -> img_th     = env('MIX_IMG_GALERIA_TH');
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response() -> json( GalleryElements::withTrashed() -> get() );
    }

    public function get_gallery($id): JsonResponse
    {
        return response() -> json( GalleryElements::withTrashed()
            -> where('gallery_id', $id)
            -> get()
        );
    }

    public function get_images(): JsonResponse
    {
        return response() -> json( GalleryElements::where('type', 'image')
            -> get()
        );
    }

    public function url_gallery($id): JsonResponse
    {
        $gallery    = Gallery::find($id);
        $url        = url("embed/{$gallery -> insertion_code}");

        return response() -> json(['url' => $url]);
    }

    public function url_images($id): JsonResponse
    {
        $gallery = GalleryElements::find($id);
        $img_dir = $gallery -> gallery_id == 1
            ? env('MIX_IMG_BANNER_DIR')
            : $this -> img_dir
        ;
        $url = url("storage/{$img_dir}/{$gallery -> image}");

        return response() -> json(['url' => $url]);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function edit($id): JsonResponse
    {
        return response() -> json( GalleryElements::find($id) );
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        // Validar si la galería es correspondiente al banner o no
        $img_dir = $request -> gallery_id == 1
            ? env('MIX_IMG_BANNER_DIR')
            : $this -> img_dir
        ;
        $img_mw = $request -> gallery_id == 1
            ? env('MIX_IMG_BANNER_MW')
            : $this -> img_mw
        ;
        $img_tw = $request -> gallery_id == 1
            ? env('MIX_IMG_BANNER_TW')
            : $this -> img_tw
        ;
        $img_mh = $request -> gallery_id == 1
            ? env('MIX_IMG_BANNER_MW')
            : $this -> img_mw
        ;
        $img_th = $request -> gallery_id == 1
            ? env('MIX_IMG_BANNER_TH')
            : $this -> img_th
        ;

        $valid = $request -> validate([
                'gallery_id'    => 'required|integer|exists:App\Gallery,id'
            ,   'type'          => 'required|in:image,video'
            ,   'title'         => 'required'
            ,   'description'   => 'required'
            ,   'image'         => "nullable|image|dimensions:min_width={$img_mw},min_height:{$img_mh}"
            ,   'url'           => "nullable|url"
        ]);

        $image  = NULL;
        $thumb  = NULL;
        $url    = NULL;
        if( $valid['type'] == 'image' && isset($valid['image']) )
        {
            $image  = parent::upload_image($valid['image'], $img_dir, $valid['title']);
            $thumb  = parent::thumbnail($valid['image'], $img_dir, $img_tw, $img_th, $valid['title']);
        }
        elseif($valid['type'] == 'video')
        {
            $url    = $valid['url'];
            $thumb  = parent::yt_preview($valid['url']);
        }

        return response() -> json( GalleryElements::create([
                'gallery_id'        => $valid['gallery_id']
            ,   'type'              => $valid['type']
            ,   'title'             => $valid['title']
            ,   'description'       => $valid['description']
            ,   'image'             => $image
            ,   'thumbnail'         => $thumb
            ,   'url'               => $url
            ,   'insertion_code'    => uniqid('GE')
            ,   'full_script'       => NULL
        ]) );
    }

    /**
     * @param $id
     * @param Request $request
     * @return JsonResponse
     */
    public function update($id, Request $request): JsonResponse
    {
        // Validar si la galería es correspondiente al banner o no
        $img_dir = $request -> gallery_id == 1
            ? env('MIX_IMG_BANNER_DIR')
            : $this -> img_dir
        ;
        $img_mw = $request -> gallery_id == 1
            ? env('MIX_IMG_BANNER_MW')
            : $this -> img_mw
        ;
        $img_tw = $request -> gallery_id == 1
            ? env('MIX_IMG_BANNER_TW')
            : $this -> img_tw
        ;
        $img_mh = $request -> gallery_id == 1
            ? env('MIX_IMG_BANNER_MW')
            : $this -> img_mw
        ;
        $img_th = $request -> gallery_id == 1
            ? env('MIX_IMG_BANNER_TH')
            : $this -> img_th
        ;
        $valid = $request -> validate([
                'gallery_id'    => 'required|integer|exists:App\Gallery,id'
            ,   'type'          => 'required|in:image,video'
            ,   'title'         => 'required'
            ,   'description'   => 'required'
            ,   'image'         => "nullable|image|dimensions:min_width={$img_mw},min_height:{$img_mh}"
            ,   'url'           => "nullable|url"
        ]);

        $record = GalleryElements::find($id);
        $record -> gallery_id   = $valid['gallery_id'];
        $record -> type         = $valid['type'];
        $record -> title        = $valid['title'];
        $record -> description  = $valid['description'];
        $image  = $record -> image;
        $thumb  = $record -> thumbnail;
        $url    = $record -> url;
        if( $valid['type'] == 'image' && isset($valid['image']) )
        {
            $image  = parent::upload_image($valid['image'], $img_dir, $valid['title']);
            $thumb  = parent::thumbnail($valid['image'], $img_dir, $img_tw, $img_th, $valid['title']);
        }
        elseif($valid['type'] == 'video')
        {
            $url    = $valid['url'];
            $thumb  = parent::yt_preview($valid['url']);
        }
        $record -> image        = $image;
        $record -> thumbnail    = $thumb;
        $record -> url          = $url;

        return response() -> json( $record -> save() );
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        return response() -> json( GalleryElements::find($id) -> delete() );
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function restore($id): JsonResponse
    {
        return response() -> json( GalleryElements::withTrashed() -> find($id) -> restore() );
    }
}
