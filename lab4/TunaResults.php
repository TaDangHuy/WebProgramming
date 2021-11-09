<html lang="en">
<head>
    <title>Tuna cafe</title>
</head>
<body>
    <font size="4" color="blue">Tuna Cafe result Received</font>
    <?php
        $menu = array('Tuna Casserole', 'Tuna sandwich','Tuna Pie','Grilled Tuna','Tuna Surprise');
        if (isset($_GET["prefer"])) {
        $prefer = $_GET['prefer'];
            print "<br>Your select were <ul>";
            foreach($prefer as $item){
                print "<li>$menu[$item]</li>";
            }
            print "</ul>";
        }else print "<br>Oh no! Please pick something as your favorite! ";
    ?>
</body>
</html>