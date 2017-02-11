<?php
/**
 * Created by PhpStorm.
 * User: t2alaska
 * Date: 2/8/2017
 * Time: 5:58 PM
 */
require "dbConnection.php";
$db = get_db();
$childID = $_GET['childid'];
$userID = $_GET['id'];

if (isset($_POST['edit_child'])) {
    $firstname = $_POST['child_firstname'];
    $lastname = $_POST['child_lastname'];
    $email = $_POST['email'];

    if ($firstname == '' || $lastname == ''|| $email == '') {
        $formErrMsg = "Please fill out all fields.";
    } else {

        $db->exec("UPDATE child SET childfirstname='$firstname', childlastname='$lastname', childemail='$email' WHERE childid=$childID");

        header("Location: userAccountDetails.php?id=$userID");
    }

}
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Chore Assigner | Edit Child</title>
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
                <p id="error"><?php if($formErrMsg != ''){echo $formErrMsg;}  ?></p>
                <br/>
                <?php
                $statement = $db->prepare("SELECT childfirstname, childlastname, childemail FROM child WHERE childid = $childID");
                $statement->execute();
                $row = $statement->fetch(PDO::FETCH_ASSOC)
                ?>
                <form class="chore-form" method="POST" action= "#" >
                    <div class="row">
                        <label><span class="chore-form-span">First Name:</span>
                        <input class="chore-form-input" type="text" name="child_firstname" value="<?= $row['childfirstname'] ?>">
                        </label>
                        <label><span class="chore-form-span">Last Name:</span>
                            <input class="chore-form-input" type="text" name="child_lastname" value="<?= $row['childlastname'] ?>">
                        </label>
                        <label><span class="chore-form-span">Email:</span>
                            <input class="chore-form-input" type="text" name="email" value="<?= $row['childemail'] ?>">
                        </label>
                    </div>




                    <br>
                    <button id="submit" class="button" name= "edit_child" type="submit">Submit</button>
                </form>

            </section>
        </article>
    </main>
</div>

</body>
</html>

