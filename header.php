<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= isset($pageTitle) ? $pageTitle : 'Tailor Platform Home' ?></title>
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-uH+yPlEWT3TPQZMx1RCm4Oai5zECFNmYH9bnBqTF1aW9Jx61+z5g4/NyLdo6ntYuG90RCvjJ6sIP7Cpi9WfcZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Google Fonts: Poppins -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  
  <link rel="stylesheet" href="css/styles.css">
  
  <?php if (isset($customCss)) : ?>
    <link rel="stylesheet" href="css/<?= htmlspecialchars($customCss) ?>">
  <?php endif; ?>

  <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
</head>

<body>

<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="/">
      <img src="images/logo-no-bg.png" alt="Sew Dhaaga Logo" style="height: 70px; width: 90px;">
      <span class="ms-2 fw-bold fs-4 text-dark">Sew Dhaaga</span>
    </a>
    <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
  aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav ms-auto">
    <?php
      $currentPage = basename($_SERVER['REQUEST_URI'], ".php");
      $currentPage = trim($currentPage, "/");
    ?>
    <li class="nav-item">
      <a class="nav-link <?= $currentPage == '' || $currentPage == 'index' ? 'active' : ''; ?>" href="/">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?= $currentPage == 'about.php' ? 'active' : ''; ?>" href="about.php">About Us</a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?= $currentPage == 'services.php' ? 'active' : ''; ?>" href="services.php">Services</a>
    </li>
    <li class="nav-item">
      <a class="nav-link <?= $currentPage == 'contact.php' ? 'active' : ''; ?>" href="contact.php">Contact Us</a>
    </li>
  </ul>
</div>


</nav>
