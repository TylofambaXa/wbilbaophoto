<?php
    session_start();
    $_SESSION['add_info'] = $_POST;

    if(!isset($_POST['radio'])){
        $_SESSION['messageBad'] = "No user selected.";
        header('Location: add_photo.php');
        exit;
    }

    function reArrayFiles(&$file_post) {

        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);
    
        for ($i=0; $i<$file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }
    
        return $file_ary;
    }

    require_once 'Dao.php';
    $dao = new Dao();

    $username = $_POST['radio'];
    $user = $dao->getUser($username);
    $user_id = $user['id'];

    $basePath = "C:\Program Files (x86)\Ampps\www\CS401";
    $imagePath = "";
    if (count($_FILES) > 0) {
        $file_array = reArrayFiles($_FILES['files']);
        foreach($file_array as $file){          
            if ($file["error"] > 0) {
                throw new Exception("Error: " . $_FILES["file"]["error"]);
            } else {
                $imagePath = "\Images\\" . $user_id . "\\" . $file["name"];
                if (!move_uploaded_file($file["tmp_name"], $basePath . $imagePath)) {
                throw new Exception("File move failed");
                }
                $dao->addPhoto($username, $imagePath);
            }
        }
        
    }else{
        $_SESSION['messageBad'] = "No files selected.";
        header('Location: add_photo.php');
        exit;
    }

    $_SESSION['messageGood'] = "Photos uploaded successfully!";
    header('Location: add_photo.php');
    exit;