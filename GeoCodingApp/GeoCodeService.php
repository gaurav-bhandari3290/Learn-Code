<?php

class GeoLocationFinder
{
    private string $apiKey;
    private string $apiUrl;

    public function __construct()
    {
        $config = parse_ini_file('config.ini');
        $this->apiKey = $config['API_KEY'];
        $this->apiUrl = $config['API_URL'];
    }

    public function getCoordinates(string $placeName): ?array
    {
        if (empty($this->apiKey)) {
            return null;
        }

        $apiUrl = $this->apiUrl . "?q=" . urlencode($placeName) . "&limit=1&appid=" . $this->apiKey;

        $response = @file_get_contents($apiUrl);
        if (!$response) {
            return null;
        }

        $data = json_decode($response, true);
        if (!empty($data[0]['lat']) && !empty($data[0]['lon'])) {
            return [
                'lat' => $data[0]['lat'],
                'lon' => $data[0]['lon'],
            ];
        }

        return null;
    }
}
