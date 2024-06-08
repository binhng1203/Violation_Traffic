<?php
require_once '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["id"])) {
        echo "Không tồn tại.";
    } else {
        $id = $_POST["id"];
      
        $sql = "DELETE FROM vehicles WHERE vehicle_id = $id";
      
        if ($con->query($sql) === TRUE) {
            echo "Xoá phương tiện thành công!";
        } else {
            echo "Lỗi " . $sql . "<br>" . $con->error;
        }
    }
} else {
    echo "Không nhận được dữ liệu.";
}
?>