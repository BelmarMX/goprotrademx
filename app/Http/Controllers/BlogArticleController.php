<?php

namespace App\Http\Controllers;

use App\BlogArticle;
use App\BlogArticleTags;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogArticleController extends Controller
{
    private $img_dir;
    private $img_mw;
    private $img_mh;
    private $img_fw;
    private $img_fh;
    private $img_tw;
    private $img_th;

    public function __construct()
    {
        $this -> img_dir    = env('MIX_IMG_ARTICULO_DIR');
        $this -> img_mw     = env('MIX_IMG_ARTICULO_MW');
        $this -> img_mh     = env('MIX_IMG_ARTICULO_MH');
        $this -> img_fw     = env('MIX_IMG_ARTICULODESTACADO_MW');
        $this -> img_fh     = env('MIX_IMG_ARTICULODESTACADO_MH');
        $this -> img_tw     = env('MIX_IMG_ARTICULO_TW');
        $this -> img_th     = env('MIX_IMG_ARTICULO_TH');
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response() -> json( BlogArticle::with(['category'])
            -> withTrashed()
            -> get()
        );
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function edit($id): JsonResponse
    {
        return response() -> json( BlogArticle::with(['category']) -> find($id) );
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request['slug'] = Str::slug($request -> title);

        $valid = $request -> validate([
                'category_id'       => 'required|integer|exists:App\BlogCategory,id'
            ,   'title'             => 'required'
            ,   'slug'              => 'required|unique:App\BlogArticle,slug'
            ,   'image'             => "required|image|dimensions:min_width={$this -> img_mw},min_height:{$this -> img_mh}"
            ,   'summary'           => 'required|string'
            ,   'content'           => 'required|string'
            ,   'published_at'      => 'required|date'
        ]);

        $image      = parent::upload_image($valid['image'], $this -> img_dir, $valid['title']);
        $thumb      = parent::thumbnail($valid['image'], $this -> img_dir, $this -> img_tw, $this -> img_th, $valid['title']);

        $saved =  BlogArticle::create([
                'category_id'       => $valid['category_id']
            ,   'title'             => $valid['title']
            ,   'slug'              => $valid['slug']
            ,   'image'             => $image
            ,   'thumbnail'         => $thumb
            ,   'summary'           => $valid['summary']
            ,   'content'           => $valid['content']
            ,   'visited'           => 0
            ,   'published_at'      => $valid['published_at']
        ]);

        return response() -> json( $saved );
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
                'category_id'       => 'required|integer|exists:App\BlogCategory,id'
            ,   'title'             => 'required'
            ,   'slug'              => 'required|unique:App\BlogArticle,slug,'.$id
            ,   'image'             => "nullable|image|dimensions:min_width={$this -> img_mw},min_height:{$this -> img_mh}"
            ,   'summary'           => 'required|string'
            ,   'content'           => 'required|string'
            ,   'published_at'      => 'required|date'
        ]);

        $record = BlogArticle::find($id);
        $record -> category_id      = $valid['category_id'];
        $record -> title            = $valid['title'];
        $record -> slug             = $valid['slug'];
        $image      = $record -> image;
        $thumb      = $record -> thumbnail;
        if( isset($valid['image']) )
        {
            $image      = parent::upload_image($valid['image'], $this -> img_dir, $valid['title']);
            $thumb      = parent::thumbnail($valid['image'], $this -> img_dir, $this -> img_tw, $this -> img_th, $valid['title']);
        }
        $record -> image            = $image;
        $record -> thumbnail        = $thumb;
        $record -> summary          = $valid['summary'];
        $record -> content          = $valid['content'];
        $record -> published_at     = $valid['published_at'];

        return response() -> json( $record -> save() );
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        return response() -> json( BlogArticle::find($id) -> delete() );
    }

    public function restore($id): JsonResponse
    {
        return response() -> json( BlogArticle::withTrashed() -> find($id) -> restore() );
    }
}
