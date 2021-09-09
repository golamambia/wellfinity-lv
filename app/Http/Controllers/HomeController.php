<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;

use App\Models\Settings;
use App\Models\Page;
use App\Models\PageExtra;
use App\Models\Category;
use App\Models\Testimonial;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $setting = Settings::whereIn('id', array(5, 6, 7))->get();
        $page = Page::where('id','1')->first();
        $extra_data = array();
        $extra_data2 = array();
        if($page){
            if($page->meta_title){
                @$setting[0]->value = $page->meta_title;
            }
            if($page->meta_keyword){
                @$setting[1]->value = $page->meta_keyword;
            }
            if($page->meta_description){
                @$setting[2]->value = $page->meta_description;
            }

            $extra_data = PageExtra::where('page_id',$page->id)->orderBy('rank', 'asc')->get();
            $testimonials = Testimonial::where('status',1)->get();
            $extra_data2 = PageExtra::where('page_id',3)->get();
            return view('frontend.home', compact('page', 'extra_data','testimonials','extra_data2'));
        }else{
            return redirect('404');
        }
    }
}
