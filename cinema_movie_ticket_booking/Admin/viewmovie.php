<?php 
session_start();

if(empty($_SESSION["admin_username"]))
{
  header("Location:index.php");
}
else{

    include("admin_header.php");

    $con=new connec();
    $sql="SELECT movie.id,movie.name, movie.type, movie.duration, movie.movie_banner, movie.rel_date, industry.industry_name, genre.genre_name, language.lang_name FROM movie JOIN industry ON movie.industry_id = industry.id JOIN genre ON movie.genre_id = genre.id JOIN language ON movie.lang_id = language.id;";
    $result=$con->query($sql);




  ?>

     <section>
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-2" style="background-color: black;">
                    <?php include('admin_sidebar.php')?>
                </div>
                <div class="col-md-10">
                <h5 class="text-center mt-2" style="color: black;">Movie Details</h5><hr>
                    <a href="addmovie.php">Add Movie</a>
                        <table class="table mt-5" border="1" class="mt-5">
                            <thead style="background-color: black; color:white;">
                                <tr>
                                     <th>Banner</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Release Date</th>
                                     <th>Industry</th>
                                      <th>Genre</th>
                                     <th>Language</th>
                                      <th>Movie Duration</th>
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

                                                    <td><img src="../<?php echo $row["movie_banner"]?>" style="height:100px;"></td>
                                                    <td> <?php echo $row["name"] ?> </td>
                                                     <td> <?php echo $row["type"] ?> </td>
                                                    <td><?php echo $row["rel_date"] ?></td>
                                                    <td><?php echo $row["industry_name"] ?></td>
                                                    <td><?php echo $row["genre_name"] ?></td>
                                                    <td><?php echo $row["lang_name"] ?></td>
                                                    <td><?php echo $row["duration"] ?></td>
                                                    <td><a href="editmovie.php?id=<?php echo $row["id"] ?>" class="btn btn-primary">Edit Movie</a>
                                                    <a href="deletemovie.php?id=<?php echo $row["id"] ?>" class="btn btn-danger">Delete Movie</a></td>
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
