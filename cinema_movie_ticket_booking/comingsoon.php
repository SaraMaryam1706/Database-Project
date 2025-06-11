<?php
include("header.php");
//include("conn.php");

$con=new connec();
$tbl="movie";
$result = $con->select_movie("movie", "comingsoon");
?>


<section class="mt-5 text-center">
    <h4>Coming Soon!!</h4><br>

    <div class="container">
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