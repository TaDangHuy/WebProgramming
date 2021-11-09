<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <table>
            <tr>
                <td>Name 1</td>
                <td><input type="text" name="name1"></td>
            </tr>
            <tr>
                <td>BirthDay 1</td>
                <td> <input type="date" name="date1"></td>
            </tr>
            <tr>
                <td>Name 2</td>
                <td><input type="text" name="name2"></td>
            </tr>
            <tr>
                <td>BirthDay 2</td>
                <td> <input type="date" name="date2"></td>
            </tr>
            <tr>
                <td><input type="submit" value="submit"></td>
                <td><input type="reset" value="reset"></td>
            </tr>
        </table>
        <?php
        function conver_date($date1, $date2, $name1, $name2)
        {
            $cvDate1 = date("l", strtotime($date1));
            $cvDate2 = date("l", strtotime($date2));
            $cvMonth1 = date("F", strtotime($date1));
            $cvMonth2 = date("F", strtotime($date2));
            $arr1 = explode("-", $date1);
            $arr2 = explode("-", $date2);
            print("<br>Date of $name1 is $cvDate1,$cvMonth1 $arr1[1],$arr1[0] ");
            print("<br>Date of $name2 is $cvDate2,$cvMonth2 $arr2[1],$arr2[0] ");
            $diffDay = abs($arr1[2] - $arr2[2]);
            print("<br>The difference in days between two dates is $diffDay");
            $age1 = date("Y") - $arr1[0];
            $age2 = date("Y") - $arr2[0];
            $diffYear = abs($age1 - $age2);
            print("<br>$name1 is $age1 years old");
            print("<br>$name2 is $age2 years old");
            print("<br>The difference years between two persons is $diffYear");
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $date1 = $_POST['date1'];
            $date2 = $_POST['date2'];
            $name1 = $_POST['name1'];
            $name2 = $_POST['name2'];
            conver_date($date1, $date2, $name1, $name2);
        }
        ?>
    </form>
</body>

</html>