<?php

class connec
{
    public $username="root";
    public $password="";
    public $server_name="localhost";
    public $db_name="cinema_movie_tickect";

    public $conn;

    function __construct()
    {
       $this->conn=new mysqli($this->server_name,$this->username,$this->password,$this->db_name);

       if($this->conn->connect_error)
       {
        die("Connection failed");
       }
      
    }

     function query($sql) {
    return $this->conn->query($sql);
    }


    function select_all($table_name)
    {

        $sql="SELECT * FROM $table_name";
           $result=$this->conn->query($sql);
         return $result;
    }



        function select_time()
    {

        $sql="SELECT cinema_movie_tickect.show_time.id, cinema_movie_tickect.show_time.`time` FROM cinema_movie_tickect.shows JOIN cinema_movie_tickect.show_time ON cinema_movie_tickect.shows.show_time_id = cinema_movie_tickect.show_time.id;";
           $result=$this->conn->query($sql);
           if (!$result) {
        die("SQL Error: " . $this->conn->error);
    }
         return $result;

    }

            function select_show()
            {

                $sql="SELECT cinema_movie_tickect.shows.id, cinema_movie_tickect.shows.show_date, cinema_movie_tickect.shows.ticket_price, cinema_movie_tickect.shows.no_seats, movie.name AS 'movie_name', show_time.time, cinema.name FROM cinema_movie_tickect.shows, movie, show_time,cinema where cinema_movie_tickect.shows.movie_id=movie.id AND cinema_movie_tickect.shows.show_time_id =show_time.id AND cinema_movie_tickect.shows.cinema_id=cinema_id;";
                $result=$this->conn->query($sql);
                return $result;
            }


    // function select_movie($table_name,$type)
    // {
    //     if($type=="comingsoon")
    //     {
    //         $sql="select * from $table_name";
    //         $result=$this->conn->query($sql);
    //         return $result;
    //     }
    //     else
    //     {
    //          $sql="select * from $table_name";
    //         $result=$this->conn->query($sql);
    //         return $result;

    //     }
    // }

            function select_movie($table_name, $type)
        {
            $sql = "SELECT * FROM $table_name WHERE type = '$type'";
            $result = $this->conn->query($sql);
            return $result;
        }


        function select($table_name,$id)
    {

        $sql="SELECT * FROM $table_name where id=$id";
           $result=$this->conn->query($sql);
        return $result;
    }

       function select_login($table_name,$email)
    {

        $sql="SELECT * FROM $table_name where email='$email'";
           $result=$this->conn->query($sql);
        return $result;
    }

    function insert($query,$msg)
    {
        if($this->conn->query($query)===TRUE)
        {
           echo' <script>alert("'.$msg.'");</script>';
        }
        else
        {
           echo' <script>alert(".$this->conn->error.");</script>';
        }
    }

         function update($query,$msg)
    {
        if($this->conn->query($query)===TRUE)
        {
           echo' <script>alert("'.$msg.'");</script>';
        }
        else
        {
           echo' <script>alert(".$this->conn->error.");</script>';
        }
    }

             function delete($table_name,$id)
    {
        $query="DELETE from $table_name where id=$id;";
        if($this->conn->query($query)===TRUE)
        {
           echo' <script>alert("Record deleted");</script>';
        }
        else
        {
           echo' <script>alert(".$this->conn->error.");</script>';
        }
    }




    function insert_lastid($query)
    {

        $last_id=null;

        if($this->conn->query($query)===TRUE)
        {
             $last_id=$this->conn->insert_id;
        }
        else
        {
           echo' <script>alert("'.$this->conn->error.'");</script>';
           // echo $this->conn->error;
        }


        return $last_id;
    }
}




?>