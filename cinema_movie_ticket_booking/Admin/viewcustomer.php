<?php 
session_start();

if(empty($_SESSION["admin_username"]))
{
  header("Location:index.php");
}
else{

    include("admin_header.php");

    $con=new connec();
    $tbl="customer";
    $result=$con->select_all($tbl);





  ?>

     <section>
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-2" style="background-color: black;">
                    <?php include('admin_sidebar.php')?>
                </div>
                <div class="col-md-10">
                <h5 class="text-center mt-2" style="color: black;">Customer Details</h5><hr>
                    <a href="addcustomer.php">Add Customer</a>
                        <table class="table mt-5" border="1" class="mt-5">
                            <thead style="background-color: black; color:white;">
                                <tr>
                                     <th>Id</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Cell Number</th>
                                    <th>Gender</th>
                                    <th>Password</th>

                                    <th>Options</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if($result->num_rows>0)
                                    {
                                        while($row=$result->fetch_assoc())
                                        {
                                            ?>
                                                 <tr>

                                                    <td> <?php echo $row["id"] ?> </td>
                                                     <td> <?php echo $row["fullname"] ?> </td>
                                                     <td> <?php echo $row["email"] ?> </td>
                                                    <td> <?php echo $row["cellno"] ?> </td>
                                                    <td> <?php echo $row["gender"] ?> </td>
                                                    <td> <?php echo $row["password"] ?> </td>

                                                    <td><a href="editcustomer.php?id=<?php echo $row["id"] ?>" class="btn btn-primary">Edit </a>
                                                    <a href="deletecustomer.php?id=<?php echo $row["id"] ?>" class="btn btn-danger">Delete </a></td>
                                                 </tr>
                                            <?php

                                        }
                                    }
                                ?>

                            </tbody>
                        </table>      
                        
                        
                </div>
              </div>
            </div>
          </section>
    <?php
            include("admin_footer.php");

}

  ?>
