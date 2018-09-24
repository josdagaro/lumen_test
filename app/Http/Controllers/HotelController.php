<?php

namespace App\Http\Controllers;

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
    public function showAll()
    {
        return Hotel::paginate(self::LIMIT_OF_ITEMS_PER_PAGE);
    }
}
