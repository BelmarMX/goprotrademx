<?php

namespace App\Http\Controllers;

use App\BlogArticle;
use App\BlogCategory;
use App\GalleryElements;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function slugger($text): string
    {
        return Str::slug($text);
    }

    /**
     * Genera el nombre del archivo
     * @param $image
     * @param $slug
     * @param $suffix
     * @return string
     */
    public function slug_image( $image, $slug, $suffix = ''): string
    {
        $time       = date('YmdHis');
        $original   = $image -> getClientOriginalName();
        $ext        = pathinfo($original, PATHINFO_EXTENSION);
        $hasSuffix  = $suffix != '' ? "-$suffix" : "";
        return  Str::slug($slug) . '-' . $time . $hasSuffix . '.' . $ext;
    }

    /**
     * Carga una imagen en su tamaño original
     * @param $image
     * @param $dir
     * @param $name
     * @return string
     */
    public function upload_image($image, $dir, $name): string
    {
        $file_name  = self::slug_image($image, $name);
        $file       = Image::make($image);

        Storage::put("public/$dir/$file_name", $file -> stream());
        return $file_name;
    }

    /**
     * Carga una imagen en tamaño recortado
     * @param $image
     * @param $dir
     * @param $width
     * @param $height
     * @param $name
     * @param string $suffix
     * @return string
     */
    public function thumbnail($image, $dir, $width, $height, $name, string $suffix = 'thumb'): string
    {
        $o_width    = $width;
        $o_height   = $height;
        $width > $height
            ? $width = NULL
            : $height = NULL;

        $file_name  = self::slug_image($image, $name, $suffix);
        $file = Image::make($image) -> resize($width, $height, function($constraint){
            $constraint -> aspectRatio();
            $constraint -> upsize();
        }) -> fit($o_width, $o_height);

        Storage::put("public/$dir/$file_name", $file -> stream());
        return $file_name;
    }

    /**
     * Devuelve la vista previa de los videos de YouTube
     * @param $url
     * @return string|null
     */
    public function yt_preview($url): ?string
    {
        $code = self::yt_code($url);
        return !is_null($code)
            ? "https://i3.ytimg.com/vi/$code/hqdefault.jpg"
            : $code
        ;
    }

    public function yt_code($url): ?string
    {
        if( Str::contains($url, ['youtube.com', 'youtu.be']) )
        {
            if( Str::contains($url, ['youtu.be', 'embed/']) )
            {
                $code = Str::afterLast($url, '/');
            }
            else{
                $code = Str::afterLast($url, '?v=');
            }
            return $code;
        }
        return NULL;
    }

    /*
    |--------------------------------------------------------------------------
    | We need this sections in every page
    |--------------------------------------------------------------------------
    */
    public function get_banners()
    {
        return GalleryElements::where('gallery_id', 1) -> get();
    }

    public function get_categories()
    {
        return BlogCategory::orderBy('order') -> orderBy('created_at', 'DESC') -> get();
    }

    public function lastest_articles($limit = 10)
    {
        return BlogArticle::with(['category'])
            -> where('published_at', '<=', Carbon::now())
            -> orderBy('published_at', 'DESC')
            -> orderBy('created_at', 'DESC')
            -> limit($limit)
            -> get();
    }
}
