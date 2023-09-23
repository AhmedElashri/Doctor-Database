<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
        <?php include 'style.css'; ?>
    </style>
    <title>Home Page</title>
</head>

<body>

    <!-- Nav Bar -->
    <div class="container page-container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Team 5's Doctor Finder</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="adminpage.php">Login As Admin</a>
                        </li>
                    </ul>
                    <form class="d-flex" action="index.php">
                        <input class="form-control me-2" name="keyword" type="search" placeholder="Search Doctors" aria-label="Search">
                        <button class="btn btn-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- Login As Admin -->
        <br><br><br><br><br><br>
        <div class="row justify-content-center">
            <div class="col-5">
                <form class="justify-content-center form-control" method="post">

                    <!-- Form Name -->
                    <legend>Login</legend>

                    <br>
                    <?php
                    session_start();

                    include("includes/dbconnect.php");
                    include("includes/functions.php");

                    if (isset($_POST['LoginC'])) {
                        if ($_SERVER['REQUEST_METHOD'] == "POST") {
                            //something was posted
                            $id = $_POST['id'];
                            $password = $_POST['password'];

                            if (!empty($id) && !empty($password)) {
                                if ("admin" === $id) {
                                    if ("admin" === $password) {
                                        $_SESSION['cLogID'] = "adminLog935115";
                                        header("Location: adminpage.php");
                                        die;
                                    }
                                }
                                echo "<div class=\"col\" style=\"color: red;\"><b>Wrong ID or Password!</b></div>";
                            } else {
                                echo "<div class=\"col\" style=\"color: red;\"><b>Wrong ID or Password!</b></div>";
                            }
                        }
                    }
                    ?>

                    <!-- Text input-->

                    <div class="row">
                        <div class="col-6">
                            <label for="">ID or Name</label>
                        </div>
                        <div class="col-6">
                            <label for="">Password</label>
                        </div>
                    </div>
                    <form method="POST">
                        <div class="row">
                            <div class="col-5">
                                <input name="id" type="text" placeholder="Example: 0131965" class="form-control">
                            </div>
                            <div class="col-1"></div>
                            <div class="col-5">
                                <input name="password" type="password" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="d-grid gap-2">
                                <button id="login" name="LoginC" value="LoginC" class="btn btn-primary">Login As Admin</button>
                            </div>
                        </div>
                    </form>

</body>

</html>