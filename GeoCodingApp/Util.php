<?php

class Util
{
    public function getUserInput(): string
    {
        echo "UserInput: ";
        return trim(fgets(STDIN));
    }

    public function showCoordinates(float $latitude, float $longitude): void
    {
        echo "Latitude: {$latitude}\n";
        echo "Longitude: {$longitude}\n";
    }

    public function showError(string $message): void
    {
        echo "Error: {$message}\n";
    }
}