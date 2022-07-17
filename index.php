<?php include "conn.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лаб2</title>
    <script>
        function form1() {
            let publisher = document.getElementById("publisher").value;
            let result = localStorage.getItem(publisher);;
            document.getElementById("res").innerHTML = result;
        }
        function form2() {
            let year_min = document.getElementById("year_min").value;
            let year_max = document.getElementById("year_max").value;
            let year = year_min + "&" + year_max; 
            let result = localStorage.getItem(year);
            document.getElementById("res").innerHTML = result;
        }
        function form3(){
            let author = document.getElementById("author").value;
            let result = localStorage.getItem(author);
            document.getElementById("res").innerHTML = result;
        }
    </script>
</head>
<body>
<form action="1.php" method="get">
    <p><strong> Книги издательства: </strong>
            <select name="publisher" id="publisher" onchange="form1()">
                <?php
                    $publisher = $collection->distinct("publisher");
                    foreach ($publisher as $document) {
                        echo "<option>$document</option>";
                    }
                ?>
            </select>
        <button>ОК</button>
    </p>
</form>
<form action="2.php" method="get">
<p><strong>Информация о книгах, журналах, газетах, опубликованных за указанный период:</strong>
        <select name="year_min" id="year_min"onchange="form2()">
            <?php
            $year_min = $collection->distinct("year");
            foreach ($year_min as $document) {
                echo "<option>$document</option>";
            }
            ?>
        </select>
        <select name="year_max" id="year_max" onchange="form2()">
            <?php
                $year_max = $collection->distinct("year");
                foreach ($year_max as $document) {
                    echo "<option>$document</option>";
                }
            ?>
        </select>
    <button>ОК</button>
</p>
</form>
<form action="3.php" method="get">
<p><strong> Книгах автора: </strong>
        <select name="author" id="author" onchange="form3()">
            <?php
                $author = $collection->distinct("author");
                foreach ($author as $document) {
                    echo "<option>$document</option>";
                }
            ?>
        </select>
    <button>ОК</button>
</p>
</form>
<div id="res"></div>
</body>
</html>