<?php
$folder = '../tmp';
 
//Get a list of all of the file names in the folder.
$files = glob($folder . '/*');

print_r($files);

$aFileName = array();
 
//Loop through the file list.
foreach($files as $file){
    
    //Make sure that this is a file and not a directory.
    if($file !== "../tmp/API-upload-image.php"){
        //Use the unlink function to delete the file.
        echo $file." was uploaded";
        array_push($aFileName, $file);
    };
};

print_r($aFileName);