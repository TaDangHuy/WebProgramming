<?php

if (isset($_POST["sort_key"])) {
    $submitted = $_POST["submitted"];
    $sort_key = $_POST["sort_key"];
} else {
    $sort_key = "name";
    $submitted = false;
}

$dir = 'upload/';
$files = array();
foreach (array_diff(scandir($dir), array('.', '..')) as $file){
    array_push($files, array(
        "name" => $file,
        "type" => pathinfo($dir.$file, PATHINFO_EXTENSION) == ""? "file" : pathinfo($dir.$file, PATHINFO_EXTENSION),
        "date" => filemtime($dir.$file),
        "size" => filesize($dir.$file)
    ));
};
?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <p>
        <input type="radio" name="sort_key" value="name" <?php if ($sort_key == 'name') echo "checked='checked'"; ?> /> Sort by Name<br />
        <input type="radio" name="sort_key" value="date" <?php if ($sort_key == 'date') echo "checked='checked'"; ?> /> Sort by Date<br />
    </p>

    <p align="center">
        <input type="submit" value="Sort" name="submitted" />
    </p>

    <p>
        Values <? "sorted by $sort_key"?>:
    </p>

    <table>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Date</th>
            <th>Size</th>
        </tr>
        <?php


        if ($submitted) {
            if ($sort_key == 'date') {
                uasort($files, function ($a, $b) {
                    return $a['date'] > $b['date'] ? 1 : ($a['date'] == $b['date'] ? 0 : -1);
                });
            } else {
                uasort($files, function ($a, $b) {
                    return $a['name'] > $b['name'] ? 1 : ($a['name'] == $b['name'] ? 0 : -1);
                });
            }
        }
        foreach ($files as $file) {
            echo "<tr>";
            foreach ($file as $key => $filei) {
                if ($key == 'date') {
                    echo "<td>".date("d-m-Y", $filei)."</td>";
                } else {
                    echo "<td>".$filei."</td>";
                }
            };
            echo "</tr>";
        }
        ?>
    </table>
</form>