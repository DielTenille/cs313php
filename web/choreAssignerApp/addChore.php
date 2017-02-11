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
$chname = $chdesc = $min = $avgtimehr = $avgtimemin = $renum = $retime = $inserted = "";
$chnameErr = $minErr = $avgtimehrErr = $avgtimeminErr = $renumErr = $retimeErr = "";

if($chnameErr == "" && $minErr == "" ){
    if (isset($_POST['add_chore'])) {
        if($_POST['form'] == 'chore_form') {
            if(empty($_POST["chore_name"])){
                $chnameErr = "Chore name is required";
            }
            else{
                $chname = $_POST["chore_name"];
            }
            if(empty($_POST["min_age"])){
                $minErr = "Minimum Age is required";
            }
            else{
                $min = $_POST["min_age"];
            }
        }
        $chores = $db->query(
            "SELECT chorename
                    FROM chore 
                    WHERE chorename = '$chname'"
        )->fetchAll();

        if(!$chores) {
                $db->exec("INSERT INTO chore (chorename, choredesc, minage, avgtimehr, avgtimemin, recurrencenum, recurrencetimeid) VALUES 
                   (DEFAULT, '$chname', $chdesc, $min, $avgtimehr, $avgtimemin, $renum, $retime");
            header("Location: masterChoreList.php");
//                $inserted = 'The chore has been added.';
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
                <br>
                <p><span><?=$inserted;?></span></p>
                <form method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>  >
                    <input type="hidden" name="form" value="chore_form" />
                    <label>Chore Name:
                        <input type="text" name="chore_name" value="<?=$chname;?>"><span class="error">*<?= $chnameErr;?></span>
                    </label>
                    <br>
                    <label>Chore Description:
                        <input type="text" name="chore_desc" value="<?=$chdesc;?>">
                    </label>
                    <br>
                    <label>Recommended Minimum Age:
                        <input type="text" name="min_age" value="<?=$min;?>"><span class="error">*<?= $minErr;?></span>
                    </label>
                    <br>
                    <label>Average Time to Complete:</label>
                        <input type="text" name="hours" value="<?=$avgtimehr;?>"> hours
                        <input type="text" name="minutes" value="<?=$avgtimemin;?>"> minutes
                    <br>
                    <label>Recommended Recurrence:
                        <select id="numTime">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                        </select>
                        <select id="timeType">
                            <?php
                            $statement = $db->prepare("SELECT * FROM recurrence");
                            $statement->execute();
                            while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                            {
                                echo '<option>' . $row['recurrencename'] . '</option>';

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
