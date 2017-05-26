<html>
    <head>
        <title>Employee Form</title>
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
         <form action="addEmployee.php" method="post" class="infoinput">
            <h1>Employee Form
                <span>Enter Employee Info</span>
            </h1>

            <label>
                <span>First Name*</span>
                <input id="name" type="text" name="First_Name" placeholder="First Name (Required)" />
            </label>

            <label>
                <span>Middle Name</span>
                <input id="middlename" type="text" name="Middle_Name" placeholder="Middle Name (Required)" />
            </label>

            <label>
                <span>Last Name*</span>
                <input id="lastname" type="text" name="Last_Name" placeholder="Last Name (Required)" />
            </label>  

             <label>
                <span>Phone Number</span>
                <input type="tel" placeholder ="000-000-0000" name="Phone_Number"/>
            </label> 

             <label>
                 <span>Job Title*</span>
                 <input type="text" name="Job_Title" placeholder="Job Title (Required)"/>
             </label>

             <label>
                 <span>Date of Hire*</span>
                 <input type="date" step="any" name="Wage" placeholder="Last Name (Required)"/>
             </label>

             <label>
                 <span>Wage/Hr*</span>
                 <input type="number" step="any" name="Wage" placeholder="Wage (Required)"/>
             </label>
<?php

//Includes command from outside page that connects to the database
include '../databaseServerInfo.php';

//Displays retrieved data of vehicles and vehicle number is store in a variable
$dropQuery = "SELECT * FROM vehicle" ;
$result = mysqli_query($link, $dropQuery);
echo'<form action="viewVehicleTool.php" method="POST"><label><span>Send To*</span></label><select name="dropDown">
<option value"">Select...</option>'; 

//Displays Model and Make of year with Vehicle Number as the Value in a drop down menu
while($row = mysqli_fetch_assoc($result))    
{   
    $vehicNum=$row['Vehicle_Number'];
    echo '<option value="'. $vehicNum . '">' . $row['Make'] ." ". $row['Vehicle_Year'].'</option>'; 
}
?>
    </select><br><input class ="submit" type="submit" name ="submit" value="Submit"/></label></form>
        <a href="forms.php">Back</a> &nbsp;                                              
    </main> 
    </div>
    </center>
</body>
</html>
<?php

//If submit button is clicked             
if (isset($_POST['submit']))
{             
    //Initializes variables taken from values user entered in html form
    $firstName = $_POST['First_Name'];
    $middleName = $_POST['Middle_Name'];
    $lastName = $_POST['Last_Name'];   
    $phoneNumber = $_POST['Phone_Number'];
    $jobTitle = $_POST['Job_Title'];
    $dateOfHire = $_POST['Date_of_Hire'];
    $employeeWage = $_POST['Wage'];   
    
    if (isset($_POST['dropDown']))
    {
        $dropValue = $_POST['dropDown'];             
    }        
    
        //Stores INSERT INTO employee query with values from user input
        $employeeSql = 
            "INSERT INTO employee (First_Name, Middle_Name, Last_Name,
                Phone_Number, Job_Title, Date_of_Hire, Wage, Vehicle_Number)
            VALUES ('$firstName', '$middleName', '$lastName', 
                '$phoneNumber', '$jobTitle', '$dateOfHire', $employeeWage, '$dropValue')";
        
        //Displays error message if invalid input
        if (!mysqli_query($link,$employeeSql))
        {
            //Alert of "Invalid Input"
            die ('<script type="text/javascript">alert("Invalid Input");</script>');
        }
            
        //Popup alert of submit success        
        echo '<script type="text/javascript">alert("Submit Success");</script>';
        exit;   

}
?> 
