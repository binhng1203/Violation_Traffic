<?php
require_once 'db.php';

$query = "SELECT * FROM vehicles";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Tra cứu vi phạm giao thông</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Icons -->
    <link href="assets/img/logo.png" rel="icon">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

    <?php include 'header.php'; ?>

    <?php include 'sidebar.php'; ?>

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Quản lý phương tiện</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Quản lý phương tiện</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title">Danh sách phương tiện</h5>
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">Thêm</button>
                                </div>
                            </div>

                            <!-- Thêm phương tiện -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form class="form-insert">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Thêm phương tiện</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Form thêm -->
                                                <div class="mb-3">
                                                    <label for="license_plate" class="form-label">Biển số xe</label>
                                                    <input type="text" class="form-control" id="license_plate"
                                                        name="license_plate">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="vehicle_type" class="form-label">Loại phương tiện</label>
                                                    <input type="text" class="form-control" id="vehicle_type"
                                                        name="vehicle_type">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="color" class="form-label">Màu</label>
                                                    <input type="text" class="form-control" id="color" 
                                                        name="color">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="owner_name" class="form-label">Chủ sở hữu</label>
                                                    <input type="text" class="form-control" id="owner_name"
                                                        name="owner_name">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="registration_date" class="form-label">Ngày đăng ký</label>
                                                    <input type="date" class="form-control" id="registration_date"
                                                        name="registration_date">
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Đóng</button>
                                                <button type="submit" class="btn btn-primary">Lưu</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sửa -->
                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form class="form-edit">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Chỉnh sửa thông tin phương tiện</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Form sửa -->
                                            <input type="hidden" id="edit-id" name="id">
                                            <div class="mb-3">
                                                <label for="license_plate" class="form-label">Biển số xe</label>
                                                <input type="text" class="form-control" id="edit_license_plate"
                                                    name="license_plate">
                                            </div>
                                            <div class="mb-3">
                                                <label for="vehicle_type" class="form-label">Loại phương tiện</label>
                                                <input type="text" class="form-control" id="edit_vehicle_type"
                                                    name="vehicle_type">
                                            </div>
                                            <div class="mb-3">
                                                <label for="color" class="form-label">Màu</label>
                                                <input type="text" class="form-control" id="edit_color" 
                                                    name="color">
                                            </div>
                                            <div class="mb-3">
                                                <label for="owner_name" class="form-label">Chủ sở hữu</label>
                                                <input type="text" class="form-control" id="edit_owner_name"
                                                    name="owner_name">
                                            </div>
                                            <div class="mb-3">
                                                <label for="registration_date" class="form-label">Ngày đăng ký</label>
                                                <input type="date" class="form-control" id="edit_registration_date"
                                                    name="registration_date">
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Đóng</button>
                                            <button type="submit" class="btn btn-primary">Lưu</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bảng -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>SBB</th>
                                <th>Biển số xe</th>
                                <th>Loại phương tiện</th>
                                <th>Màu</th>
                                <th>Chủ sở hữu</th>
                                <th data-type="date" data-format="YYYY/DD/MM">Ngày đăng ký</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <td><?php echo $row['vehicle_id']; ?></td>
                                    <td><?php echo $row['license_plate']; ?></td>
                                    <td><?php echo $row['vehicle_type']; ?></td>
                                    <td><?php echo $row['color']; ?></td>
                                    <td><?php echo $row['owner_name']; ?></td>
                                    <td><?php echo $row['registration_date']; ?></td>
                                    <td>
                                        <a href="#" class="btn btn-primary edit"
                                            data-id="<?php echo $row['vehicle_id']; ?>">
                                            <i class="ri-edit-line"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger delete"
                                            data-id="<?php echo $row['vehicle_id']; ?>">
                                            <i class="ri-delete-bin-line"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <?php include 'footer.php'; ?>


    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.umd.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
        $(document).ready(function () {
            $(".form-insert").on("submit", function (event) {
                event.preventDefault();

                var formData = $(this).serialize();
                $.ajax({
                    url: "vehicle-management/insert-vehicle.php",
                    type: "POST",
                    data: formData,
                    success: function (data) {
                        alert(data);
                        location.reload();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("AJAX error: " + textStatus + ' : ' + errorThrown);
                    }
                });
            });
        });

        $(document).ready(function () {
            $(".delete").on("click", function (event) {
                event.preventDefault();

                var id = $(this).data('id');
                var confirmation = confirm("Bạn có muốn xoá phương tiện này?");

                if (confirmation) {
                    $.ajax({
                        url: "vehicle-management/delete-vehicle.php",
                        type: "POST",
                        data: { id: id },
                        success: function (data) {
                            alert(data);
                            location.reload(); // reload the page to see the changes
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            alert("AJAX error: " + textStatus + ' : ' + errorThrown);
                        }
                    });
                }
            });
        });

        $(document).ready(function () {
            $(".edit").on("click", function (event) {
                event.preventDefault();
                var id = $(this).data('id');
                $.ajax({
                    url: "vehicle-management/get-vehicle.php",
                    type: "POST",
                    data: { id: id },
                    dataType: "json",
                    success: function (data) {
                        $('#edit-id').val(data.vehicle_id);
                        $('#edit_license_plate').val(data.license_plate);
                        $('#edit_vehicle_type').val(data.vehicle_type);
                        $('#edit_color').val(data.color);
                        $('#edit_owner_name').val(data.owner_name);
                        $('#edit_registration_date').val(data.registration_date);
                        $('#editModal').modal('show');
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("AJAX error: " + textStatus + ' : ' + errorThrown);
                    }
                });
            });
        });

        $(document).ready(function () {
            $(".form-edit").on("submit", function (event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: "vehicle-management/update-vehicle.php",
                    type: "POST",
                    data: formData,
                    success: function (data) {
                        alert(data);
                        location.reload();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert("AJAX error: " + textStatus + ' : ' + errorThrown);
                    }
                });
            });
        });
    </script>

</body>



</html>