<html>
<head>
    <title>Limitless</title>
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
        <form method="post" class="infoinput"/>   
        <h1>Send Object
            <span>Select One Object</span>
        </h1>
        <label>       
            <span>Tool ID</span>
            <input type="number" placeholder="Tool ID"name="Tool_Number" min="1" />                                  

<?php
//Includes command from outside page that connects to the database
include '../databaseServerInfo.php';

//Drop down of Vehicles updated from database
$empQuery = "SELECT * FROM employee" ;
$result = mysqli_query($link, $empQuery);
echo'<form class = "infoinput" action="updateForm.php" method="POST"><label><span>Employee</span><select name="empDown">
<option value=""> Select... </option>'; 

while($row = mysqli_fetch_assoc($result))    
{   
    $empNum=$row['Employee_ID'];
    echo '<option value="'. $empNum . '">' . $row['First_Name'] ." " . $row['Last_Name'] .'</option>'; 
}
?>     
        </select> 
        </label> 
            
<?php
//Drop down of Vehicles updated from database
$dropQuery = "SELECT * FROM vehicle" ;
$result = mysqli_query($link, $dropQuery);
echo'<form class = "infoinput" action="updateForm.php" method="POST"><label><span>Vehicle*</span><select name="vecDown">
<option value=""> Select... </option>'; 

while($row = mysqli_fetch_assoc($result))    
{   
    $vehicNum=$row['Vehicle_Number'];
    echo '<option value="'. $vehicNum . '">' . $row['Make'] ." ". $row['Vehicle_Year'].'</option>'; 
}
?>   
        </select> 
        </label> 
        </label>                      
        <br><br>
        <h1>To Location
            <span>Select One Location</span>
        </h1>
        <label>       
                                                                 
<?php
//Includes command from outside page that connects to the database
include '../databaseServerInfo.php';

//Drop down of Vehicles updated from database
$dropQuery = "SELECT * FROM vehicle" ;
$result = mysqli_query($link, $dropQuery);
echo'<form class = "infoinput" action="updateForm.php" method="POST"><label><span>Vehicle*</span><select name="dropDown">
<option value=""> Select... </option>'; 

while($row = mysqli_fetch_assoc($result))    
{   
    $vehicNumLoc=$row['Vehicle_Number'];
    echo '<option value="'. $vehicNumLoc . '">' . $row['Make'] ." ". $row['Vehicle_Year'].'</option>'; 
}
?>   
        </select> 
        </label>      
                 
<?php
//Drop down of Vehicles updated from database
$jobQuery = "SELECT * FROM jobsite" ;
$result = mysqli_query($link, $jobQuery);
echo'<form class = "infoinput" action="updateForm.php" method="POST"><label><span>Job Site</span><select name="jobDown">
<option value=""> Select... </option>'; 

while($row = mysqli_fetch_assoc($result))    
{   
    $jobNum=$row['Job_Number'];
    echo '<option value="'. $jobNum . '">' . $row['Address'] .'</option>'; 
}
?>     
        </select>
        </label>   
            <span>To Warehouse</span>
            <div id ="check">
                <input type="checkbox" name="Warehouse" value="Yes"/>
            </div>
        </label>               
        <input class="submit" type="submit" name ="submit" value="Submit" />    
        </form> 
            <a href="../adminFrontPage.php">Back</a><br><br>
            <form class="infoinput" method="post" action="updateForm.php" id="toolSearch">
                <h1>Tool Search
                    <span>Use to get Tool ID</span>
                </h1>
                <label>
                    <span>Tool Name </span><input type="text" placeholder="Search Tool Name"name="tool"><br>
                    <input class="submit" type="submit" name="search" value="Search">
                </label>
            </form>            
                  <table>
                  <tr>
                  <th>Tool ID</th>
                  <th>Tool Name</th>
                  <th>Manufacturer</th>
                  </tr>
        </center>
        </div>
</main>
</body>
</html>
<?php      
//If submit button is pressed
if(isset($_POST['submit']))
{
    //!----------ERRORS; Not correct way to store pairs of Selector names-------!//
    //Depening on which combination of Object and Location dropdowns are selected, a custom SQL UPDATE query is created and submits
    if(isset($_POST['Tool_Number']) && isset($_POST['dropDown']))
    {
        $toolNum = $_POST['Tool_Number'];
        $vehLoc = $_POST['dropDown'];
        $updateSql = "UPDATE tool SET Location_ID = '$vehLoc' WHERE Tool_Number ='$toolNum'";
    }
    
    if(isset($_POST['Tool_Number']) && isset($_POST['Warehouse']))
    {
        $toolNum = $_POST['Tool_Number'];
        $warehouse = $_POST['Warehouse'];
        $updateSql = "UPDATE tool SET Location_ID = '$warehouse' WHERE Tool_Number ='$toolNum'";
    }
    
    if(isset($_POST['empDown']) && isset($_POST['dropDown']))
    {
        $empNum = $_POST['empDown'];
        $vehLoc = $_POST['dropDown'];
        $updateSql = "UPDATE employee SET Vehicle_Number = '$vehLoc' WHERE Employee_ID ='$empNum'";
    }
    
    if(isset($_POST['vecDown']) && isset($_POST['jobDown']))
    {
        $vecNum = $_POST['vecDown'];
        $jobNum = $_POST['jobDown'];
        $updateSql = "UPDATE vehicle SET Vehicle_Number = '$jobDown' WHERE Jobsite ='$vecNum'";
    }
    //!---------------------------------------------------------------------!//
    
    //Displays error message if invalid input
    if (!mysqli_query($link,$updateSql))
    {
        //Alert of "Invalid Input"
        die ('<script type="text/javascript">alert("Invalid Input");</script>');
    }
    
}   
if(isset($_POST['search']))
{
    //Takes search value and stores in a SELECT query variable
    $name = $_POST['tool'];
    $toolSearch = "SELECT * FROM tool WHERE (Tool_Name LIKE '%{$name}%')";
    $result = mysqli_query($link, $toolSearch);

    //Retrieves location and vehicle information and displays to user       
    while ($report = mysqli_fetch_array($result))
    {        
            echo "<tr>";
            echo "<td>" . $report['Tool_Number'] . "</td>";
            echo "<td>" . $report['Tool_Name'] . "</td>";
            echo "<td>" . $report['Manufacturer'] . "</td>";

     }
    echo "</table>";
    //ends program   
    exit;      
}
?>


