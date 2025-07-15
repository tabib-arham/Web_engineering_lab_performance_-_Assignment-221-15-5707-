<?php
class Book{
    public $title;
    public $author;
    public $description;
    public function __construct($title, $author, $description) {
        $this->title = $title;
        $this->author = $author;
        $this->description = $description;
    }
    function isavaiable($title) {
        if ($this->title == $title) {
            return "The book '$title' is available.";
        } else {
            return "The book '$title' is not available.";
        }
    }
    function description() {
        return "Title: $this->title, Author: $this->author, Description: $this->description";
    }
    public static function totalBookListObject($books) {
        $bookList = [];
        foreach ($books as $book) {
            $bookList[] = $book->title;
        }
        echo "Total Book List: " . implode(", ", $bookList) . "<br>";
    }
}
$book1 = new Book("The Great Gatsby", "F. Scott Fitzgerald", "A novel set in the 1920s about the American dream.");
$book2 = new Book("1984", "George Orwell", "A dystopian novel about totalitarianism and surveillance.");
echo $book1->isavaiable("The Great Gatsby") . "<br>";
echo $book2->isavaiable("To Kill a Mockingbird") . "<br>";
Book::totalBookListObject([$book1, $book2]);

?>