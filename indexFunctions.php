<?php
function generateProfileList(){
    //declare and initialise array object
    $profileList = array("","","");

    //loop through array object
    foreach ($profileList as $profile){
        //generate a profile card for each profile in the array object
        echo'<div class="profileList-item flex-item">
                <div class="profileList-item-left"></div>
                <div class="profileList-item-right"></div>
            </div>';
    }
}
function generateProfileContent(){
    echo'<div class="upperInfoDiv" >
                <div class="image" ><img src="none"></div>
                <div class="infoLines flex-containerII">
                    <h class="textField" id="item1"></h>
                    <h class="textField" id="item2"></h>
                    <h class="textField" id="item3"></h>
                    <h class="textField" id="item4"></h>
                </div>
            </div>
            <div class="lowerInfoDiv"></div>
         ';
}