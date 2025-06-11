<?php
include("header.php");

if(isset($_POST["btn_submit"]))
{
    $name=$_POST["name"];
    $email=$_POST["email"];
    $messge=$_POST["messege"];

    $sql="insert into contact values(0,'$name','$email','$messge',now())";
    $con=new connec();
    $con->insert($sql,"We will get back to you as soon as possible.");
}
?>



<section  style="min-height: 450px;">
    
<div class="container" style="justify-content: center;">

<div class="row">

 

</div>

    <div class="row" >
        <div class="col-md-6 mt-5 mb-5" style="border-radius: 30px; background-color:black; color:white;">
            <h2 class="mt-5 pl-5" >Contact Information</h2>
            <p class="mt-1 pl-5">We will get back to you as soon as possible!</p><br>
             <p class="mt-6 pl-5 md-5"><i class="fa fa-phone fa-2x mt-6"></i>&nbsp;  0300-1234567</p><br>
                          <p class="mt-6 pl-5 md-5"><i class="fa fa-envelope fa-2x mt-6"></i>&nbsp;  cinema@gmail.com</p><br>
                                                    <p class="mt-6 pl-5 md-5"><i class="fa fa-map-marker fa-2x mt-6"></i>&nbsp;  cinema.google.com</p>


                                                                <h2 class="mt-5 pl-5" >Join Us!!!</h2><br>
                                                                             <a href="#" class="mt-6 pl-5 md-5" style="color:white;"><i class="fab fa-facebook fa-2x mt-6"></i></a>
                                                                                                                                                          <a href="#" class="mt-6 pl-5 md-5" style="color:white;"><i class="fab fa-twitter fa-2x mt-6"></i></a>
                                                                             <a href="#" class="mt-6 pl-5 md-5" style="color:white;"><i class="fab fa-instagram fa-2x mt-6"></i></a>
                                                                             <a href="#" class="mt-6 pl-5 md-5" style="color:white;"><i class="fab fa-linkedin fa-2x mt-6"></i></a>





        </div>
        
            <div class="col-md-6">

                <form method="post" class="register-form">
                <div class="container">
                <center>
                <h1>Contact Us</h1>
                <p>Get in touch</p>
                </center>
                <hr>
        

                <label for="Fullname"><b>Full Name</b></label>
                <input type="text" placeholder="Enter name" name="name" id="name" required>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" id="email" required>

                <label for="messege"><b>Messege</b></label>
                <textarea name="messege" id="messege" rows="10" cols="52" style="resize: none; border-radius:10px;"></textarea>


                <hr>
                <button type="submit" name="btn_submit" class="btn" style="background-color: black; color:white; justify-content:left;">Submit</button>
            

        </div>

                </form>

    </div>
        
</div>
    
</section>













<?php
include("footer.php");
?>