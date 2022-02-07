<form action="<?= site_url('/myToken') ?>" method="post">

    <!-- <input type="hidden" name="<?php //csrf_token(); ?>" value="<?php //csrf_hash(); ?>"> -->
    <p>
        Name: <input type="text" name="txt_name" placeholder="Name">
    </p>

    <p>
        <button type="submit">Submit</button>
    </p>

</form>