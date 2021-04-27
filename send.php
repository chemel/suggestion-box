<?php

require_once __DIR__.'/config.php';

function getUploadedFiles() {
    $files = [];
    if(isset($_FILES['files'])) {
        $uploadedFiles = $_FILES['files'];
        $count = count($uploadedFiles['name']);
        for ($i = 0; $i < $count; $i++) {
            if($uploadedFiles['error'][$i] == 0) {
                $files[] = [
                    'filename' => $uploadedFiles['name'][$i],
                    'tmpfilename' => $uploadedFiles['tmp_name'][$i]
                ];
            }
        }
    }
    return $files;
}

function generateToken() {
    $token = bin2hex(random_bytes(16));
    return $token;
}

function getOutputDirectory() {
    $time = date('Y-m-d-H-i-s');
    $token = generateToken();
    $directory = $time.'-'.$token;
    // Full path of the output directory
    $directory = OUTPUT_DIRECTORY.'/'.$directory;
    // Create the directory
    if(!file_exists($directory)) {
        mkdir($directory, 0777, true);
    }
    return $directory;
}

$files = getUploadedFiles();
if(!empty($files)) {
    // Generate the output directory
    $directory = getOutputDirectory();
    foreach ($files as $file) {
        $filename = $file['filename'];
        $outputFilename = $directory.'/'.$filename;
        // Move tmp file in output directory
        move_uploaded_file($file['tmpfilename'], $outputFilename);
    }
    header('Location: index.php?success=1');
    exit();
}

header('Location: index.php');
exit();
