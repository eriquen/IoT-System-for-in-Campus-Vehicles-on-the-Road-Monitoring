<?php 
include("admin/includes/init.php"); 

if($session->loggedIn()){
    if($_SESSION['user_role'] == 'Admin'){
        redirect("admin/index.php");
    }else{
        redirect("index.php");
    }
    
}
$the_message = "";

if(isset($_POST['submit'])){

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    
    $user_found = User::verify_user($email, $password);

    if($user_found){
        $session->login($user_found);
        // var_dump($session);
        // die();
        if($_SESSION['user_role'] == 'Admin'){
            redirect("admin/index.php");
        }else{
            redirect("index.php");
        }
    }else{

        $the_message = "Your email or password are incorrect";
    }
}else{
    $email = "";
    $password = "";
}
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>VMS</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
    <link rel="icon"  type="image/png" href="vendor/favicon.png">
</head>

<body>
    <nav class="white" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="index.php" class="brand-logo Pacifico"><img class="img_logo" src="./admin/images/logo/unimap_logo.png"></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="index.php">Home</a></li>
            </ul>

            <ul id="nav-mobile" class="sidenav">
                <li><a href="index.php">Home</a></li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        </div>
    </nav>
<main>
    <div class="container">
        <div class="section login-form"> 
            <div class="row">
                <div class="col s0 m2 l3 "></div>
                <form method="post" class="col s12 m8 l6">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate" name="email" required autocomplete="off">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" type="password" class="validate" name="password" required autocomplete="off">
                            <label for="password">Password</label>
                        </div>
                        <div class="col s5"> 
                            <p class="red-text m-0"><?php echo $the_message; ?></p>
                        </div>
                        <div class="col s3 right">
                            <a href="#" class="grey-text lighten-1 ">Forgotten account?</a>
                        </div>
                    </div>
                    <div class="row">
                        
                    </div>
                    <div class="row">
                        
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <a href="register.php" class="waves-effect waves-light btn brown">Register</a>
                        </div>
                        <div class="input-field col s6">
                       
                            <button type="submit" class="waves-effect waves-light btn  right" name="submit">Login</button>
                        </div>
                    </div>
                    
                </form>
                <div class="col s0 m2 l3 "></div>
            </div>
        </div>
    </div>
</main>   
    <footer class="page-footer teal down p-bottom">
        <!-- <div class="container"> -->
            <!-- <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Company Bio</h5>
                    <p class="grey-text text-lighten-4">We are a team of college students working on this project like
                        it's our full time job. Any amount would help support and continue development on this project
                        and is greatly appreciated.</p>
                </div>
                <div class="col l3 s12">
                    <h5 class="white-text">Social</h5>
                    <ul>
                        <li><a class="white-text" href="#!">facebook/VMS</a></li>
                        <li><a class="white-text" href="#!">twitter/VMS</a></li>
                        <li><a class="white-text" href="#!">instagram/VMS</a></li>
                    </ul>
                </div> -->
                <!-- <div class="col l3 s12">
                    <h5 class="white-text">Connect</h5>
                    <ul>
                        <li><a class="white-text" href="#!">Link 1</a></li>
                        <li><a class="white-text" href="#!">Link 2</a></li>
                        <li><a class="white-text" href="#!">Link 3</a></li>
                        <li><a class="white-text" href="#!">Link 4</a></li>
                    </ul>
                </div> -->
            <!-- </div> -->
        </div>
        <div class="footer-copyright">
            <div class="container">
                Made by <a class="brown-text text-lighten-3" href="http://materializecss.com">Syed Adzha</a>
            </div>
        </div>
    </footer>


    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/init.js"></script>

</body>

</html>