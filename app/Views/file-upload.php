<?php

    if(session()->get("success")){
        ?>

            <h3><?= session()->get("success"); ?></h3>

        <?php
    }

    if(session()->get("error")){
        ?>
        
            <h3><?= session()->get("error"); ?></h3>

        <?php
    }

?>

<form action="<?= site_url('/fileUpload'); ?>" method="post" enctype="multipart/form-data">

    <p>
        File Upload: <input type="file" name="file">
    </p>

    <p>
        <button type="submit">Submit</button>
    </p>

</form>
