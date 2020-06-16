<?php

//GET THE FILE FROM A POST METHOD
$sFiles = $_POST['images'];

$aFiles = json_decode($sFiles);

//directory
$dir = '../tmp/';

//Create array of all files in directory
$aTmpFiles = scandir($dir, 1);

//Loop through array of files that contains images to move
for($i = 0; $i < count($aFiles); $i++) {
  //For each element in array of images to be saved, check to see if it is in tmp folder
    for($j = 0; $j < count($aTmpFiles); $j++ ) {
      if($aFiles[$i] == $aTmpFiles[$j]) {
        $currentFilePath = "../tmp/";
        $fileToMove = $currentFilePath.$aFiles[$i];
        $newFilePath = "../images/";
        //Move to images folder
        rename($fileToMove, $newFilePath.$aFiles[$i]);
      }
    }
  };

//Clean up the tmp folder by deleting the remaining images

//Get a list of all of the files in the folder.
$aFilesToDelete = glob($dir . '*');
//Loop through the file list.
foreach($aFilesToDelete as $file){
    //Make sure not to delete the api for uploading images.
    if($file !== "../tmp/API-upload-image.php"){
        //Use the unlink function to delete the file.
        unlink($file);
    }
};



