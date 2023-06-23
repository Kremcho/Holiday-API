<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    public function index(Request $request)
    {
        $client = new Client();
        $apiKey = '06c3246f322465d50f3c2e4c824905d58b1faf06';
        $country = $request->input('country', 'US');
        $year = $request->input('year', date('Y'));

        $response = $client->get("https://calendarific.com/api/v2/holidays?api_key=$apiKey&country=$country&year=$year");
        $holidays = json_decode($response->getBody()->getContents(), true);

        return view('holidays.index', compact('holidays', 'year'));
    }
}


