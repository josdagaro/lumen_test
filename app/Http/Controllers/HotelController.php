<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;

class HotelController extends Controller
{
    const LIMIT_OF_ITEMS_PER_PAGE = 10;

    const DEFAULT_INDEX_TO_ORDER_BY = 'id';

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
     * @param Request $request
     * 
     * @return array
     */
    public function show(Request $request, $id = null)
    {
        $response = null;

        if ($id) {
            $response = Hotel::find($id);
        } else {
            $property = $request->input('prop') ? : self::DEFAULT_INDEX_TO_ORDER_BY;
            $order = $request->input('order') ? : self::DEFAULT_ORDER_TO_SORT;
            $response = Hotel::orderBy($property, $order)->paginate(self::LIMIT_OF_ITEMS_PER_PAGE);
        }

        return $response;
    }

    /**
     * Store a hotel.
     * @param Request $request
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'location' => 'required',
        ]);

        return Hotel::create($request->all());
    }

    /**
     * Delete a hotel.
     * @param int $id
     * 
     * @return void
     */
    public function destroy(int $id)
    {
        Hotel::find($id)->delete();
    }
}
