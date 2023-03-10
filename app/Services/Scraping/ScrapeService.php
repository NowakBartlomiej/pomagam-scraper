<?php

namespace App\Services\Scraping;

use GuzzleHttp\Client;

class ScrapeService
{
    public function getDataFromURL() {
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

        return [$data, $response_status_code];
    }

    public function findData($html) {
        preg_match_all(config('constants.regex.title'), $html, $titles);
        preg_match_all(config('constants.regex.slug'), $html, $slugs);
        preg_match_all(config('constants.regex.image'), $html, $imgs);
        preg_match_all(config('constants.regex.alt'), $html, $alts);
        preg_match_all(config('constants.regex.number_id'), $html, $numbers_id);
        preg_match_all(config('constants.regex.amount'), $html, $amounts);
        for ($i = 0; $i < count($amounts); $i++) {
            $amounts[$i] = preg_replace('/\xc2\xa0/', '', $amounts[$i]);
            $amounts[$i] = str_replace(" ", "", $amounts[$i]);
        }

        foreach($amounts[0] as &$a) {
            $a = (int)$a;
        }
        
        return [$titles[0], $slugs[0], $imgs[0], $alts[0], $numbers_id[0], $amounts[0]];
    }
    
    

    public function scrape()
    {
        list($data, $response_status_code) = $this->getDataFromURL();

        $html = $data['html'];
        $has_next = $data['has_next'];

        if ($response_status_code == 200) {
            list($titles, $slugs, $imgs, $alts, $numbers_id, $amounts) = $this->findData($html);
        }
            
        dd($titles, $slugs, $imgs, $alts, $numbers_id, $amounts);
        dd($html, $has_next);
    }

    
}
