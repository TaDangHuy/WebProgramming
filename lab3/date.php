<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex3</title>
</head>
<body>
    <form action="" method="get">
    <p>Enter your name and select date and time for the appointment: </p>
    Your name: <input type="text" name="name" id=""><br>
    Date: 
    <select name="day" id="">
        <?php 
            for ($i=0; $i <= 31; $i++) { 
                print ("<option>$i</option>");
            }
        ?>
    </select>
    <select name="month" id="">
        <?php 
            for ($i=0; $i <= 12; $i++) { 
                print ("<option>$i</option>");
            }
        ?>
    </select>
    <select name="year" id="">
        <?php 
            for ($i=2000; $i <= 2021; $i++) { 
                print ("<option>$i</option>");
            }
        ?>
    </select>
    <br>Time: 
    <select name="hour" id="">
        <?php 
            for ($i=0; $i <= 23; $i++) { 
                print ("<option>$i</option>");
            }
        ?>
    </select><select name="minute" id="">
        <?php 
            for ($i=0; $i <= 60; $i++) { 
                print ("<option>$i</option>");
            }
        ?>
    </select><select name="second" id="">
        <?php 
            for ($i=0; $i <= 60; $i++) { 
                print ("<option>$i</option>");
            }
        ?>
    </select>
    <br><input type="submit" value="submit">
    <input type="reset" value="reset">

    <?php 
    if (array_key_exists('name', $_GET)) {
        $name = $_GET['name'];
        $year = $_GET['year'];
        $month = $_GET['month'];
        $day = $_GET['day'];
        $hour = $_GET['hour'];
        $second = $_GET['second'];
        $minute = $_GET['minute'];
        print "<br>Hi $name ! <br>";
        print "You have choose to have an appointment on $hour:$minute:$second, $day/$month/$year <br>";
        echo "More information <br>";
        if ($hour <= 12) 
            print("In 12 hours, the time and date is $hour:$minute:$second AM,$day/$month/$year <br>");
        else {
            $hour -= 12;
            print("In 12 hours, the time and date is $hour:$minute:$second PM,$day/$month/$year <br>");
        }
        
        function remainderDivision($a, $b){
            $t = $a / $b;
            return $t - intval($t);
        }
         
        function isLeapYear($year){
            
            if(remainderDivision($year, 400) == 0 || 
                (remainderDivision($year, 4) == 0 && remainderDivision($year, 100) != 0))
                return true;
            return false;
        }
        $e = 28;
        $a = 29;
        $b = 30;
        $c = 31;
        if (isLeapYear($year) && $month == 2) 
            print("This month has $a days!");
        else {
            if ($month == 1 || $month == 3 || $month == 5 || $month == 7 || $month == 8 || $month == 10 || $month == 12) {
                print("This month has $c days!");
            } else if ($month == 4 || $month == 6 || $month == 9 || $month == 11) {
                print("This month has $b days!");
            } else {
                print("This month has $e days!");
            }

        }
        }
    ?>
    </form>



</body>
</html>