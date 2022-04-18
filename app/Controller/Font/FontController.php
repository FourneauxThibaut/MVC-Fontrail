<?php

require($_SERVER['DOCUMENT_ROOT'] . '/src/Utility/Controller.php');

class FontController extends Controller
{
    public $model;

//      ┌─────────────┐
//      │  CONSTRUCT  │
//      └─────────────┘
    public function __construct()
    {        
        $this->model = new FontModel();
    }

//      ┌─────────┐
//      │  INDEX  │
//      └─────────┘
    public function index()
    {
        $google_font = $this->model->get_google_api();

        $data = [
            'google_font' => $google_font['items']
        ];
        $head = [
            'title' => 'FontRail | All Fonts'
        ];

        return $this->view('font.index', $data, $head);
    }
    
//      ┌────────┐
//      │  SHOW  │
//      └────────┘
public function show()
{
    $google_font = $this->model->get_google_api();

    $data = [
        'google_font' => $google_font['items']
    ];
    $head = [
        'title' => 'FontRail | All Fonts'
    ];

    return $this->view('home.index', $data, $head);
}
}