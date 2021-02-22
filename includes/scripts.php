<script src="js/sweetalert.min.js"></script>
<script>
<?php  if(isses($_SESSION['status']) && $_SESSION['status']!=''){
    ?>
        swal({
            title: "<?php echo  $_SESSION['status'];?>",
            // text: "You clicked the button!",
            icon: "<?php echo $_SESSION['status_code'];?>",
            button: "Ok Done!",
        });

</script>
<?php
unset($_SESSION['status']);
    }
    ?>