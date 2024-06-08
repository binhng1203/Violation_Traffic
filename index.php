<?php
require_once 'db.php';

$query = "SELECT * FROM traffic_reports";
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
      <h1>Thống kê</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
          <li class="breadcrumb-item active">Thống kê</li>
        </ol>
      </nav>
    </div>

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Lỗi vi phạm -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Lỗi vi phạm</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-cart"></i>
                    </div>

                    <div class="ps-3">
                      <h6>
                        <?php
                          $row = mysqli_num_rows($result);
                          echo $row;
                        ?>
                      </h6>
                      <span class="text-success small pt-1 fw-bold">12%</span> 
                      <span class="text-muted small pt-2 ps-1">tăng</span>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <!-- Tổng nộp -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Tổng phí đã nộp phạt</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-currency-dollar"></i>
                    </div>

                    <div class="ps-3">
                      <h6>
                        <?php
                          $total = 0;
                          while ($row = mysqli_fetch_assoc($result)) {
                            $total += $row['fine'];
                          }
                          // định dạng tiền vn
                          echo number_format($total, 0, ',', '.') , ' VND';
                        ?>
                      </h6>
                      <span class="text-success small pt-1 fw-bold">8%</span> 
                      <span class="text-muted small pt-2 ps-1">tăng</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Chưa nộp -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Chưa nộp phạt</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>

                    <div class="ps-3">
                      <h6>
                        <?php
                          $query = "SELECT * FROM traffic_reports WHERE is_payment_done = false";
                          $result = mysqli_query($con, $query);
                          $row = mysqli_num_rows($result);
                          echo $row;
                        ?>
                      </h6>
                      <span class="text-danger small pt-1 fw-bold">12%</span> 
                      <span class="text-muted small pt-2 ps-1">giảm</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <a href="index.html" >
            <img src="assets/img/download.jpg" alt="">
          </a>

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <?php include 'footer.php'; ?>
  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

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

</body>

</html>