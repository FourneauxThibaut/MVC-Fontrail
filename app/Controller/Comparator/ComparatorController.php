<?php

require($_SERVER['DOCUMENT_ROOT'] . '/src/Utility/Controller.php');

class ComparatorController extends Controller
{
    public $model;

//      ┌─────────────┐
//      │  CONSTRUCT  │
//      └─────────────┘
    public function __construct()
    {        
        $this->model = new ComparatorModel();
    }

//      ┌─────────┐
//      │  INDEX  │
//      └─────────┘
    public function index()
    {
        foreach ($_GET as $key => $value) {
            $data[$key] = $value;
        }
        $head = [
            'title' => 'FontRail | Comparator'
        ];
        
        return $this->view('comparator.index', $data, $head);
    }
}