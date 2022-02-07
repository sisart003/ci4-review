<?php

    if(isset($validation)){
        print_r($validation->listErrors());
    }

?>

<form method="post" enctype="multipart/form-data" action="<?= site_url("/fileRule"); ?>">

    <p>
        Select File: <input type="file" name="filezz">
    </p>

    <p>
        <button type="submit">Submit</button>
    </p>

</form>