<html>

<head>
    <title>Maintenance Form</title>
    <link href="../inlineSiding.css" rel="stylesheet">
</head>

<body>
    <div id="center">
        <header>
            <h1> Limitless Database<h1>
	</header>
    <center>
        <nav>
            <a href="../adminFrontPage.php">Home</a> &nbsp;
			<a href="../userManual.pdf" target="_blank">Help</a>  &nbsp;                   		 	
	   </nav>
        <main>
            <h1>Employees</h1>
            <table>
                <tr>
                    <th>Employee ID</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Phone Number</th>
                    <th>Job Title</th>
                    <th style='text-align:right'>Date Hired</th>
                    <th style='text-align:right'>Wage /Hr</th>
                    <th style='text-align:right'>Vehicle</th>
                </tr>
        </main>

<?php      
//Includes command from outside page that connects to the database
include '../databaseServerInfo.php';
        
//SQL SELECT * FROM location query stored in a variable
$empQuery = "SELECT * FROM employee LEFT JOIN location ON(location.Location_ID = employee.Vehicle_Number)";             
$sqlReport = mysqli_query($link,$empQuery);

//Retrieves location and vehicle information and displays to user       
while ($report = mysqli_fetch_array($sqlReport))
{        
        echo "<tr>";
        
        echo "<td>" . $report['Employee_ID'] . "</td>";
        echo "<td>" . $report['First_Name'] . "</td>";
        echo "<td>" . $report['Middle_Name'] . "</td>";
        echo "<td>" . $report['Last_Name'] . "</td>";
        echo "<td>" . $report['Phone_Number'] . "</td>";
        echo "<td>" . $report['Job_Title'] . "</td>";
        echo "<td style='text-align:right'>" . $report['Date_of_Hire'] . "</td>";
        echo "<td style='text-align:right'>$" . $report['Wage'] . "</td>";
        echo "<td style='text-align:right'>" . $report['Vehicle_Number'] . "</td>";
 }
        echo "</table>";
        echo '<br><a href="adminViews.php">Back</a></center></body></html>';      
?>