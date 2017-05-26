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
        <form action="addMaint.php" class ="infoinput"method="post"/>
            <h1>Maintenance Form
                <span>Enter Maintenance Log</span>
            </h1>
            <label>
                <span>Description*</span>
                <input type="text" placeholder="Description (Required)" name="Description" />
            </label>

            <label>
                <span>Date In*</span>
                <input type="date" placeholder=name="Date_In" />
            </label>

            <label>
                <span>Date Out*</span>
                <input type="date" name="Date_Out" />
            </label>

            <label>
                <span>Tool ID*</span>
                <input type="number" placeholder="Tool ID (Required)" name="Tool_Number" min="1" />
            </label>

            <input class="submit" type="submit" name="submit" value="Submit" />
        </form>
            <a href="forms.php">Back</a>
            <br>
            <br>

        <form class="infoinput" method="post" action="addMaint.php" id="toolSearch">
            <h1>Tool Search
                <span>Use to get Tool ID</span>
            </h1>
            <label>
                <span>Tool Name </span>
                <input type="text" placeholder="Search Tool Name" name="tool">
            <br>
            <input class="submit" type="submit" name="search" value="Search">
            </label>
        </form>
        <table>
            <tr>
            <th>Tool ID</th>
            <th>Tool Name</th>
            <th>Tool Condition</th>
            </tr>
    </main>
    </div>
    </center>
</body>
</html>
<?php      
//Includes command from outside page that connects to the database
include '../databaseServerInfo.php';

//If search button is pressed
if(isset($_POST['search']))
{
    
    //Takes search value and stores in a SELECT query variable
    $name = $_POST['tool'];
    $toolSearch = "SELECT * FROM tool WHERE Tool_Name LIKE '%{$name}%'";
    $result = mysqli_query($link, $toolSearch);
    
    //Searches Database for search value
    while($report = mysqli_fetch_array($result))            
    {
        //Stores desired result columns and value in variables
        $toolId = $report['Tool_Number'];
        $toolName = $report['Tool_Name'];
        $toolQ = $report['Quality'];
            
        //Outputs search results
        echo "<tr>";
        echo "<td>" . $toolId . "</td>";
        echo "<td>" . $toolName . "</td>";
        echo "<td>" . $toolQ . "</td>";
        
    } 
    echo "</table>";
//ends program   
exit;
}

//If Submit button is pressed
if (isset($_POST['submit']))
{
    //Initializes variables taken from values user entered in html form
    $maintDesc = $_POST['Description'];
    $dateIn = $_POST['Date_In'];
    $dateOut = $_POST['Date_Out'];
    $toolNumber = $_POST['Tool_Number'];
        
    //Inserts values with SQL command
    $maintSql = "INSERT INTO maintenance (Description, Date_In, Date_Out, Tool_Number)
        VALUES ('$maintDesc', '$dateIn', '$dateOut', $toolNumber)";
        
    //Displays error message if invalid input
    if (!mysqli_query($link,$maintSql))
    {
        //Alert of "Invalid Input"
        die ('<script type="text/javascript">alert("Invalid Input");</script>');
    }
        
    //Popup alert of successful submition  
    echo '<script type="text/javascript">alert("Submit Success");</script>';

}
?>