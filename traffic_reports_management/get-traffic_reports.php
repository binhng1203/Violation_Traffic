<?php
require_once '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["id"])) {
        echo "Không tồn tại.";
    } else {
        $id = $_POST["id"];
      
        $sql = "SELECT * FROM driving_licenses WHERE license_id = $id";
      
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo json_encode($row);
        } else {
            echo "Không tìm thấy.";
        }
    }
} else {
    echo "Không nhận được dữ liệu.";
}
?>