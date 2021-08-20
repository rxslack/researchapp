<?php 
    $nextQuestion=$_GET['question'];
    $nextSection=$_GET['section'];

    $nextURL = "./questions .php?section=".$nextSection."&question=".$nextQuestion;

?>
<h1>The next section is blah blah</h1>
<a href = '<?php echo $nextURL ?>'><button>Click here to proceed</a>