<?php
       //ENTER YOUR DATABASE CONNECTION INFO BELOW:
         $hostname="ec2-34-207-250-194.compute-1.amazonaws.com";
         $database="fuzzymamdani";
         $username="root";
         $password="bevy2019";

   //DO NOT EDIT BELOW THIS LINE
     $link = mysqli_connect($hostname, $username, $password);
     mysqli_select_db($link, $database) or die('Could not select database');
 ?> 
