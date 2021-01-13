<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoLinkController extends Controller
{
    public function index(){
        return view('video');
    }
}
