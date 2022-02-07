<button type="button" id="btn-click">Click Me</button>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script>

    $(function(){
        $(document).on("click", "#btn-click", "click", function(){
            $.ajax({
                url: "<?= site_url('/handleAjax'); ?>",
                type: "POST",
                data: {
                    name: "Bry",
                    age: "29",
                    email : "bry@ecorp.com"
                },
                dataType : "JSON",
                success: function(response){
                    console.log(response);
                }
            });
        });
    });

    

</script>