<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;

class HotelController extends Controller
{
    const LIMIT_OF_ITEMS_PER_PAGE = 10;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show a paginated array of hotels.
     * 
     * @return array
     */
    public function showAll(Request $request)
    {
        $property = $request->input('prop');
        $order = $request->input('order');
        return Hotel::orderBy($property, $order)->paginate(self::LIMIT_OF_ITEMS_PER_PAGE);
    }
}
