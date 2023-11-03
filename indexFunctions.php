<?php
// add the files that are needed to run these functions
include 'index.controller.php';
//Generate a number of profile cards
function generateProfileList(){
    //declare and initialise array object
    $profileList = array();
    $profileList = populateProfileListArray();

    //loop through array object
    if(is_iterable($profileList)) {
        foreach ($profileList as $profile) {
            if($profile['first_name'] == '' && $profile['last_name'] == ''){
                $profile['first_name'] = 'No';
                $profile['last_name'] == 'Name';
            }
            if($profile['insertion'] == '' || $profile['insertion'] == null){
                $profile['insertion'] = ' ';
            }
            $fullName = $profile['first_name'] .' '. $profile['insertion'] .' '. $profile['last_name'];

            //generate a profile card for each profile in the array object
            echo "<div class='profileList-item flex-item'>
                    <div class='profileList-item-left'>
                        <a ><img src='none' class='profileCardImage'></a>
                    </div>
                        <div class='profileList-item-right flex-containerIV'>
                            <h4 class='profileCard-text'>$fullName</h4>
                            <h4 class='profileCard-text'>occupation</h4>
                            <h4 class='profileCard-text'>title</h4>
                        </div>
                    </div>";
        }
    }
}
//Generate the specific data contained within the selected profile
function generateProfileContent(){
    echo'<div class="upperInfoDiv" >
                <div class="image" ><img src="none"></div>
                <div class="infoLines flex-containerII">
                    <h4 class="text"    id="item1">First name + Last name</h4>
                    <h class="textField" id="item2"></h>
                    <h4 class="text"    id="item3">Titel</h4>
                    <h class="textField" id="item4"></h>
                    <h4 class="text"    id="item5">Occupation</h4>
                    <h class="textField" id="item6"></h>
                    <h4 class="text"    id="item7">Employer</h4>
                    <h class="textField" id="item8"></h>
                </div>
            </div>
            <div class="lowerInfoDiv">
                <div class="midSection"></div>
                <div class="lowerSection flex-containerV">
                    '; generateProfileContentCard(); echo'
                </div>
            </div>
         ';
}

//Generate content card that displays info about a specific project or experience
function generateProfileContentCard(){
    $contentCards = array("Card1", "Card2");

    //for each content card generate HTML content
    foreach ($contentCards as $contentCard){
        echo '<div class="flexV-item">
                <div class="contentCard-left">
                    <img src="none" class="projectImage">
                </div>
                <div class="contentCard-right flex-containerVI">
                    <h4 class="projectLabel" id="grid-item1">Project titel</h4>
                    <h class="projectText" id="grid-item2"></h>
                    <h4 class="projectLabel" id="grid-item3">Project link</h4>
                    <h class="projectText" id="grid-item4"></h>
                    <h4 class="projectLabel" id="grid-item5">Project discription</h4>
                    <h class="projectText" id="grid-item6"></h>
                </div>
            </div>';
    }
}