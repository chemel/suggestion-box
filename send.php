<?php

require_once __DIR__.'/config.php';

if(isset($_FILES['files'])) {
    $files = $_FILES['files'];
    $count = count($files['name']);
    $time = date('Y-m-d-H-i-s-');
    for ($i = 0; $i < $count; $i++) {
        if($files['error'][$i] == 0) {
            $filename = $files['name'][$i];
            $token = bin2hex(random_bytes(16));
            $directory = $time.$token;
            $directory = OUTPUT_DIRECTORY.'/'.$directory;
            if(!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }
            $output = $directory.'/'.$filename;
            move_uploaded_file($files['tmp_name'][$i], $output);
        }
    }

    header('Location: index.php?success=1');
    exit();
}