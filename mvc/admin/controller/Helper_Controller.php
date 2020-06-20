<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');
 
class Helper_Controller extends FT_Controller
{
    public function indexAction()
    {
        // Load heloer
        $this->helper->load('string');
         
        // Gọi đến hàm string_to_int
        echo string_to_int('freetuts.net');
        echo '<br>';
        echo string_to_stringother('freetuts.net');
    }
}