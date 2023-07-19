<?php

namespace App\Http\Controllers;

use App\VideoGallery;
use App\VideoGalleryElement;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VideoGalleryElementController extends Controller
{
    private $img_dir;
    private $img_mw;
    private $img_mh;
    private $img_tw;
    private $img_th;

    public function __construct()
    {
        $this -> img_dir    = env('MIX_IMG_FOTOGALERIA_DIR');
        $this -> img_mw     = env('MIX_IMG_FOTOGALERIA_MW');
        $this -> img_mh     = env('MIX_IMG_FOTOGALERIA_MH');
        $this -> img_tw     = env('MIX_IMG_FOTOGALERIA_TW');
        $this -> img_th     = env('MIX_IMG_FOTOGALERIA_TH');
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response() -> json( VideoGalleryElement::withTrashed() -> get() );
    }

    public function get_gallery($id): JsonResponse
    {
        return response() -> json( VideoGalleryElement::withTrashed()
            -> where('video_gallery_id', $id)
            -> get()
        );
    }

    public function get_images(): JsonResponse
    {
        return response() -> json( VideoGalleryElement::where('type', 'image')
            -> get()
        );
    }

    public function url_gallery($id): JsonResponse
    {
        $gallery    = VideoGallery::find($id);
        $url        = url("embed/{$gallery -> insertion_code}");

        return response() -> json(['url' => $url]);
    }

    public function url_images($id): JsonResponse
    {
        $gallery = VideoGalleryElement::find($id);
        $url = url("storage/{$this -> img_dir}/{$gallery -> image}");

        return response() -> json(['url' => $url]);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function edit($id): JsonResponse
    {
        return response() -> json( VideoGalleryElement::find($id) );
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $valid = $request -> validate([
                'video_gallery_id'  => 'required|integer|exists:App\VideoGallery,id'
            ,   'type'              => 'required|in:image,video'
            ,   'title'             => 'required'
            ,   'description'       => 'required'
            ,   'image'             => "nullable|image|dimensions:min_width={$this -> img_mw},min_height:{$this -> img_mh}"
            ,   'url'               => "nullable|url"
        ]);

        $image  = NULL;
        $thumb  = NULL;
        $url    = NULL;
        if( $valid['type'] == 'image' && isset($valid['image']) )
        {
            $image  = parent::upload_image($valid['image'], $this -> img_dir, $valid['title']);
            $thumb  = parent::thumbnail($valid['image'], $this -> img_dir, $this -> img_tw, $this -> img_th, $valid['title']);
        }
        elseif($valid['type'] == 'video')
        {
            $url    = $valid['url'];
            $thumb  = parent::yt_preview($valid['url']);
        }

        return response() -> json( VideoGalleryElement::create([
                'video_gallery_id'  => $valid['video_gallery_id']
            ,   'type'              => $valid['type']
            ,   'title'             => $valid['title']
            ,   'description'       => $valid['description']
            ,   'image'             => $image
            ,   'thumbnail'         => $thumb
            ,   'url'               => $url
            ,   'insertion_code'    => uniqid('VGE')
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
        $valid = $request -> validate([
                'video_gallery_id'  => 'required|integer|exists:App\VideoGallery,id'
            ,   'type'              => 'required|in:image,video'
            ,   'title'             => 'required'
            ,   'description'       => 'required'
            ,   'image'             => "nullable|image|dimensions:min_width={$this -> img_mw},min_height:{$this -> img_mh}"
            ,   'url'               => "nullable|url"
        ]);

        $record = VideoGalleryElement::find($id);
        $record -> video_gallery_id = $valid['video_gallery_id'];
        $record -> type             = $valid['type'];
        $record -> title            = $valid['title'];
        $record -> description      = $valid['description'];
        $image  = $record -> image;
        $thumb  = $record -> thumbnail;
        $url    = $record -> url;
        if( $valid['type'] == 'image' && isset($valid['image']) )
        {
            $image  = parent::upload_image($valid['image'], $this -> img_dir, $valid['title']);
            $thumb  = parent::thumbnail($valid['image'], $this -> img_dir, $this -> img_tw, $this -> img_th, $valid['title']);
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
        return response() -> json( VideoGalleryElement::find($id) -> delete() );
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function restore($id): JsonResponse
    {
        return response() -> json( VideoGalleryElement::withTrashed() -> find($id) -> restore() );
    }
}
