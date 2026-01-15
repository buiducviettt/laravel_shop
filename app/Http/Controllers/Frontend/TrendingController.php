<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrendingController extends Controller
{
    //
    public function index(){
        $categories = [
            ['name' => 'Dresses', 'image' => 'resources/images/trending/trend1.png'],
            ['name' => 'Bottoms', 'image' => 'resources/images/trending/trend2.png'],
            ['name' => 'Jewellery', 'image' => 'resources/images/trending/trend3.png'],
            
        ];
        $trendings = [
            ['image' => 'resources/images/trending/trend1.png', 'type' => 'tall'],
            ['image' => 'resources/images/trending/trend2.png', 'type' => 'short'],
            ['image' => 'resources/images/trending/trend2.png', 'type' => 'short'],
            ['image' => 'resources/images/trending/trend3.png', 'type' => 'wide'],
            ['image' => 'resources/images/trending/trend1.png', 'type' => 'tall'],
            ['image' => 'resources/images/trending/trend2.png', 'type' => 'short'],
        ];
        return view('frontend.trending') ->with(compact ('categories', 'trendings'));
    }
   
}
