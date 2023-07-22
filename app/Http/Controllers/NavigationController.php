<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\BlogArticle;
use App\BlogCategory;
use App\Mail\ContactoMail;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class NavigationController extends Controller
{
    public function __construct()
    {
        $this -> send		= array();
        $this -> recipent	= env('MAIL_RECEPTION');
        $this -> privatekey	= env('APP_ENV') == 'local' ? env('SB_CAPTCHA_SECRET') : env('CAPTCHA_SECRET');
    }

    public function index()
    {
        return view('site.v2.welcome') -> with([
                'all_categories'    => parent::get_categories()
            ,   'lastest'           => parent::lastest_articles(3)
            ,   'banners'           => parent::get_banners()
        ]);
    }

    public function services()
    {
        return view('site.v2.services') -> with([
                'all_categories'    => parent::get_categories()
            ,   'lastest'           => parent::lastest_articles(3)
            ,   'banners'           => parent::get_banners()
        ]);
    }

    public function company()
    {
        return view('site.v2.company') -> with([
                'all_categories'    => parent::get_categories()
            ,   'lastest'           => parent::lastest_articles(3)
            ,   'banners'           => parent::get_banners()
        ]);
    }

    public function embed($code)
    {
        return view('site.v2.embebido') -> with([
            'gallery' => Gallery::where('insertion_code', $code) -> with('elements') -> first()
        ]);
    }

    public function privacyPolicy()
    {
        return view('site.v2.privacy-policy') -> with([
                'all_categories' => parent::get_categories()
        ]);
    }

    public function blog()
    {
        $entries    = BlogArticle::with(['category'])
            -> where('published_at', '<=', Carbon::now())
            -> orderBy('published_at', 'DESC')
            -> orderBy('created_at', 'DESC')
            -> paginate(10);

        return view('site.v2.blog') -> with([
                'entries'           => $entries
            ,   'blog_categories'   => parent::get_categories()
        ]);
    }

    public function byCategory($category)
    {
        $record     = BlogCategory::where('slug', $category) -> first();
        if( !$record )
        {
            abort(404);
        }

        $entries    = BlogArticle::with(['category'])
            -> where('published_at', '<=', Carbon::now())
            -> where('category_id', $record -> id)
            -> orderBy('published_at', 'DESC')
            -> orderBy('created_at', 'DESC')
            -> paginate(10);

        return view('site.v2.by-category') -> with([
                'blog_categories'   => parent::get_categories()
            ,   'lastest'           => parent::lastest_articles(3)
            ,   'record'            => $record
            ,   'entries'           => $entries
        ]);
    }

    public function article($category, $article)
    {
        $record    = BlogArticle::with(['category'])
            -> where('published_at', '<=', Carbon::now())
            -> where('slug', $article)
            -> orderBy('published_at', 'DESC')
            -> orderBy('created_at', 'DESC')
            -> first();
        if( !$record )
        {
            abort(404);
        }
        $record -> increment('visited');

        $related    = BlogArticle::with(['category'])
            -> where('published_at', '<=', Carbon::now())
            -> where('id', '<>', $record -> id)
            -> inRandomOrder()
            -> limit(3)
            -> get();

        return view('site.v2.article') -> with([
                'blog_categories'    => parent::get_categories()
            ,   'record'            => $record
            ,   'related'           => $related
        ]);
    }

    public function contact(){
        return view('site.v2.contact', [
            'banners'           => parent::get_banners()
        ]);
    }

    public function thanks(){
        return view('site.v2.thanks') -> with([
                'all_categories'    => parent::get_categories()
        ]);
    }
    public function sent(){
        return self::thanks();
    }

    public function mailContact(Request $request)
    {
        // Validation
        $validate =  $this -> validate( $request, [
                'g-recaptcha-response'	=> 'required'
            ,	'email'					=> 'required|email'
            ,	'nombre'				=> 'required|string'
            ,	'celular'				=> 'required|string'
            ,	'asunto'				=> 'required|string'
            ,	'comentarios'			=> 'nullable|string'
        ]);

        //re-captcha-vertify
        $re_url			= 'https://www.google.com/recaptcha/api/siteverify';
        $re_data		= array(
            'secret'	=> $this -> privatekey
        ,	'response'	=> $validate['g-recaptcha-response']
        );
        $re_query		= http_build_query($re_data);
        $re_options		= array(
            'http' => array(
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                    . "Content-Length: ".strlen($re_query)."\r\n"
                    . "User-Agent:MyAgent/1.0\r\n"
                ,	'method'	=> 'POST'
                ,	'content'	=> $re_query
            )
        );
        $re_context			= stream_context_create($re_options);
        $re_verify			= file_get_contents($re_url, false, $re_context);
        $captcha_success	= json_decode($re_verify);

        if( (env('APP_ENV') == 'production' && $captcha_success -> success) || env('APP_ENV') == 'local' )
        {
            Mail::to($validate['email'], $validate['nombre'])
                -> bcc($this -> recipent)
                -> send( new ContactoMail($validate) )
            ;

            return redirect() -> route('enviado');
        } else {
            $this -> send['type']		= 'danger';
            $this -> send['message']	= 'Hay un error en el envío del formulario.';

            return  back()
                -> with('alert', $this -> send);
        }
    }
}
