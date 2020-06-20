<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Index_Controller 
{
    public function __construct()
    {   
        echo '<h3>Class Index_Library được khởi tạo</h3>';
    }

    public function indexAction()
    {   
        echo '<pre>';
        print_r($this);
        var_dump($this);
        echo '<h1>Index Action</h1>';
    }
}
