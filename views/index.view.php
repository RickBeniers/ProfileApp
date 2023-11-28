<?php
include_once '../functions/indexFunctions.php';
include_once 'partials/index.header.php';
echo '
<main>
    <!-- Div below contains the list of profiles on the right and a more detailed overview of a profile on the left.-->
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
