<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $title = 'Welcome to SYM!!';
        return view('pages.index')->with('title', $title);
    }
    
    public function about()
    {
        $title = 'About us!';
        return view('pages.about', compact('title'));
    }
    
    public function services()
    {
        $data = array(
            'title' => 'Services Page',
            'services' => ['Web Design', 'Programming', 'SEO']
        );
        return view('pages.services')->with($data);
    }

    public function contact(){
        $title = 'Contact Us';
        return view('pages.contact', compact('title'));
    }
}
