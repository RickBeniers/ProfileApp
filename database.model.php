<?php
//Voor starten van server: php -S localhost:8000

//function to create a database connection
function GetConnection(){
    try{
        //declare and initialise variables
        $userName = "";
        $password = "";
        $dbname = "profileapp";

        //open connection with database
        $conn = new PDO('mysql:host=localhost;dbname='.$dbname, $userName, $password);

    }catch (PDOException $e){
        echo'connection failed: '.$e->getMessage();
    }
    //return the connection
    return $conn;
}

//function to get data to populate profile list
function GetProfileListCards($SqlQuery){

    try {
        //open a connection and enter the Sql query
        $query = $SqlQuery;
        $stmt = GetConnection()->prepare($query);
        $stmt->execute();

        //get the result from the database
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();

    }catch (PDOException $e){
        echo'Error: '.$e->getMessage();
    }
    return $data;
}

//function to get data to populate the profile card with detailed info
function GetProfileCardInfo($sqlQuery){
    try {
        //open a connection to the database
        $query = $sqlQuery;
        $stmt = GetConnection()->prepare($query);
        $stmt->execute();

        //get the result from the database
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $data = $stmt->fetchAll();

    }catch (PDOException $e){
        echo'Error: '.$e->getMessage();
    }
    return $data;
}