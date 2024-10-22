<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function sliderList()
    {
        return view('backend.pages.slider.list');
    }
}
