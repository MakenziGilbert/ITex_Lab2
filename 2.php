<?php include "conn.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
   $year_min = $_GET['year_min'];
   $year_max = $_GET['year_max'];

   $cursor = $collection->find(array('year' => array('$gte'=> (int)$year_min, '$lte' => (int)$year_max)));
   $result = "За период $year_min-$year_max: <ul>";
   foreach ($cursor as $document) {
       $title = $document['title'];
       $author = $document['author'];
       $publisher = $document['publisher'];
       $year =  $document['year'];
       $ISBN = $document['ISBN'];
       $result .= "<li>Книга: $title, автор: $author, издательство: $publisher, год выпуска:  $year, ISBN $ISBN </li>";
   }
   $result .= "</ul>";
   echo $result;
   echo "<script> localStorage.setItem('$year_min&$year_max', '$result'); </script>";
?>
</body>
</html>