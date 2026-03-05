<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about() {
        return view('footer.about');
    }

    public function delivery() {
        return view('footer.delivery');
    }

    public function contact() {
        return view('footer.contact-us');
    }
}
