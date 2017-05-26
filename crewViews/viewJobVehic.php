<html>

<head>
    <title>Job Site Report</title>
    <link href="../inlineSiding.css" rel="stylesheet">
</head>

<body>
    <div id = "center">
    <header>
            <h1> Limitless Database<h1>
    </header>
    <center>
    <nav>
        <a href="crewViews.php">Home</a> &nbsp;
        <a href="../userManual.pdf" target="_blank">Help</a>  &nbsp;        
    </nav>
    <main>   
        <form action="viewJobVehic.php" method="post" class="infoinput">
            <h1>Vehicle/Job Site
                <span>Displays Vehicle's Job Site</span>
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
            <a href="crewViews.php">Back</a><br><br>
              <table>
              <tr>         
              <th>Job Type</th>
              <th>Address</th>
              <th>Vehicle ID</th>
              <th>Model</th>
              <th>Make</th>
              <th>Year</th>             
              </tr>      
    </main> 
    </center>
</body>
</html>

<?php
if(isset($_POST['submit']))
{
    //If Drop down is selected stores Vehicle Number in a variable
    if (isset($_POST['dropDown']))
    {
        $dropValue = $_POST['dropDown'];
    }

    //SQL SELECT * FROM location query stored in a variable
    $jobQuery = "SELECT * FROM jobsite LEFT OUTER JOIN vehicle ON(jobsite.Vehicle_Number = vehicle.Vehicle_Number) WHERE (vehicle.Vehicle_Number = '$dropValue')";             
    $sqlReport = mysqli_query($link,$jobQuery);

    //Retrieves location and vehicle information and displays to user       
    while ($report = mysqli_fetch_array($sqlReport))
    {        
            echo "<tr>";

            echo "<td>" . $report['Job_Type'] . "</td>";
            echo "<td>" . $report['Address'] . "</td>";
            echo "<td>" . $report['Vehicle_Number'] . "</td>";
            echo "<td>" . $report['Model'] . "</td>";
            echo "<td>" . $report['Make'] . "</td>";
            echo "<td>" . $report['Vehicle_Year'] . "</td>";
     }
        echo "</table>";
}           
?>
