<html>

<head>
    <title>Employee Report</title>
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
        <form action="viewVehicleEmp.php" method="post" class="infoinput">
            <h1>Vehicle/Employees
                <span>Displays Employees in a Vehicle</span>
            </h1>
<?php
//Includes command from outside page that connects to the database
include '../databaseServerInfo.php';

//Drop down of Vehicles updated from database
$dropQuery = "SELECT * FROM vehicle" ;
$result = mysqli_query($link, $dropQuery);
echo'<form class="infoinput" action="viewVehicleEmp.php" method="POST"><label><span>Vehicle*</span><select name="dropDown">';
echo '<option value=""> Select... </option>'; 

//Fetches each vehicle row and assigns the vehicle number for each selection in a dropdown
while($row = mysqli_fetch_assoc($result))    
{   
    $vehicNum=$row['Vehicle_Number'];
    echo '<option value="'. $vehicNum . '">' . $row['Make'] ." ". $row['Vehicle_Year'].'</option>'; 
}
?>
        </select></label>
            <br><input class="submit" type="submit" name ="submit" value="Search"/>

            </form>
            <a href="adminViews.php">Back</a><br><br>
                  <table>
                  <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Phone Number</th>
                  <th>Job Title</th>
                  </tr>
      
            </form>
    </main>       
    </center>
</body>
    
</html>

<?php      

//If submit is pressed
if(isset($_POST['submit']))
{
    //If Drop down is selected stores Vehicle Number in a variable
    if (isset($_POST['dropDown']))
    {
        $dropValue = $_POST['dropDown'];
    }
    
//SQL SELECT * FROM location query stored in a variable
$empQuery =  "SELECT * FROM employee WHERE('$dropValue' = employee.Vehicle_Number)";          
$sqlReport = mysqli_query($link,$empQuery);

//Retrieves location and vehicle information and displays to user       
while ($report = mysqli_fetch_array($sqlReport))
{   
        echo "<tr>";
        echo "<td>" . $report['First_Name'] . "</td>";
        echo "<td>" . $report['Last_Name'] . "</td>";
        echo "<td>" . $report['Phone_Number'] . "</td>";
        echo "<td>" . $report['Job_Title'] . "</td>";
        echo "<tr>";
 }
  echo "</table>";
}          
?>
