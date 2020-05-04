<?php
header('Content-Type: application/json');

$sData = file_get_contents('../syllabus.json');

$sDataLowerd = strtolower($sData);

echo $sDataLowerd;

