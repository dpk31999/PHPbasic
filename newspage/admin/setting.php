<?php

require_once 'core/init.php';

if($user){
    if(isset($_POST['action'])){
        $action = trim(addslashes(htmlspecialchars($_POST['action'])));

        if($action == 'stt_web'){
            $stt_web = trim(htmlspecialchars(addslashes($_POST['stt_web'])));
            $sql_stt_web = "UPDATE newspage.website SET status = '$stt_web'";
            $db->query($sql_stt_web);
            $db->close();
        }

        else if ($action == 'info_web') 
        {
            $title_web = trim(htmlspecialchars(addslashes($_POST['title_web'])));
            $descr_web = trim(htmlspecialchars(addslashes($_POST['descr_web'])));
            $keywords_web = trim(htmlspecialchars(addslashes($_POST['keywords_web'])));
         
            $sql_info_web = "UPDATE website SET 
                title = '$title_web',
                descr = '$descr_web',
                keywords = '$keywords_web'
            ";
            $db->query($sql_info_web);
            $db->close();
        }

    } 
    else{
        new Redirect($_DOMAIN);
    }
}
else{
    new Redirect($_DOMAIN);
}

?>