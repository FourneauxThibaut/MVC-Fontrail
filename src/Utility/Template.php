<?php

// class unused because of unworking conditional statements and loops.

class Template
{
    public $file;
    public $data = [];
    public $datas = [];
    public $head = [];

//      ┌─────────────┐
//      │  CONSTRUCT  │
//      └─────────────┘
    public function __construct(string $path, array $data, array $head)
    {
        $this->file = $_SERVER['DOCUMENT_ROOT'] . '/app/View/' . $path . '.php';
        $this->head = $head;

        foreach ($data as $key => $value) {

            if( is_array($value) ) {
                $this->datas[$key] = $value;
            }else{
                $this->data[$key] = $value;
            }
        }
    }

//      ┌──────────┐
//      │  RENDER  │
//      └──────────┘
    public function render()
    {
        $output = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/app/View/Layout/public_layout.php');   

        foreach ($this->head as $key => $value) {
            $tagToReplace = "[$$key]";
            $output = str_replace($tagToReplace, $value, $output);
        }

        $content = file_get_contents($this->file);
        
        foreach ($this->data as $key => $value) {
            
            $tagToReplace = "[$$key]";
            $content = str_replace($tagToReplace, $value, $content);
        }
        
        $output = str_replace('[$content]', $content, $output);

        $datas = $this->datas;
        return $output;
    }
}