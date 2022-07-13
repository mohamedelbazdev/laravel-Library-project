<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteBookController extends Controller
{
    //

    public function books(){
        return view('site.index');
    }
}
