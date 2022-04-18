<?php

require($_SERVER['DOCUMENT_ROOT'] . '/src/Utility/Model.php');
use GuzzleHttp\Exception\ClientException;

class FontModel extends Model
{

    public function get_google_api()
    {
        $client = new GuzzleHttp\Client();

        try {
            $request = $client->request('GET', 'https://webfonts.googleapis.com/v1/webfonts?sort=SORT_UNDEFINED&key='.GOOGLE_API_KEY);
        } catch (ClientException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
        return json_decode($request->getBody(), true);
    }
}