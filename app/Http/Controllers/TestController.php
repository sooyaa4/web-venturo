<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TestController extends Controller
{
    public function index(Request $request)
    {
        if (request()->tahun) {
            $tahun = $request->get('tahun');

            $client = new Client(); //GuzzleHttp\Client
            $url = "http://tes-web.landa.id/intermediate/transaksi?tahun=$tahun";
            $URL = "http://tes-web.landa.id/intermediate/menu";
        
            $response = $client->request('GET', $url, [
                'verify'  => false,
            ]);

            $RESPONSE = $client->request('GET', $URL, [
                'verify'  => false,
            ]);
        

            $responseBody = json_decode($response->getBody());
            $responsebody = json_decode($RESPONSE->getBody());

        return view('projects.test', compact(['responseBody','responsebody','tahun']));
            
        }
        else {
        return view('projects.index');
        }
    }
}
