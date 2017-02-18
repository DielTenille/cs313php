<?php
/**
 * Created by PhpStorm.
 * User: t2alaska
 * Date: 2/4/2017
 * Time: 10:21 PM
 */
require "dbConnection.php";
$db = get_db();
error_reporting(E_ALL);
ini_set('display_errors', true);
?>
<?php
$chname = $chdesc = $minAge = $avgtimehr = $avgtimemin = $renum = $retime = "";
$chnameErr = $minAgeErr = $avgtimehrErr = $avgtimeminErr = $renumErr = $retimeErr = "";

if($chnameErr == "" && $minAgeErr == "" ){
    if (isset($_POST['add_chore'])) {
         if(empty($_POST["chore_name"])){
                $chnameErr = "Chore name is required";
            }
            else{
                $chname = $_POST["chore_name"];
            }
        if(empty($_POST["min_age"])){
                $minAgeErr = "Minimum Age is required";
            }
            else{
                $minAge = $_POST["min_age"];
            }
        $chdesc = $_POST['chore_desc'];
        $avgtimehr = $_POST['hours'];
        $avgtimemin = $_POST['minutes'];
        $renum = $_POST['numTime'];
        $retime = $_POST['timeType'];

        $chores = $db->query(
            "SELECT chorename
                    FROM chore 
                    WHERE chorename = '$chname'"
        )->fetchAll();

        if(!$chores) {
                $db->exec("INSERT INTO chore (choreid, chorename, choredesc, minage, avgtimehr, avgtimemin, recurrencenum, recurrencetimeid) 
                          VALUES (DEFAULT, 
                         '$chname', 
                         '$chdesc', 
                          $minAge, 
                          $avgtimehr, 
                          $avgtimemin, 
                          $renum, 
                          $retime)");
            header("Location: masterChoreList.php");
        }
    }
}

?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Chore Assigner | New Chore</title>
    <link rel="stylesheet" type="text/css" href="../css/homepage-css.css">
</head>
<body>
<div>
    <header>
        <h1>Chore Assigner Application</h1>
        <hr>
        <nav>
            <ul>
                <li><a href="choreAssignerHome.php">Chore Assigner Home</a></li>
                <li><a href="masterChoreList.php">Master Chore List</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <article>
            <section class="post-content">
                <h2>Welcome to the Chore Assigner Application</h2>
                <hr>
                <br/>
                <h3>New Chore Form</h3>
                <form method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>  >

                    <label>Chore Name:
                        <input type="text" name="chore_name"><span class="error">*<?= $chnameErr;?></span>
                    </label>
                    <br>
                    <label>Chore Description:
                        <input type="text" name="chore_desc">
                    </label>
                    <br>
                    <label>Recommended Minimum Age:
                        <input type="text" name="min_age"><span class="error">*<?= $minAgeErr;?></span>
                    </label>
                    <br>
                    <label>Average Time to Complete:</label>
                        <select name="hours">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select> hours
                    <select name="minutes" >
                        <option value="0">0</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="25">25</option>
                        <option value="30">30</option>
                        <option value="35">35</option>
                        <option value="40">40</option>
                        <option value="45">45</option>
                        <option value="50">50</option>
                        <option value="55">55</option>
                    </select> minutes
                    <br>
                    <label>Recommended Recurrence:
                        <select name="numTime">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                        <select name="timeType">
                            <?php
                            $statement = $db->prepare("SELECT * FROM recurrence");
                            $statement->execute();
                            while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                            {
                                echo '<option value="' . $row['recurrenceid'] . '">' . $row['recurrencename'] . '</option>';
                            }
                            ?>
                        </select>
                    </label>
                    <br><br>
                    <button id="submit" class="button" name="add_chore" type="submit">Submit</button>
                </form>

            </section>
        </article>
    </main>
</div>

</body>
</html>
