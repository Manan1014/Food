<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css'>
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }
        .navbar {
            width: 100%;
            margin: 0px;
            padding: 0px;
            font-size: 20px;
            background: #525365;
        }
        .container-fluid{
            background-color: #525365;
        }
        .navbar .navbar-brand{
            color:whitesmoke;
            background-color: #525365;
        }
        .navbar .ul {
            background: #525365;
            color: whitesmoke;
            width: 100%;
            margin-top: 0;
            margin-bottom: 0;
            align-items: center;
        }

        .navbar ul li {
            list-style: none;
            margin: 10px;
            color: whitesmoke;
            font-size: larger;
        }

        .navbar ul li a {
            text-decoration: none !important;
            color: whitesmoke;
        }

        .btn:hover {
            background-color: #525359;
            border: 1px solid white;
            color: white;
        }

        li .btn {
            background-color: rgb(125 119 149);
        }

        .dropdown-menu {
            background-color: #525365;
        }

        body {
            background-color: #DDD0C8;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
  <a class="navbar-brand" href="welocme.php">Foody</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ul">
            <li class="nav-item"><a href="welocme.php">Home</a></li>
            <li class="nav-item"><a href="aboutus.php">About US</li>
            <li class="nav-item"><a href="contactus.php">Contact US</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Diffrent Type
                </a>
                <ul class="dropdown-menu">
                    <?php
                    require("connect.php");
                    $sql = "SELECT * FROM  `type`";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $data = $row["Type"];
                        echo '<li><a class="" href="type.php?name=' . $data . '">' . $data . '</a></li>';
                    }
                    ?>
                </ul>
            </li>
            
            <?php
            session_start();
            if (isset($_SESSION['user'])) {
                echo '<li class="btn ms-auto nav-item"><a href="logout.php">Logout</a></li>';
            } else {
                echo '<li class="btn ms-auto nav-item"><a href="signup.php">SignUp</a></li>';
                echo '<li class="btn nav-item"><a href="login.php">Login</a></li>';
            }
            ?>
                <li class="btn mx-0"><a href="cart.php"><span class="bi bi-cart m-0">Cart</span></a></li>
            <li class="btn"><a href="order.php">Order</a></li>
            </ul>
    </div>
  </div>
</nav>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>