<?php 
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" href="style.css">
    </head>
    <?php 
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            require('include/connect_db.php');
            
            $q1 = $dbc->real_escape_string($_POST['q1']);
            $q2 = $dbc->real_escape_string($_POST['q2']);
            $q3 = $dbc->real_escape_string($_POST['q3']);
            $q4 = $dbc->real_escape_string($_POST['q4']);
            $q5 = $dbc->real_escape_string($_POST['q5']);
            $q6 = $dbc->real_escape_string($_POST['q6']);
 

            $query = "INSERT INTO consent (q1, q2, q3, q4, q5, q6) VALUES ('$q1', '$q2', '$q3', '$q4', '$q5', '$q6')";
            $isSuccess = $dbc->query($query);
            $_SESSION["participantId"] = $dbc->insert_id; 

            if ($isSuccess){
                echo '<h2>Thank you!</h2> <h3>Your Participant ID number is: '.$_SESSION["participantId"].'</h3> <h4>Please record your number as you may need it to withdraw later</h4> <a href = "/questions.php?section=1&question=1"> <button> begin! </button> </a>';
                exit();
                $dbc->close();
            }

            else {
                echo '<p> it borked </p>';
            }
            
        } 
    
    ?>
    
    <body>
        <?php require('include/header.html'); ?>
        <h2> Consents! </h2>
        <form action="consent.php" method="post" role="form">
            <table class="t1">
                <tr>
                    <td>Yes</td>
                    <td>No</td>
                </tr>
                <tr>
                    <td><input type="radio" name="q1" id="yes1" value="yes"></td>
                    <td><input type="radio" name="q1" id="no1" value="no"></td>
                    <td>1. I have read the Information Sheet for this study and have had details of the study explained to me.</td>
                </tr>
                <tr>
                    <td><input type="radio" name="q2" id="yes2" value="yes"></td>
                    <td><input type="radio" name="q2" id="no2" value="no"></td>
                    <td>2. My questions about the study have been answered to my satisfaction and I understand that I may ask further questions at any point.</td>
                </tr>
                <tr>
                    <td><input type="radio" name="q3" id="yes3" value ="yes"></td>
                    <td><input type="radio" name="q3" id="no3" value="no"></td>
                    <td>3. I understand that I am free to withdraw from the study within the time limits outlined in the Information Sheet, without giving a reason for my withdrawal or to decline to answer any particular questions in the study without any consequences to my future treatment by the researcher.</td>
                </tr>
                <tr>
                    <td><input type="radio" name="q4" id="yes4" value ="yes"></td>
                    <td><input type="radio" name="q4" id="no4" value="no"></td>
                    <td>4. I agree to provide information to the researchers under the conditions of confidentiality set out in the Information Sheet.</td>
                </tr>
                <tr>
                    <td><input type="radio" name="q5" id="yes5" value ="yes"></td>
                    <td><input type="radio" name="q5" id="no5" value="no"></td>
                    <td>5. I wish to participate in the study under the conditions set out in the Information Sheet.</td>
                </tr>
                <tr>
                    <td><input type="radio" name="q6" id="yes6" value ="yes"></td>
                    <td><input type="radio" name="q6" id="no6" value="no"></td>
                    <td>6. I consent to the information collected for the purposes of this research study, once anonymised (so that I cannot be identified), to be used for any other research purposes.</td>
                </tr>
            </table>

            <input type="submit">
        </form>




    </body>

    <footer>
        
        <?php require('include/footer.html'); ?>

    </footer>

</html>