<?php 
    session_start();
    
    $sectionLength=20;
    $maxSections=3;
    
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        require('include/connect_db.php');
        
        $answer = $dbc->real_escape_string($_POST['image']);
        $partID = $dbc->real_escape_string($_POST['partID']);
        $currentQuestion = $dbc->real_escape_string($_POST['question']);
        $currentSection = $dbc->real_escape_string($_POST['section']);
        
        $nextSection=$currentSection;
        $nextQuestion=$currentQuestion+1;
        
        
        $nextURL = "./questions.php?section=".$nextSection."&question=".$nextQuestion;
        
        if($currentQuestion>=$sectionLength){
            $nextSection=$currentSection+1;
            $nextQuestion=1;
            $nextURL = "./questionsbreak.php?section=".$nextSection."&question=".$nextQuestion;
        }
        
        if($currentSection>=$maxSections&&$currentQuestion>=$sectionLength){
            $nextURL = "./final.php";
        }
        
        $query = "INSERT INTO participantresponse (questionID, participantID, sectionID, answer) VALUES ('$currentQuestion','$partID', '$currentSection', '$answer')";
        $isSuccess = $dbc->query($query);
        
        if ($isSuccess){
            
            header("Location: ".$nextURL);
            exit();
            $dbc->close();
        }
        
        else {
            echo '<p> it borked </p>';
            
        }           
    }
    
    if($_SERVER['REQUEST_METHOD']== 'GET'){
        
        $currentSection=$_GET['section'];
        $currentQuestion=$_GET['question'];
        $imgSrc = "./images/section".$currentSection."/".$currentQuestion.".png";
        
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <link href="style.css" rel="stylesheet" >
        <?php 
        
            if($currentSection==1){
                echo "<script src='js/autosubmit60.js'></script>";
            }

            else if ($currentSection==2){
                echo "<script src='js/autosubmit30.js'></script>";
            }

            else {
                echo "<script src='js/autosubmit10.js'></script>";
            }
        ?>
        <?php require('include/header.html'); ?>
    </head>
    
    <?php echo "<h4> You are on Section  ".$currentSection .", Question ". $currentQuestion ." </h4>" ?>
    
    <?php 
        
            if($currentSection==1){
                echo "<h3>You have <b id='timer'>60</b> seconds remaining!</h3>";
            }

            else if ($currentSection==2){
                echo "<h3>You have <b id='timer'>30</b> seconds remaining!</h3>";
            }

            else {
                echo "<h3>You have <b id='timer'>10</b> seconds remaining!</h3>";
            }
        ?>


<div>
    <h2>Is this image real?</h2>
    <table>
        <tr>
            <th> <img src = "<?php echo $imgSrc?>" alt="<?php echo $imgSrc?>"/> </th>
           
                    <th><form action="questions.php" method="post" role="form" name="questionForm">
                        <input type = "text" name="partID" value="<?php echo $_SESSION["participantId"] ?>" hidden>
                        <input type="text" name = "question" value ="<?php echo $currentQuestion?>" hidden/>
                        <input type="text" name = "section" value ="<?php echo $currentSection?>" hidden/>
                        <input type="radio" name="image" value="yes"> Yes </input>
                        <input type="radio" name="image" value="no"> No </input>
                        <input type="radio" name="image" value="not answered" checked hidden>
                        <input type="submit">
                    </form></th>
                </tr>
            </table>
        </div>

        <footer>
        
            <?php require('include/footer.html'); ?>

        </footer>
        
    </html>