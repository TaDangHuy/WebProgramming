<html>

<body>
    <?php
    $user_name = $_POST["username"];
    $class = $_POST["class"];
    $university = $_POST["university"];
    print("<br> Hello $user_name");
    print("<br> Your class: $class");
    print("<br> Your university: $university");
    if (isset($_POST['submit'])) {
        if (!empty($_POST['hobbies'])) {
            print("<br> Your hobbies:<br>");
            foreach ($_POST['hobbies'] as $value) {
                print("$value <br/>");
            }
        }
    }
    ?>
</body>

</html>