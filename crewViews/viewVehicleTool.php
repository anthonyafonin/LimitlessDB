<html>

<head>
    <title>Maintenance Form</title>
    <link href="../inlineSiding.css" rel="stylesheet">
</head>

<body>
<div id = "center">
    <header>
            <h1> Limitless Database<h1>
    </header>
<center>
    <nav>
        <a href="crewViews.php">Back</a> &nbsp;
        <a href="../userManual.pdf" target="_blank">Help</a>  &nbsp; 
    </nav>
    <main>
        <form action="viewVehicleTool.php" method="post" class="infoinput">
            <h1>Vehicle/Tools
            <span>Displays Tools in a Vehicle</span>
            </h1>
<?php
//Includes command from outside page that connects to the database
include '../databaseServerInfo.php';

//Drop down of Vehicles updated from database
$dropQuery = "SELECT * FROM vehicle" ;
$result = mysqli_query($link, $dropQuery);
echo'<form class = "infoinput" action="viewVehicleTool.php" method="POST"><label><span>Vehicle*</span><select name="dropDown">
<option value=""> Select... </option>'; 

while($row = mysqli_fetch_assoc($result))    
{   
    $vehicNum=$row['Vehicle_Number'];
    echo '<option value="'. $vehicNum . '">' . $row['Make'] ." ". $row['Vehicle_Year'].'</option>'; 
}
?>            
        </select> </label><br>
        <input class="submit" type="submit" name ="submit" value="Search"/>
        </form>
        <a href="crewViews.php">Back</a><br><br>
            <table>
            <tr>            
            <th>Tool Name</th>
            <th>Manufacturer</th>
            <th>Condition</th>
            </tr>
        </form>
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
    $vehicQuery =  "SELECT * FROM tool WHERE('$dropValue' = tool.Location_ID)";          
    $sqlReport = mysqli_query($link,$vehicQuery);

    //Retrieves location and vehicle information and displays to user       
    while ($report = mysqli_fetch_array($sqlReport))
    {   
            echo "<tr>";
            echo "<td>" . $report['Tool_Name'] . "</td>";
            echo "<td>" . $report['Manufacturer'] . "</td>";
            echo "<td>" . $report['Quality'] . "</td>";       
            echo "<tr>";
     }
     echo "</table>";
}          
?>
