<?php 
        //echo form_open("simple/myForm", "class='my-form' id='my-form'"); 
    
    

        // $name_attributes = [
        //     "name" => "txt_name",
        //     "value" => "Chrishart",
        //     "placeholder" => "Name",
        //     "class" => "txtname",
        //     "id" => "txtname"
        // ];
    
    

        //echo form_input($name_attributes);
    
    
    
        // $textarea = [
        //     "name" => "txt_body",
        //     "placeholder" => "Novel",
        //     "class" => "my_body",
        //     "id" => "my_body"
        // ];

        // echo form_textarea($textarea);

        // echo form_hidden("txt_hidden", "secret_code");

        // echo form_submit("btn_submit", "Submit");
    
    

        //echo form_close(); ?>

<?php

    if(session()->get("success")){
        echo "<h2>" . session()->get("success") ."</h2>";
    }

    if(session()->get("error")){
        echo "<h2>" . session()->get("error") ."</h2>";
    }

?>

<form method="post" action="<?php echo site_url('/myForm'); ?>">

    <p>
        Name: <input type="text" name="txt_name" placeholder="Name">
    </p>

    <p>
        Age: <input type="text" name="txt_age" placeholder="Age">
    </p>

    <p>
        Email: <input type="text" name="txt_email" placeholder="Email">
    </p>

    <input type="submit" value="Submit">

</form>