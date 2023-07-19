<?php

namespace App\Http\Controllers;

use App\BlogCategory;
use App\BlogSubcategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    private $img_dir;
    private $img_mw;
    private $img_mh;
    private $img_tw;
    private $img_th;

    public function __construct()
    {
        $this -> img_dir    = env('MIX_IMG_CATEGORIA_DIR');
        $this -> img_mw     = env('MIX_IMG_CATEGORIA_MW');
        $this -> img_mh     = env('MIX_IMG_CATEGORIA_MH');
        $this -> img_tw     = env('MIX_IMG_CATEGORIA_TW');
        $this -> img_th     = env('MIX_IMG_CATEGORIA_TH');
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response() -> json( BlogCategory::withTrashed() -> orderBy('order') -> get() );
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function edit($id): JsonResponse
    {
        return response() -> json( BlogCategory::find($id) );
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request['slug'] = Str::slug($request -> title);

        $valid = $request -> validate([
                'title' => 'required'
            ,   'slug'  => 'required|unique:App\BlogCategory,slug'
        ]);

        $created = BlogCategory::create([
                'title'     => $valid['title']
            ,   'slug'      => $valid['slug']
        ]);

        return response() -> json( $created );
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
                'title' => 'required'
            ,   'slug'  => 'required|unique:App\BlogCategory,slug,'.$id
        ]);

        $record = BlogCategory::find($id);
        $record -> title    = $valid['title'];
        $record -> slug     = $valid['slug'];

        return response() -> json( $record -> save() );
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        return response() -> json( BlogCategory::find($id) -> delete() );
    }

    public function restore($id)
    {
        return response() -> json( BlogCategory::withTrashed() -> find($id) -> restore() );
    }

    public function sort(Request $request): JsonResponse
    {
        $return = [
            'success' => FALSE
        ];
        foreach($request -> prepare AS $list)
        {
            $record = BlogCategory::find($list['id']);
            $record -> order    = $list['order'];
            $record -> save();
            $return = [
                'success' => TRUE
            ];
        }

        return response() -> json( $return );
    }
}
