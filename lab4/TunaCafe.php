<html lang="en">
<head>
    <title>Tune Cafe</title>
</head>
<body>
    <font size="4" color="blue">Welcome to the Tuna Survey</font>
    <form action="TunaResults.php" method="get">
        <?php
            $menu = array('Tuna Casserole', 'Tuna sandwich','Tuna Pie','Grilled Tuna','Tuna Surprise');
            $bestseller = 2;
            print "Please indicate all your favorite dishes.<br>";
            for ($i = 0; $i < count($menu); $i++){
                print "<input type=\"checkbox\" name=\"prefer[]\" value=$i> $menu[$i]";
                if( $i == $bestseller){
                    print "<font color=\"red\"> Our best seller!!!! </font>";
                }
                print "<br>";
            }
        ?>
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>
            
</body>
</html>