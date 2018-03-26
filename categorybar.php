<?php

include_once 'config.php';
$sql = "SELECT * FROM category";
$result = $con->query($sql);
$i = 0;
echo '<div class="col-sm-12">
							<ul class="nav nav-tabs">';
while ($row = mysqli_fetch_assoc($result)) {
    if ($i == 0) {
        echo'<li class="active"><a href="#' . $row['category_name'] . '" data-toggle="tab">' . $row['category_name'] . '</a></li>';
        $i++;
    } else {
        echo'<li><a href="#' . $row['category_name'] . '" data-toggle="tab">' . $row['category_name'] . '</a></li>';
    }
}
echo '</ul>
						</div>';

