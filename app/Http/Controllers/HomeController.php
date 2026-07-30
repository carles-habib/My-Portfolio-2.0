<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\FunFact;
use App\Models\Image;
use App\Models\Inbox;
use App\Models\Main;
use App\Models\QuickLinks;
use App\Models\Services;
use App\Models\Stories;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /*
     * Dashboard Pages Routs
     */
    public function index(Request $request)
    {
        $dir = true;
        $assets = ['chart', 'animation'];
        return view('dashboard.dashboard', compact('assets'),['dir' => $dir]);
    }


    /*
     * Pages Routs
     */
    public function menu()
    {
        return view('settings.menu');
    }


    public function hero(Request $request)
    {
        $main = Main::first();
        $images = Image::get();
        $funfacts = FunFact::all();
        $quicklinks = QuickLinks::all();
        return view('hero-section.hero',compact('main','images','funfacts','quicklinks'));
    }
    public function update(Request $request)
    {
        // PUT /hero has no {main} segment — `mains` is a singleton.
        $main = Main::firstOrFail();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'required|string|max:255'
        ]);
//        dd($validatedData);
        $main->update($validatedData);

        return redirect('/hero')->with('success', 'Section updated successfully.');
    }



    //quick links edit page
    public function quicklinks(QuickLinks $quicklinks)
    {
        return view('hero-section.quicklinks', compact('quicklinks'));
    }



// method to update quicklinks
    public function quicklinksupdate(Request $request)
    {
        $quicklinks = QuickLinks::firstOrFail();

        $validatedData = $request->validate([
            'pdf_file' => 'nullable|file|mimes:pdf|max:10240', // Max 10MB
            'ig' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'github' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('pdf_file')) {
            $validatedData['file_path'] = $request->file('pdf_file')->store('quicklinks', 'public');
        }
        unset($validatedData['pdf_file']);

        $quicklinks->update($validatedData);

        return redirect('/hero')->with('success', 'QuickLinks updated successfully.');
    }



    public function service()
    {
        $services = Services::orderBy('order')->get();
        return view('service-section.list',compact('services'));
    }
    public function addservice()
    {
        return view('service-section.create');
    }

    public function expedu()
    {
        $experience  = Experience::all();
        $education   = Education::all();
        return view('exp-edu-section.list',compact('experience','education'));
    }

    public function addexpedu()
    {
        return view('exp-edu-section.create');
    }


    public function stories()
    {
        $stories = Stories::all();
        return view('stories-section.list',compact('stories'));
    }

    public function addstory()
    {
        return view('stories-section.create');
    }



    public function inbox(Request $request)
    {
        $inboxes = Inbox::all();
        return view('inbox.table', compact('inboxes'));
    }
    /*
     * Extra Page Routs
     */
    public function privacypolicy(Request $request)
    {
        return view('privacy-policy');
    }
    public function termsofuse(Request $request)
    {
        return view('terms-of-use');
    }
}
