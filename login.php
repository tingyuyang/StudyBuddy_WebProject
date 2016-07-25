<?php
session_start();//super important

$found=0;

$name=$_POST["name"];
$password=$_POST["password"];
$_SESSION["username"]=$name;

$users=file("users.txt", FILE_IGNORE_NEW_LINES);//it does not count /n
 
foreach($users as $user){

    $parts=explode(":", $user);
    
    $u=array_shift($parts);
    $p=implode(":", $parts);
   
    if($name==$u){//so if the user typed name actually match with the stored data && ound will only be update if we found the user in the data, 
           $found=1;
        
        if ($password==$p){
            header("Location: classlist.php");//so if user typed in the correct password here.
            echo "it's a match";
            
        } else {
           $found=1;
            $_SESSION["error"]="Password Incorrect";//if the password is not correct
            header("Location: start.php");
        
           
        }
    }
}
    if ($found==0){ 
         if (preg_match("/^[a-z]{1}\w{2,7}$/",$name) && preg_match("/^[1-9]{1}\w{4,10}\W{1}$/",$password)){
       
        $userpw= "\n" . $name . ":" . $password;
        file_put_contents('users.txt', $userpw, FILE_APPEND);//make sure you wont overwrite
        file_put_contents("classlist_".$name.".txt", "");//make a text file for the users. 
        header("Location: classlist.php");//send you to...
        
       
       
    } else {//if the passwork does not match

        $_SESSION["error"]="Please enter a valid password !";
        header("Location: start.php");
       
        
    }

    
}

//var_dump($users);



?>