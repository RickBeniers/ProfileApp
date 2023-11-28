<?php
// add files required for the controller to work
require '../database.model.php';
function populateProfileListArray(){
    //create sql statement
    $sqlString ='SELECT first_name, last_name, insertion 
                    FROM users';
    //populate array
    $profileArray = array();
    $profileArray = GetProfileListCards($sqlString);
    //return array
    return $profileArray;
}
function GetProfileListDetails(){
    //create sql statement
    $sqlString ='SELECT workplace_name, job_name
                FROM work_experiences';

    //populate array
    $detailArray = array();
    $detailArray = GetProfileCardInfo($sqlString);
    //return array to be used in generating a list of profiles.
    return $detailArray;
}