<?php
include_once 'index.header.php';
include_once 'indexFunctions.php';
echo '
<main>
    <div class="indexViewMain">
        <div class="indexViewLeft" >
            <div class="upperInfoDiv" >
                <div class="image" ></div>
                <div class="infoLines"></div>
            </div>
            <div class="lowerInfoDiv"></div>
        </div>
        <div class="indexViewRight" >';
            generateProfileList(); echo'
        </div>
    </div>
</main>';
include_once 'index.footer.php';
