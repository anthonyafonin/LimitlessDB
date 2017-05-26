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
        <a href="../adminFrontPage.php">Home</a> &nbsp;
        <a href="../userManual.pdf" target="_blank">Help</a>  &nbsp; 
    </nav>
    <main>
        <h1>Maintenance Log</h1>
        
            <table>
                  <tr>
                  <th>Tool</th>
                  <th>Manufacturer</th>                  
                  <th>Quality</th>
                  <th>Description</th>
                  <th style='text-align:right'>Date In</th>
                  <th style='text-align:right'>Date Out</th>
                  </tr>
    </main> 
    </center>
</body>
    
</html>

<?php      
//Includes command from outside page that connects to the database
include '../databaseServerInfo.php'; 
        
//SQL SELECT * FROM location query stored in a variable
$maintQuery = "SELECT * FROM maintenance LEFT JOIN tool ON(maintenance.Tool_Number = tool.Tool_Number)";             
$sqlReport = mysqli_query($link,$maintQuery);

//Retrieves location and vehicle information and displays to user       
while ($report = mysqli_fetch_array($sqlReport))
{        
        echo "<tr>";
        
        echo "<td>" . $report['Tool_Name'] . "</td>";
        echo "<td>" . $report['Manufacturer'] . "</td>";
        echo "<td>" . $report['Quality'] . "</td>";
        echo "<td>" . $report['Description'] . "</td>";
        echo "<td style='text-align:right'>" . $report['Date_In'] . "</td>";
        echo "<td style='text-align:right'>" . $report['Date_Out'] . "</td>";

 }
    echo '</table><br><a href="adminViews.php">Back</a> ';
  
?>
