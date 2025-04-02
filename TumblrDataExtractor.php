<?php

class InputHandler {
    public function get(string $message): string {
        echo $message . " ";
        return trim(fgets(STDIN));
    }
}

class RangeValidator {
    public function validate(string $range): bool {
        $parts = explode('-', $range);
        return count($parts) === 2 && is_numeric($parts[0]) && is_numeric($parts[1]) && intval($parts[0]) >= 1 && intval($parts[1]) >= intval($parts[0]);
    }

    public function parseRange(string $range): array {
        $parts = explode('-', $range);
        
        // Convert both parts to integers
        return array_map('intval', $parts);
    }
}

class TumblrAPI {
    private string $blog;
    private int $start;
    private int $end;

    public function __construct(string $blog, int $start, int $end) {
        $this->blog = $blog;
        $this->start = $start;
        $this->end = $end;
    }

    public function fetchData(): string {
        $url = $this->buildUrl();
        $response = @file_get_contents($url);
        if (!$response) {
            throw new RuntimeException("Failed to fetch data. Check blog name or internet connection.");
        }
        return $response;
    }

    private function buildUrl(): string {
        $count = $this->end - $this->start + 1;
        $offset = $this->start - 1;
        return "https://{$this->blog}.tumblr.com/api/read/json?type=photo&num={$count}&start={$offset}";
    }
}

class ResponseParser {
    public function parse(string $response): array {
        // Remove unnecessary text from the API response
        $cleanResponse = str_replace("var tumblr_api_read = ", "", $response);
        
        // Remove the last semicolon
        $cleanResponse = preg_replace('/;\s*$/', '', $cleanResponse);
        
        //Convert JSON response into a PHP array
        $data = json_decode($cleanResponse, true);
        if (!$data) {
            throw new RuntimeException("Invalid Tumblr API response.");
        }
        return $data;  
    }
}

class TumblrBlog {
    private array $data;

    public function __construct(array $data) {
        $this->data = $data;
    }

    public function showInfo(): void {
        $blog = $this->data['tumblelog'] ?? [];
        echo "\nTitle: " . ($blog['title'] ?? 'N/A') . "\n";
        echo "Name: " . ($blog['name'] ?? 'N/A') . "\n";
        echo "Description: " . strip_tags($blog['description'] ?? 'N/A') . "\n";
        echo "Total Posts: " . ($this->data['posts-total'] ?? 'Unknown') . "\n\n";
    }
}

class PhotoGallery {
    private array $posts;

    public function __construct(array $posts) {
        $this->posts = $posts;
    }

    public function showPhotos(): void {
        $count = 1;
        foreach ($this->posts as $post) {
            if (!empty($post['photo-url-1280'])) {
                echo "{$count}. " . $post['photo-url-1280'] . "\n";
                $count++;
            }
        }
    }
}

class App {
    private InputHandler $input;
    private RangeValidator $validator;

    public function __construct() {
        $this->input = new InputHandler();
        $this->validator = new RangeValidator();
    }

    public function start(): void {
        try {
            $blog = $this->input->get("Enter the Tumblr blog name:");
            $range = $this->input->get("Enter the range (e.g., 1-10):");
            
            if (!$this->validator->validate($range)) {
                throw new InvalidArgumentException("Invalid range format. Use 'start-end' (e.g., 1-10) and ensure valid values.");
            }

            [$start, $end] = $this->validator->parseRange($range);
            
            $api = new TumblrAPI($blog, $start, $end);
            $response = $api->fetchData();

            $parser = new ResponseParser();
            $data = $parser->parse($response);

            $blogInfo = new TumblrBlog($data);
            $blogInfo->showInfo();

            $gallery = new PhotoGallery($data['posts'] ?? []);
            $gallery->showPhotos();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage() . "\n";
        }
    }
}

$app = new App();
$app->start();
