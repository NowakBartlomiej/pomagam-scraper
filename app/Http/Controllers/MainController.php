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
        $html = $data['html'];
        $has_next = $data['has_next'];

        
        if ($response_status_code == 200) {
            preg_match_all(config('constants.regex.title'), $html, $title);
            preg_match_all(config('constants.regex.slug'), $html, $slug);
            preg_match_all(config('constants.regex.image'), $html, $img);
            preg_match_all(config('constants.regex.alt'), $html, $alt);
            preg_match_all(config('constants.regex.number_id'), $html, $number_id);
            preg_match_all(config('constants.regex.amount'), $html, $amount);
            for($i = 0; $i < count($amount); $i++) {
                $amount[$i] = preg_replace('/\xc2\xa0/', '', $amount[$i]);
                $amount[$i] = str_replace(" ", "", $amount[$i]);
            }

            dd($title, $slug, $img, $alt, $number_id, $amount);
            dd($html, $has_next);
        }

        dd($response);
    }

}
