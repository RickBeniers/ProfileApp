<?php
include_once '../functions/indexFunctions.php';
include_once 'partials/index.header.php';
echo '
<main>
    <div class="indexViewMain">
        <div class="indexViewLeft" >
        '; generateProfileContent(); echo'
        </div>
        <div class="indexViewRight flex-containerIII" >';
            generateProfileList(); echo'
        </div>
    </div>
</main>';
include_once 'partials/index.footer.php';
