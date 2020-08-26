<?php include("includes/header.php");
if( ! $session->loggedIn() ){ redirect("login.php"); } 
   if( ! $session->loggedIn() ){ redirect("login.php"); } 
    $user = new User();
    $user_detail = $user->find_by_id($_SESSION['user_id']);
   
    if(isset($_POST['update'])){
        if($user_detail){
            $user_detail->first_name = $_POST['first_name'];
            $user_detail->last_name = $_POST['last_name'];
            $user_detail->email  = $_POST['email'];
            $user_detail->matric_num  = $_POST['matric_num'];
            $user_detail->ic_num  = $_POST['ic'];
            $user_detail->plate_num  = $_POST['plate_num'];
            $user_detail->car_brand  = $_POST['car_brand'];
            $user_detail->car_color  = $_POST['car_color'];
            $user_detail->phone_num  = $_POST['phone_num']; 
            $user_detail->save();  
        }
    }

?>


<main class="grey lighten-4">
    <div class="container">
        <?php 
            
        ?>
        <div class="row">
            <div class="col m2"></div>
            <div class="col m8 s12">
                <div class="row mt-30 white pad-20">
                    <div class="col s12 ">
                    <h3>Edit Profile</h3>
                <form class="col" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="input-field col s6">
                            <input  id="first_name" name="first_name" type="text" class="validate" value="<?php echo $user_detail->first_name; ?>">
                            <label for="first_name">First Name</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="last_name" type="text" class="validate" name="last_name" value="<?php echo $user_detail->last_name; ?>">
                            <label for="last_name">Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate" name="email" value="<?php echo $user_detail->email; ?>">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="matric_num" type="text" class="validate" name="matric_num" value="<?php echo $user_detail->matric_num; ?>">
                            <label for="matric_num">Matric Number</label>
                            <span class="helper-text" data-error="wrong" data-success="right"></span>
                        </div>
                        <div class="input-field col s6">
                            <input id="ic" type="text" class="validate" name="ic" value="<?php echo $user_detail->ic_num; ?>">
                            <label for="ic">IC No/Passport No</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                          <input id="car_brand" type="text" class="validate" name="car_brand" value="<?php echo $user_detail->car_brand; ?>">
                          <label for="car_brand">Car Brand</label>
                        </div>
                        <div class="input-field col s6">
                          <input id="car_color" type="text" class="validate" name="car_color" value="<?php echo $user_detail->car_color; ?>">
                          <label for="car_color">Car Color</label>
                        </div>
                        <div class="input-field col s6">
                          <input id="plate_num" type="text" class="validate" name="plate_num" value="<?php echo $user_detail->plate_num; ?>">
                          <label for="plate_num">Plate Number</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="phone_num" type="text" class="validate" name="phone_num" value="<?php echo $user_detail->phone_num; ?>">
                            <label for="phone_num">Phone Number</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <button type="submit" class="waves-effect waves-light btn  right" name="update">Update</button>     
                        </div>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
            <div class="col m2"></div>

        </div>
    </div>
</main>   

  <?php include("includes/footer.php"); ?>


