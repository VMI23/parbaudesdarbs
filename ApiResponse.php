<?php

use GuzzleHttp\Client;

class ApiResponse
{


    public function run($amount)
    {
        $client = new Client();
        $response = $client->request('GET', 'https://www.latvijasbanka.lv/vk/ecb.xml', [
            'headers' => ['Accept' => 'application/xml'],
            'timeout' => 120
        ])->getBody()->getContents();

        $responseXml = simplexml_load_string($response);

        foreach ($responseXml->Currencies->Currency as $currency) {
            if ($currency->ID == 'USD') {
                $usdRate = (float)$currency->Rate;
                break;
            }
        }

       echo $usdRate * $amount;
    }



}