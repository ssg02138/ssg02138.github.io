<?php
    $user="root";	// DB 사용자 설정
    $pass="";	// DB 패스워드 설정
    $host="localhost";	// DB 장소 설정
    $port="4000";   // DB 포트 설정
    $dbname="yournamebank";
    $con = null;
     
    function myconnection(){
        global $host;
        global $user;
        global $pass;
        global $dbname;
        global $port;
        return @mysqli_connect($host, $user, $pass, $dbname, $port);
    }

    function saveCustomer($data){
        global $con;
        if($con == null){
            $con = myconnection();
        }
            $ln = $data['ln'];
            $fn = $data['fn'];
            $bday = $data['bday'];

            $table = "customers";
            $sq = "INSERT INTO $table (lastname, firstname, birthday) VALUES ('$ln','$fn','$bday')";

            if (mysqli_connect_errno())
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                //you need to exit the script, if there is an error
                exit();
            }

            if(mysqli_query($con, $sq))
                return true;
            else
                return false;
    }

    function getCustomers(){
        global $con;
        if($con == null){
            $con = myconnection();
        }
        $table = "customers";
        $sq = "SELECT * FROM $table";

        $result =  @mysqli_query($con, $sq);

        @mysqli_close($con);

        return $result;
    }
?>