<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function scrape() {
        // URL
        $url = 'https://pomagam.pl/t/popularne?current_page=1&type=category_projects';

        // Initial guzzle
        $client = new Client();

        // Getting response from URL
        $response = $client->request('GET', $url);

        // Getting status code
        $response_status_code = $response->getStatusCode();

        // Getting body of URL 
        $body = $response->getBody()->getContents();

        // Decoding body
        $body = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
            return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UTF-16BE');
        }, $body);

        // converting body to associative array
        $data = json_decode($body, true);

        if ($response_status_code == 200) {
            dd($data['html'], $data['has_next']);
        }

        dd($response);
    }
}
