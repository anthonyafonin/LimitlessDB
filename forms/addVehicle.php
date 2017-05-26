<html>
<head>
    <title>Vehicle Form</title>
    <link href="../inlineSiding.css" rel="stylesheet">
</head>
<body>
    <div id = "center">
    <header>
        <h1>Limitless Database<h1>
    </header>
    <center>
    <nav>
        <a href="../adminFrontPage.php">Home</a> &nbsp;                   
	    <a href="../userManual.pdf" target="_blank">Help</a>  &nbsp; 				
	</nav>
    <main>
        <form action="addVehicle.php" method="post" class="infoinput"/>       
            <h1>Vehicle Form
                <span>Enter Vehicle Info</span>
            </h1>
            <label>
                <span>Vehicle Model*</span>
                <input id="make" type="text" name="model" placeholder="Vehicle Model (Required)" />
            </label>
            <label>
                <span>Vehicle Make*</span>
                <input id="make" type="text" name="make" placeholder="Vehicle Make (Required)" />
            </label>
            <label>
                <span>Year*</span>
                <input id="year" type="text" name="Vehicle_Year" placeholder="Year (Required)" />
            </label>   
            <label>
                 <br>
                <input class="submit" type = "submit" name="submit" value="Submit" /> 
            </label>    
                
        </form>
        <a href="forms.php">Back</a> &nbsp; 
    </main>
    </center>
    </div>
</body>
</html>
<?php    

//Includes command from outside page that connects to the database
include '../databaseServerInfo.php';
        
//Checks when submit button is clicked
if (isset($_POST['submit']))
{
    //When submit is pressed, takes the user input values and stores in variables
    $model = $_POST['model'];
    $make = $_POST['make'];
    $year = $_POST['Vehicle_Year'];
        
    //Variable with an INSERT SQL command that adds Make Model and Year attribute values into Vehicle
    $vehicleSql = "INSERT INTO vehicle (Model, Make, Vehicle_Year) VALUES ('$model', '$make', $year)" ;
        
    //If NO, Selects the last PK Vehicle Number FROM Vehicle and stores in vehnum variable
    $vehnum = mysqli_query($link,"SELECT Vehicle_Number FROM vehicle ORDER BY Vehicle_Number DESC LIMIT 1");

    //Inserts the SELECT query into an Array Fetch
    while ($row = mysqli_fetch_array($vehnum))
    {
        //Stores last available row of Vehicle Number from previous Array and adds 1 for next FK value
        $vehNumLast = $row['Vehicle_Number'];
        $location = "Vehicle";
        $vehNum = $vehNumLast + 1;      
    }

    //Runs INSERT query of Vehicle Number FK to location table         
    $locationSql = "INSERT INTO location (Location, Vehicle_Number) VALUES ('$location', '$vehNum')";                                
          
            
    //If vehicle INSERT query runs without error
    if (mysqli_query($link,$vehicleSql))
    {
        //Then location INSERT query runs
        if (mysqli_query($link,$locationSql))
        {
            //Successful submition Alert
            echo '<script type="text/javascript">alert("Submit Success");</script>';
        }       
    }
    
    else  
    {
        //Alert of "Invalid Input"
        die ('<script type="text/javascript">alert("Invalid Input");</script>');
    }
}
   
?>

