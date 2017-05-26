<html>
    <head>
        <title>Job Form</title>
        <link href="../inlineSiding.css" rel="stylesheet">
    </head>
<body>
     <div id = "center">
        <header>
		<h1> Limitless Database<h1>
	</header>
    <center>
    <nav>
            <a href="../adminFrontPage.php">Home</a> &nbsp;                
			<a href="../userManual.pdf" target="_blank">Help</a>  &nbsp; 	
	</nav>
    <main>
        <form action="addJob.php" method="post" class="infoinput"/>
            <h1>Job Site Form
                <span>Enter Job Site Info</span>
            </h1>
            <label>
                <span>Job Type*</span>
                    <select name="jobDropdown">
                        <option value = "">Select...</option>
                        <option value = "Siding">Siding</option>
                        <option value = "Framing">Framing</option>
                        <option value = "Windows">Windows</option>
                        <option value = "Demolition">Demolition</option>
                    </select>
            </label>
            <label>
                <span>Address*</span>
                <input type="text" placeholder = "Address (Required)"name="Address"/>    
            </label>
<?php

//Includes command from outside page that connects to the database
include '../databaseServerInfo.php';

//Displays retrieved data of vehicles and vehicle number is store in a variable
$dropQuery = "SELECT * FROM vehicle" ;
$result = mysqli_query($link, $dropQuery);
echo'<form action="viewVehicleTool.php" method="POST"><label><span>Send Vehicle*</span></label><select name="dropDown">
<option value=""> Select... </option>'; 

//Displays Model and Make of year with Vehicle Number as the Value in a drop down menu
while($row = mysqli_fetch_assoc($result))    
{   
    $vehicNum=$row['Vehicle_Number'];
    echo '<option value="'. $vehicNum . '">' . $row['Make'] ." ". $row['Vehicle_Year'].'</option>'; 
}

?>
            </select><br><br></label><input class="submit" type="submit" name ="submit" value="Submit"/>
        </form>
        <a href="forms.php">Back</a> &nbsp; 
    </main>
    </center>
    </div>
</body>
</html>
<?php

//If submit button is pressed
if (isset($_POST['submit']))
{
    //Initializes variables taken from values user entered in html form
    $address = $_POST['Address'];

    //Takes Job Type value from drop down selection and stores in jobType variable
    if (isset($_POST['jobDropdown']))
    {
        $jobType = $_POST['jobDropdown'];
    }
    
    //Takes the value of the Vehicle drop down ID and inserts into the QUERY statement
    if (isset($_POST['dropDown']))
    {
        $dropValue = $_POST['dropDown']; 
        $jobSql = 
            "INSERT INTO jobsite (Job_Type, Address, Vehicle_Number)
             VALUES ('$jobType', '$address', '$dropValue')";
        
        //Runs the INSERT Query of Job type Address and Vehicle Number into JobSite table
        if (!mysqli_query($link,$jobSql))
        {
            //Alert of "Invalid Input"
            die ('<script type="text/javascript">alert("Invalid Input");</script>');
        }
        
        //Popup Alert of Submition Success and ends program
        echo '<script type="text/javascript">alert("Submit Success");</script>';
        exit; 
    } 
}
?> 
