<?php
require_once "../config/config.php";

if ($_GET['process']=="cluster"){
    $center_ID=$_GET['center_ID'];
    $result = find_where('cluster', ['center_ID' => $center_ID]);
    if (empty($result)) {
        echo "<option value='0'>No title available</option>";
    } else {
        echo "<option disabled value='0'>Select title</option>";
        foreach ($result as $row) {
            echo "<option value='".$row['cluster_ID']."'>".$row['cluster_title']."</option>";
        }
    }
}