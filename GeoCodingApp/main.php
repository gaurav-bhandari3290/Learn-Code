<?php

require 'Util.php';
require 'GeoCodeService.php';

$util  = new Util();
$geoService = new GeoLocationFinder();

$placeName = $util->getUserInput();

$locationCoordinates  = $geoService->getCoordinates($placeName);

if ($locationCoordinates) {
    $util->showCoordinates($locationCoordinates ['lat'], $locationCoordinates ['lon']);
} else {
    $util->showError("Could not find the location.");
}