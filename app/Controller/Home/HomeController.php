<?php

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class HomeController{

    public $model;

//      ┌─────────────┐
//      │  CONSTRUCT  │
//      └─────────────┘
    public function __construct(){
        $this->model = new HomeModel;
    }

//      ┌─────────┐
//      │  INDEX  │
//      └─────────┘
    public function index(){

        $client = new GuzzleHttp\Client();

        try {
            $request = $client->request('GET', 'https://webfonts.googleapis.com/v1/webfonts?sort=SORT_UNDEFINED&key='.GOOGLE_API_KEY);
        } catch (ClientException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }

        $google_font = json_decode($request->getBody(), true);
        
        require($_SERVER['DOCUMENT_ROOT'] . '/app/View/Home/index.php');
    }
}