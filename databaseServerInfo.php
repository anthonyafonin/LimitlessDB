<?php

/////////////////////////////////////////////////////////
//Final Project url
//    http://limitlessdatabase.netne.net/
//    
//Front Page Login Information
//    Admin Account:
//        Username: admin
//        Password = password
//    Crew Member Account:
//        Username: crew
//        Password: guest
//    
//Web Host login information
//    https://members.000webhost.com/login
//    Username: downfallaa@gmail.com
//    Password: passw0rd
//        
//FTP Server infomation
//    limitlessdatabase.netne.net
//    Username: a3200977
//    Password: password0000
/////////////////////////////////////////////////////////
    

//Change Variable Values to desired MYSQL database sever information

//Live Server MySQL Information
$DB_HOST = "mysql8.000webhost.com";
$DB_USER = "a3200977_user";
$DB_PASS = "password0000";
$DB_NAME = "a3200977_limitdb";

////Localhost server MySQL information
//$DB_HOST = "localhost";
//$DB_USER = "admin";
//$DB_PASS = "admin1";
//$DB_NAME = "limitless";

//Connect to Database using MYSQL database information
$link = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

?>