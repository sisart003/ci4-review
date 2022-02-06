<?php 

    if(isset($validation)){
        // print_r($validation->listErrors());
    }
    
?>

<form action="<?= site_url('/myFormData'); ?>" method="post">

    <p>
        Name: <input type="text" name="name">
        <?php
        
            if(isset($validation)){
                if($validation->hasError("name")){
                    echo $validation->getError("name");
                }
            }
        
        ?>
    </p>

    <p>
        Age: <input type="number" name="age">
        <?php
        
            if(isset($validation)){
                if($validation->hasError("age")){
                    echo $validation->getError("age");
                }
            }
        
        ?>
    </p>

    <p>
        Email: <input type="email" name="email">
        <?php
        
            if(isset($validation)){
                if($validation->hasError("email")){
                    echo $validation->getError("email");
                }
            }
        
        ?>
    </p>

    <input type="submit" value="Submit">

</form>