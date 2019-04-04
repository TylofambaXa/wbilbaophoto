<?php
    session_start();

    if(empty($_POST)){
        $_SESSION['messageBad'] = "No user selected.";
            header('Location: delete_user.php');
            exit;
    }

    function delete_directory($dirname) {
        if (is_dir($dirname))
          $dir_handle = opendir($dirname);
        if (!$dir_handle)
            return false;
        while($file = readdir($dir_handle)) {
            if ($file != "." && $file != "..") {
                if (!is_dir($dirname."\\".$file))
                        unlink($dirname."\\".$file);
                else
                    delete_directory($dirname.'\\'.$file);
            }
    }
    closedir($dir_handle);
    rmdir($dirname);
    return true;
}
   
    require_once 'Dao.php';
    $dao = new Dao();
    $count = 0;

    foreach($_POST as $user){
        $tmpUser = $dao->getUser($user);
        $user_id = $tmpUser['id'];
        
        if($user_id == null){
            $_SESSION['messageBad'] = "Something went wrong.";
            header('Location: delete_user.php');
            exit;
        }else{
            delete_directory(".\Images\\" . $user_id);
        }
        
        $dao->removeFolder($user);
        $dao->removeUser($user);
        $count++;
    }

    if($count == 0){
        $_SESSION['messageBad'] = "No users selected.";
    }else{
        $_SESSION['messageGood'] = "Successfully deleted " . $count . " user(s).";
    }
    header('Location: delete_user.php');
    exit;