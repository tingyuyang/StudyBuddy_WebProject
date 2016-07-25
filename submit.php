<?php
session_start();
$a=file("classlist_".$_SESSION["username"].".txt",FILE_IGNORE_NEW_LINES);
if ($_POST["action"]=="delete"){
    $b=array();
    
    for ($c=0; count($a)>0; $c++){
        $front=array_shift($a);
        if ($c!=$_POST["index"]){
            $b[]=$front;
        }
    }
    file_put_contents("classlist_".$_SESSION["username"].".txt", implode("\n", $b));
} else {
    $a[]=$_POST["item"];
    file_put_contents("classlist_".$_SESSION["username"].".txt", implode("\n", $a));
}
header("Location: classlist.php");
?>
