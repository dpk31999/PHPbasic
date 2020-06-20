<?php

class FT_View_Loader
{
    private $__content = array();

    public function load($view,$data = array()){
        extract($data);
        ob_start();
        require_once PATH_SYSTEM.'/core/database/database.php';
        require_once PATH_APPLICATION.'/view/'.$view.'.php';
        $sql = "SELECT *FROM mvcavc.user";
        $user = db_get_list($sql);
        $showPost = new Show_View();
        $showPost->showPost($user);
        $content = ob_get_contents();
        ob_end_clean();
        $this->__content[] = $content;
        foreach($this->__content as $html){
            echo $html;
        }
    }

}

?>