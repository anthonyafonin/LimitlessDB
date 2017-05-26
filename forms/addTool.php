<html>
    
    <head>
        <title>Tool Report</title>
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
        <form action="" method="post" class="infoinput">        
            <h1>Tool Form
                <span>Enter Tool Information</span>
            </h1>             
            <label>
                <span>Tool Name*</span>
                <input type="text" name="Tool_Name" placeholder="Tool Name (Required)"/>
            </label>
            <label>
                <span>Manufacturer</span>
                <input type="text"  name="Manufacturer" placeholder="Manufacturer"/>
            </label>
            <label>
                <span>Condition*</span>
                <input type="text" name="Quality" placeholder="Condition (Required)"/>
            </label>                               
<?php
//Inlcudes command from outside page that connects to the database
include '../databaseServerInfo.php';

//Displays retrieved data of vehicles and vehicle number is store in a variable
$dropQuery = "SELECT * FROM vehicle" ;
$result = mysqli_query($link, $dropQuery);
echo'<form action="viewVehicleTool.php" method="POST">
     <label><span>Vehicle </span>
     <select name="dropDown">
     <option value=""> Select... </option>'; 

//Displays Model and Make of year with Vehicle Number as the Value in a drop down menu
while($row = mysqli_fetch_assoc($result))    
{   
    $vehicNum=$row['Vehicle_Number'];
    echo '<option value="'. $vehicNum . '">' . $row['Make'] ." ". $row['Vehicle_Year'].'</option>'; 
}

?>
                </select>
            </label>
            <label>
                <span>To Warehouse</span>
                <div id ="check">
                <input type="checkbox" name="Warehouse" value="Yes"/>
                </div>
            </label>
            <br><input class = "submit" type="submit" name ="submit" value="Submit"/></label>
        </form>
        <a href="forms.php">Back</a> &nbsp; 
    </main>      
    </center>
    </div>
</body>
</html>     
    
<?php      
            
//If Submit button is pressed           
if (isset($_POST['submit']))
{
    //Takes Vehicle Number value of dropdown and stores in a variable
    if (isset($_POST['dropDown']))
    {
        $dropValue = $_POST['dropDown'];
    }
    
    //Initializes variables taken from values user entered in html form
    $toolName = $_POST['Tool_Name'];
    $toolManufacturer = $_POST['Manufacturer'];
    $toolQuality = $_POST['Quality'];
    
    if(isset($_POST['Warehouse']) && $_POST['Warehouse'] == 'Yes')
    {    
        //If YES, INSERTS "6" (Warehouse) Value to tool Location ID. There is a fixed warehouse number
        $dropValue = "6";     
    }       
    
    //Inserts values with SQL command
    $toolSql = "INSERT INTO tool (Tool_Name, Manufacturer, Quality, Location_ID)
        VALUES ('$toolName', '$toolManufacturer', '$toolQuality', $dropValue)";
        //Check if "Send To Warehouse" Box is clicked

    //Displays error message if invalid input
    if (!mysqli_query($link,$toolSql))
    {
        //Alert of "Invalid Input"
        die ('<script type="text/javascript">alert("Invalid Input");</script>');
    }
       
    //Popup alert of submit success
    echo '<script type="text/javascript">alert("Submit Success");</script>';

}
?>
