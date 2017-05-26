<html>
    <head>
        <title>Warehouse Tools</title>
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
        <form class="infoinput" method="post" action="viewWarehouseTool.php" id="toolSearch">
        <h1>Tool Search
            <span>Search Warehouse for Tools</span>
        </h1>

        <label>
            <span>Tool Name </span>
            <input type="text" placeholder="Search Tool Name"name="tool"><br>
        </label>
        <label>
            <input class="submit" type="submit" name="search" value="Search">
        </label>
        </form>
            <a href="crewViews.php">Back</a><br><br>
            <table> 
            <tr>
            <th>Tool Name</th>
            <th>Manufacturer</th>
            <th>Condition</th>
            </tr>              
    </main>    
    </center>
</body>
</html>
<?php      

//Includes command from outside page that connects to the database
include '../databaseServerInfo.php';

//SQL SELECT * FROM location query stored in a variable
$toolQuery = "SELECT * FROM tool WHERE (tool.Location_ID = '6')";             
$sqlReport = mysqli_query($link,$toolQuery);

//If search button is pressed
if(isset($_POST['search']))
{
    
    //Takes search value and stores in a SELECT query variable
    $name = $_POST['tool'];
    $toolSearch = "SELECT * FROM tool WHERE (Tool_Name LIKE '%{$name}%') AND (tool.Location_ID = '6')";
    $result = mysqli_query($link, $toolSearch);
    
    //Searches Database for search value
    while($report = mysqli_fetch_array($result))            
    {
        //Stores desired result columns and value in variables
        $toolId = $report['Tool_Name'];
        $toolName = $report['Manufacturer'];
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
?>

