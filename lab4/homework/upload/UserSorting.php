<?php

if (isset($_POST["sort_type"])) {
    $submitted = $_POST["submitted"];
    $sort_type = $_POST["sort_type"];
} else {
    $sort_type = "unsorted";
    $submitted = false;
}

function user_sort($a, $b)
{
    // smarts is all-important, so sort it first
    if ($b == 'smarts') {
        return 1;
    } else if ($a == 'smarts') {
        return -1;
    }

    return ($a == $b) ? 0 : (($a < $b) ? -1 : 1);
}
$values = array(
    'name' => 'Buzz Lightyear',
    'email_address' => 'buzz@starcommand.gal',
    'age' => 32,
    'smarts' => 'some'
);
?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <p>
        <input type="radio" name="sort_type" value="sort" <?php if ($sort_type == 'sort') echo "checked='checked'"; ?> /> Standard sort<br />
        <input type="radio" name="sort_type" value="rsort" <?php if ($sort_type == 'rsort') echo "checked='checked'"; ?> /> Reverse sort<br />
        <input type="radio" name="sort_type" value="usort" <?php if ($sort_type == 'usort') echo "checked='checked'"; ?> /> User-defined sort<br />
        <input type="radio" name="sort_type" value="ksort" <?php if ($sort_type == 'ksort') echo "checked='checked'"; ?> /> Key sort<br />
        <input type="radio" name="sort_type" value="krsort" <?php if ($sort_type == 'krsort') echo "checked='checked'"; ?> /> Reverse key sort<br />
        <input type="radio" name="sort_type" value="uksort" <?php if ($sort_type == 'uksort') echo "checked='checked'"; ?> /> User-defined key sort<br />
        <input type="radio" name="sort_type" value="asort" <?php if ($sort_type == 'asort') echo "checked='checked'"; ?> /> Value sort<br />
        <input type="radio" name="sort_type" value="arsort" <?php if ($sort_type == 'arsort') echo "checked='checked'"; ?> /> Reverse value sort<br />
        <input type="radio" name="sort_type" value="uasort" <?php if ($sort_type == 'uasort') echo "checked='checked'"; ?> /> User-defined value sort<br />
    </p>

    <p align="center">
        <input type="submit" value="Sort" name="submitted" />
    </p>

    <p>
        Values <?= $submitted ? "sorted by $sort_type" : "unsorted"; ?>:
    </p>

    <ul>
        <?php


        if ($submitted) {
            if ($sort_type == 'usort' || $sort_type == 'uksort' || $sort_type == 'uasort') {
                $sort_type($values, 'user_sort');
            } else {
                $sort_type($values);
            }
        }
        foreach ($values as $key => $value) {
            echo "<li><b>$key</b>: $value</li>";
        }
        ?>
    </ul>
</form>