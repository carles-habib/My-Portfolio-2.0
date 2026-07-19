<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use App\Models\Education;
use App\Models\Experience;
use App\Models\FunFact;
use App\Models\Image;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\QuickLinks;
use App\Models\Services;
use App\Models\skills;
use App\Models\Stories;
use App\Models\Main;

class MainController extends Controller
{
    public function index() {

        $main = Main::all();
        $quicklinks = QuickLinks::all();
        $funfact = Funfact::all();
        $ContactInfo = ContactInfo::all();
        $services = Services::all();
        $experiences = Experience::all();
        $education = Education::all();
        $image = Image::first();
        $skills = skills::all();
        $stories = Stories::all();
        $portfolios = Portfolio::with('gallery')->get();
        $categories = PortfolioCategory::orderBy('name')->get();

        return view('pages.home',compact('main','quicklinks','funfact','ContactInfo','services','experiences','education','image','skills','stories','portfolios','categories'));
    }


    public function blog()
    {
        return view('pages.blog');
    }
    public function blogdetail()
    {
        return view('pages.blog-details');
    }
    public function courses(){
        return view('pages.courses');
    }

}
