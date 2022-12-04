<?php
class Book
{
    public int $id;
    public string $title;

    public function __construct(int $id, string $title)
    {
        $this->id = $id;
        $this->title = $title;
    }
}

/**
 * this function return an instance of book
 * @param int $id the id of the book
 * @param string $title the name of the book
 */
function createBook(int $id, string $title)
{
    return new Book($id, $title);
}

var_dump(createBook(1, 'systeme lean'));
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>excercice 9</title>
</head>

<body>
</body>

</html>l