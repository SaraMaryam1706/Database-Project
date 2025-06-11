<?php
include("header.php");
//include("conn.php");

$con=new connec();
$tbl="movie";
$result = $con->select_movie("movie", "nowshowing");
$sql = "SELECT movie.*, industry.industry_name, genre.genre_name, language.lang_name 
        FROM movie 
        JOIN industry ON movie.industry_id = industry.id 
        JOIN genre ON movie.genre_id = genre.id 
        JOIN language ON movie.lang_id = language.id";
$result1 = $con->conn->query($sql);

?>


<section class="mt-5 text-center d-flex flex-column">
    <h4>Now Showing</h4><br>

    <div class="container movie-card-content flex-grow-1">
        <div class="row">
            <?php
            if($result->num_rows>0)
            {

                while($row=$result->fetch_assoc())
                {
                    $ind=$con->select("industry",$row["industry_id"]);
                    $indrow=$ind->fetch_assoc();

                    $lang=$con->select("language",$row["lang_id"]);
                    $langrow=$lang->fetch_assoc();

                    $gen=$con->select("genre",$row["genre_id"]);
                    $genrow=$gen->fetch_assoc();
                    
                


                    ?>
                        <div class="col-md-3">
                            <!-- <img src="" style="width:100%; height:250px;"> -->
                             <img src="<?php echo $row["movie_banner"];?>" style="width:auto; height:250px;">
                            <h5 class="text-center mt-2 md-3"><?php echo $row["name"] ?></h5><br>
                            <p><b>Release Date: </b><?php echo $row["rel_date"] ?></p>
                            <p><b>Industry: </b><?php echo $indrow["industry_name"] ?></p>
                            <p><b>Language: </b> <?php echo $langrow["lang_name"] ?></p>
                            <p><b>Genre: </b><?php echo $genrow["genre_name"] ?></p>
                             <p><b>Duration: </b> <?php echo $row["duration"] ?></p>

                             
                            <a class='btn' style="background-color: black; color:white; justify-content:left; width:100%;" href="booking.php">Book ticket now!</a>






                        </div>

                    <?php
                }
            }
            ?>
            
        </div>
    </div>

</section>






<?php
include("footer.php");
?>