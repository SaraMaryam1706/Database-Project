<?php 
session_start();

if(empty($_SESSION["admin_username"]))
{
  header("Location:index.php");
}
else{

    include("admin_header.php");

    $con=new connec();
    $tbl="shows";
    $result=$con->select_all($tbl);




  ?>

     <section>
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-2" style="background-color: black;">
                    <?php include('admin_sidebar.php')?>
                </div>
                <div class="col-md-10">
                <h5 class="text-center mt-2" style="color: black;">Show Details</h5><hr>
                    <a href="addshows.php">Add Show</a>
                        <table class="table mt-5" border="1" class="mt-5">
                            <thead style="background-color: black; color:white;">
                                <tr>
                                     <th>ID</th>
                                    <th>Movie ID</th>
                                    <th>Show Date</th>
                                    <th>Show Time</th>
                                     <th>Number of Seats</th>
                                      <th>Cinema ID</th>
                                     <th>Ticket Price</th>
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
                                                     <td> <?php echo $row["movie_id"] ?> </td>
                                                    <td><?php echo $row["show_date"] ?></td>
                                                    <td><?php echo $row["show_time_id"] ?></td>
                                                    <td><?php echo $row["no_seats"] ?></td>
                                                    <td><?php echo $row["cinema_id"] ?></td>
                                                    <td><?php echo $row["ticket_price"] ?></td>
                                                    <td><a href="editshows.php?id=<?php echo $row["id"] ?>" class="btn btn-primary">Edit Booking</a>
                                                    <a href="deleteshows.php?id=<?php echo $row["id"] ?>" class="btn btn-danger">Delete Booking</a></td>
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
