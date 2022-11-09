<?php 

$action = $_GET["action"];

if ($action == "showAll") {
    $books = glob("./books/*");
    echo json_encode($books);
} else if ($action == "each") {
    $bookFolder = $_GET["folderName"];
    $html = "<div class = 'onereview'>";
    $html .= "<img src='$bookFolder/cover.jpg' alt = 'Book Cover'>";

    $html .= "<div class='thedetails'>";
    list ($title, $author) = file("$bookFolder/info.txt");
    $html .= "<b>$title</b><br>$author";

    $html .= "<p>" . file_get_contents("$bookFolder/description.txt") . "</p>";

    list ($name, $rating, $review) = file("$bookFolder/review.txt");
    $html .= "<p><b>$name";
    for ($i = 1; $i <= $rating; $i ++) {
        $html .= '*';
    }
    $html .= "</b><br>";
    $html .= $review . "</p>";
    echo $html;
}

?>