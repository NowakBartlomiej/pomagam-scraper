<?php

namespace App\Services\Scraping;

use App\Models\Data;
use GuzzleHttp\Client;
use Illuminate\Support\Arr;

class ScrapeService
{

    public function getDataFromURL($url)
    {
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

    public function scrape()
    {
        $this->scrapeCategory(config('constants.category.popular'));
        $this->scrapeCategory(config('constants.category.treatment'));
        $this->scrapeCategory(config('constants.category.needs'));
        $this->scrapeCategory(config('constants.category.animals'));
        $this->scrapeCategory(config('constants.category.projects'));
    }

    public function scrapeCategory($category) {
        $pageNumber = 1;
        // URL
        $url = "https://pomagam.pl/t/$category?current_page=$pageNumber&type=category_projects";
        
        // Getting data from URL and resposnse status code
        list($data, $response_status_code) = $this->getDataFromURL($url);
        
        // is website has more data
        $has_next = $data['has_next'];

        while ($has_next) {
            // URL
            $url = "https://pomagam.pl/t/$category?current_page=$pageNumber&type=category_projects";    

            // Getting data from URL and resposnse status code
            list($data, $response_status_code) = $this->getDataFromURL($url);

            // HTML of current url
            $html = $data['html'];
            

            // Getting finded datas from html
            list($titles, $slugs, $imgs, $alts, $numbers_id, $amounts) = $this->findData($html);

            //! Adding data to database
            echo $category . " " . $pageNumber . "\xA";
            for ($i = 0; $i < count($titles); $i++) {
                Data::upsert([
                    'title' => $titles[$i], 'slug' => $slugs[$i], 'image' => $imgs[$i], 'alt' => $alts[$i], 'number_id' => $numbers_id[$i], 'amount' => $amounts[$i], 'category' => $category,
                ], ['number_id'], ['amount', 'category']);
            }
           
            // Go to next page
            $pageNumber = $pageNumber + 1;
            
            // is website has more data
            $has_next = $data['has_next'];
        }
    }

    public function findData($html)
    {
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

        foreach ($amounts[0] as &$a) {
            $a = (int)$a;
        }

        return [$titles[0], $slugs[0], $imgs[0], $alts[0], $numbers_id[0], $amounts[0]];
    }
}
