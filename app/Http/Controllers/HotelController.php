<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;

class HotelController extends Controller
{
    const LIMIT_OF_ITEMS_PER_PAGE = 10;

    const DEFAULT_ID_TO_ORDER_BY = 'id';

    const DEFAULT_ORDER_TO_SORT = 'asc';

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
        $property = $request->input('prop') ?: self::DEFAULT_ID_TO_ORDER_BY;
        $order = $request->input('order') ?: self::DEFAULT_ORDER_TO_SORT;
        return Hotel::orderBy($property, $order)->paginate(self::LIMIT_OF_ITEMS_PER_PAGE);
    }
}
