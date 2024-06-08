<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!-- Header -->
<header id="header" class="header fixed-top d-flex align-items-center">

<!-- Logo -->
<div class="d-flex align-items-center justify-content-between">
  <a href="index.html" class="logo d-flex align-items-center">
    <img src="assets/img/logo.png" alt="">
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div>

<!-- Icons Navigation -->
<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">
    <!-- Profile -->
    <li class="nav-item dropdown pe-3">
      <!-- Avatar -->
      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="assets/img/avatar.jpg" alt="Profile" class="rounded-circle">
        <span class="d-none d-md-block dropdown-toggle ps-2">Bình</span>
      </a>

      <!-- Profile Dropdown Items -->
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6>Admin</h6>
          <span>Binh Nguyen</span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
            <i class="bi bi-person"></i>
            <span>Hồ sơ</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
            <i class="bi bi-gear"></i>
            <span>Cài đặt</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
            <i class="bi bi-question-circle"></i>
            <span>Trợ giúp?</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="authentication/signout.php">
            <i class="bi bi-box-arrow-right"></i>
            <span>Đăng xuất</span>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</nav>
</header>