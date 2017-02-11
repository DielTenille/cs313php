<?php
/**
 * Created by PhpStorm.
 * User: t2alaska
 * Date: 2/4/2017
 * Time: 10:38 PM
 */
require "dbConnection.php";
$db = get_db();
//$userID = $_GET['id'];

if (isset($_POST['add_child'])) {
    $firstname = $_POST['child_first_name'];
    $lastname = $_POST['child_last_name'];
    $email = $_POST['email'];
    $userID = $_GET['id'];

    if ($firstname == '' || $lastname == '') {
        $formErrMsg = "Please fill out all fields.";
    } else {
        try {
            $userID = $_GET['id'];
            $db->exec("INSERT INTO child (childid, childfirstname, childlastname, childemail, fk_userid)
                    VALUES 
                    (DEFAULT , 
                    '$firstname', 
                    '$lastname', 
                    '$email', 
                    $userID)");
            header("Location: userAccountDetails.php?id=$userID");
        }
        catch (PDOException $ex) {
            echo "Error connecting to DB. Details: $ex";
            die();
        }
    }

}

?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Chore Assigner | New Child</title>
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
                <h2>Add Child Form</h2>
                <hr>
                <?= $userID?>
                <br/>
                <p id="error"><?php if($formErrMsg != ''){echo $formErrMsg;}  ?></p>
                <form method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>  >
                    <div class="row">

                        <label class="chore-form-label"><span class="chore-form-span">First Name:</span>
                            <input class="chore-form-input" type="text" name="child_first_name">
                        </label>

                        <label class="chore-form-label"><span class="chore-form-span">Last Name:</span>
                            <input class="chore-form-input" type="text" name="child_last_name">
                        </label>

                        <label class="chore-form-label"><span class="chore-form-span">Email:</span>
                            <input class="chore-form-input" type="text" name="email">
                        </label>
                    </div>
                        <br>
                    <button id="submit" class="button" name= "add_child"  type="submit">Submit</button>
                </form>

            </section>
        </article>
    </main>
</div>

</body>
</html>
