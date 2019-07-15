<?php include_once "resource/Database.php";
		include_once'resource/session.php';
    include_once'resource/utilities.php';?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/custom.css">

    <script src="js/sweetalert2.min.js"></script>
<link rel="css/stylesheet" href="sweetalert2.min.css">
    <title><?php if(isset($page_title)) echo $page_title;?></title>
</head>
<body>
	  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand active" href="index.php">User Authentication </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="index.php">Home </a>
        </li>
            <?php  if(isset($_SESSION['username']) || isCookieValid($db)): ?>
                 </li>
                <li class="nav-item">
                  <a class="nav-link" href="profile.php">profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="logout.php">logout</a>
                </li>
          <?php else: ?>
          <li class="nav-item">
                  <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
                  <a class="nav-link" href="signup.php">Register</a>
       
        <?php endif?>
        
        
      </ul>
      <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>