<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class SpikeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Ask to another service who is it.
     *
     * @return array
     */
    public function ask()
    {
        $client = new Client(['base_uri' => getenv('ENDPOINT')]);
        $response = $client->get(getenv('RESOURCE'));
        $response = json_decode($response);
        return response()->json([
            'me' => getenv('ME'),
            'it' => $response->me
        ]);
    }

    /**
     * Answer who am I.
     *
     * @return void
     */
    public function answer()
    {
        return response()->json([
            'me' => getenv('ME')
        ]);
    }
}
