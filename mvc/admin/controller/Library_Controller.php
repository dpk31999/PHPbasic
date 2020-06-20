<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class Library_Controller extends FT_Controller
{
    public function indexAction()
    {
        $this->library->load('upload');
         
        // Gọi đến phương thức upload
        print_r($this->library);
        $this->library->upload->upload();
    }
}