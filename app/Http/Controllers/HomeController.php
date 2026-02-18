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
use PhpOffice\PhpSpreadsheet\Calculation\Web\Service;

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
        $main = Main::find(1);
        $images = Image::get();
        $funfacts = FunFact::all();
        $quicklinks = QuickLinks::all();
        return view('hero-section.hero',compact('main','images','funfacts','quicklinks'));
    }
    public function update(Request $request,  Main $main)
    {

        $main = Main::findOrFail(1); // Or Main::find(1) if always ID 1

//        dd($request->all());
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
        dd($quicklinks);
        return view('hero-section.quicklinks', compact('quicklinks'));
    }



// method to update quicklinks
    public function quicklinksupdate(Request $request,  QuickLinks $quicklinks)
    {
        $quicklinks = QuickLinks::findOrFail(1);

//        dd($request->all());
        $validatedData = $request->validate([
            'pdf_file' => 'required|file|mimes:pdf|max:10240', // Max 10MB
            'ig' => 'required|string|max:255',
            'youtube' => 'required|string',
            'linkedin' => 'required|string|max:255',
            'github' => 'required|string|max:255'
        ]);

//        dd($validatedData);
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
    public function billing(Request $request)
    {
        return view('special-pages.billing');
    }

    public function calender(Request $request)
    {
        $assets = ['calender'];
        return view('special-pages.calender',compact('assets'));
    }

    public function kanban(Request $request)
    {
        return view('special-pages.kanban');
    }

    public function pricing(Request $request)
    {
        return view('special-pages.pricing');
    }

    public function rtlsupport(Request $request)
    {
        return view('special-pages.rtl-support');
    }

    public function timeline(Request $request)
    {
        return view('special-pages.timeline');
    }


    /*
     * Widget Routs
     */
    public function widgetbasic(Request $request)
    {
        return view('widget.widget-basic');
    }
    public function widgetchart(Request $request)
    {
        $assets = ['chart'];
        return view('widget.widget-chart', compact('assets'));
    }
    public function widgetcard(Request $request)
    {
        return view('widget.widget-card');
    }

    /*
     * Maps Routs
     */
    public function google(Request $request)
    {
        return view('maps.google');
    }
    public function vector(Request $request)
    {
        return view('maps.vector');
    }

    /*
     * Auth Routs
     */
    public function signin(Request $request)
    {
        return view('auth.login');
    }
    public function signup(Request $request)
    {
        return view('auth.register');
    }
    public function confirmmail(Request $request)
    {
        return view('auth.confirm-mail');
    }
    public function lockscreen(Request $request)
    {
        return view('auth.lockscreen');
    }
    public function recoverpw(Request $request)
    {
        return view('auth.recoverpw');
    }
    public function userprivacysetting(Request $request)
    {
        return view('auth.user-privacy-setting');
    }

    /*
     * Error Page Routs
     */

    public function error404(Request $request)
    {
        return view('errors.error404');
    }

    public function error500(Request $request)
    {
        return view('errors.error500');
    }
    public function maintenance(Request $request)
    {
        return view('errors.maintenance');
    }

    /*
     * uisheet Page Routs
     */

    /*
     * Form Page Routs
     */
    public function element(Request $request)
    {
        return view('forms.element');
    }

    public function wizard(Request $request)
    {
        return view('forms.wizard');
    }

    public function validation(Request $request)
    {
        return view('forms.validation');
    }

     /*
     * Table Page Routs
     */
    public function bootstraptable(Request $request)
    {
        return view('table.bootstraptable');
    }

    public function datatable(Request $request)
    {
        return view('table.datatable');
    }

    /*
     * Icons Page Routs
     */

    public function solid(Request $request)
    {
        return view('icons.solid');
    }

    public function outline(Request $request)
    {
        return view('icons.outline');
    }

    public function dualtone(Request $request)
    {
        return view('icons.dualtone');
    }

    public function colored(Request $request)
    {
        return view('icons.colored');
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
