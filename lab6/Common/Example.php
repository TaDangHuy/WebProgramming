<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Create Table</title>
    </head>
    <body>
        <?php
            $servername = '127.0.0.1';
            $port = '3306';
            $username = 'root';
            $password = '';
            $database = 'test';
            $table_name = 'Products';
            try {
                $connect = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
                // set the PDO error mode to exception
                $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Connected successfully<br>";
                $SQLcmd = "CREATE TABLE $table_name(ProductID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,Product_desc VARCHAR(50), Cost INT,Weight INT,Numb INT)";
                try {
                    $connect->query($SQLcmd);
                    print '<span style="font-size:large;color:blue"> Created Table';
                    print "<i>$table_name</i> in database<i>$database</i><br></font>";
                    print "<br>SQLcmd=$SQLcmd";
                } catch (PDOException $e) {
                    die ("Table Create Creation Failed SQLcmd = $SQLcmd");
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        ?>
    </body>
</html>