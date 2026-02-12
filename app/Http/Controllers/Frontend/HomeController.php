<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Collection;
use App\Models\CuratedPin;
use Illuminate\Http\Request;
use App\Models\Page;

class HomeController extends Controller
{
    protected array $layoutMap = [
        0 => 'trend-card tall',
        1 => 'trend-card',
        2 => 'trend-card',
        3 => 'trend-card',
        4 => 'trend-card tall',
        5 => 'trend-card ',
        6 => 'trend-card',
    ];
    public function index()
    {
        $page = Page::where('slug', 'home')->firstOrFail();
        // lấy danh sách collection_id theo thứ tự admin chọn
        $trendingIds = collect($page->content['trending'] ?? [])
            ->pluck('collection_id')
            ->toArray();
        // query collection theo collection_id
        $collections = Collection::whereIn('id', $trendingIds)
            ->get()
            ->keyBy('id');
        // lấy danh mục category 
        $categories = Category::all()->keyBy('id');
        // Curated Pins
        $curatedPinIds = collect($page->content['curated_pins'] ?? [])
            ->pluck('curated_pin_id')
            ->values();
        $curatedPins = CuratedPin::whereIn('id', $curatedPinIds)
            ->get()
            ->keyBy('id');
        // return trả view 
        return view('frontend.home', compact(
            'page',
            'collections',
            'trendingIds',
            'categories',
            'curatedPins',
            'curatedPinIds'
        ))->with('layoutMap', $this->layoutMap);
    }
}
