<?php 
    session_start();
?>

<!DOCTYPE html>

<html>

    <body>
        <?php 
            
            echo "Participant ID is " . $_SESSION["participantId"];

        ?>
        
        <p>Thank you for participating, please record your ID number in case you wish to withdraw from the study!</p>
    </body>

    <footer>
        
        <?php require('include/footer.html'); ?>

    </footer>

</html>