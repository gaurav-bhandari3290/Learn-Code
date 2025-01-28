interface Printer {
    public function printPage($page);
}

class Book {
    function getTitle() {
        return "A Great Book";
    }
 
    function getAuthor() {
        return "John Doe";
    }
 
    function turnPage() {
        // pointer to next page
    }
 
    function getCurrentPage() {
        return "current page content";
    }
}

class LibraryLocation {
    public function getLocation() {
        // returns the position in the library
        // ie. shelf number & room number
    }
}

class SaveBook {
    public function save(Book $book) {
        $filename = '/documents/' . $book->getTitle() . ' - ' . $book->getAuthor();
        file_put_contents($filename, serialize($book));
    }
}

class PlainTextPrinter implements Printer {
    public function printPage($page) {
        echo $page;
    }
}

class HtmlPrinter implements Printer {
    public function printPage($page) {
        echo '<div style="single-page">' . $page . '</div>';
    }
}