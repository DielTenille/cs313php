<?php
/**
 * Created by PhpStorm.
 * User: t2alaska
 * Date: 2/4/2017
 * Time: 9:33 PM
 */
require "dbConnection.php";
$db = get_db();
$userID = $_GET['id'];

if (isset($_POST['add_list'])) {
    $newList = $_POST['list_name'];

    if ($newList == '') {
        $formErrMsg = "Please provide a list name.";
    } else {
        try {
            $db->exec("INSERT INTO list (listid, listname, datecreated, lastupdated, fk_userid, fk_statusid)
                    VALUES (DEFAULT , '$newList', CURRENT_DATE, CURRENT_DATE, '$userID', '1')");
            header("Location: userAccountDetails.php?id=$userID");
        } catch (PDOException $ex) {
            echo "Error connecting to DB. Details: $ex";
            die();
        }
    }
}
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Chore Assigner | Account Details</title>
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
                <h2>Account Details</h2>
                <hr>
                <?php
                $statement = $db->prepare("SELECT firstname, lastname FROM appuser WHERE appuserid = $userID");
                $statement->execute();
                $row = $statement->fetch(PDO::FETCH_ASSOC)
                ?>
                <h3><?= $row['firstname'] . ' ' . $row['lastname']?></h3>

                <h3>Children</h3>
                <table class="all-results">
                    <thead>
                    <tr>
                        <th>Child ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $statement = $db->prepare("SELECT * FROM child WHERE fk_userid = $userID");
                    $statement->execute();

                    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <tr>
                        <td> <?= $row['childid'] ?> </td>
                        <td> <?= $row['childfirstname'] ?> </td>
                        <td> <?= $row['childlastname'] ?> </td>
                        <td> <?= $row['childemail'] ?> </td>
                        <td><button id="edit_Child" onclick="window.location='editChild.php?childid=<?= $row['childid'] ?>&id=<?= $userID ?>'">Edit Child</button></td>
                    </tr>
                        <?php
                    }
                    ?>

                    </tbody>
                </table>
                <br>
                <button id="new_Child" class="button"  onclick="window.location='addChild.php?id=<?= $userID ?>'">Add Child</button>

                <h3>Chore Lists</h3>
                <table class="all-results">
                    <thead>
                    <tr>
                        <th>List ID</th>
                        <th>List Name</th>
                        <th>Status</th>
                        <th>Date Created</th>
                        <th>Date Completed</th>
                        <th>Last Updated</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $statement = $db->prepare("SELECT * FROM list WHERE fk_userid = $userID");
                    $statement->execute();

                    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <tr>
                            <td> <?= $row['listid'] ?> </td>
                            <td> <?= $row['listname'] ?> </td>
                            <td> <?=  $row['fk_statusid'] ?> </td>
                            <td> <?= $row['datecreated'] ?> </td>
                            <td> <?= $row['datecompleted'] ?> </td>
                            <td> <?= $row['lastupdated'] ?> </td>
                        <td><button id="view_list" onclick="window.location='listProgressDetails.php?listid=<?= $row['listid'] ?>'">Edit List</button></td>
                        </tr>
                    <?php
                    }

                    ?>
                    </tbody>
                </table>
                <br>
                <p id="error"><?php if($formErrMsg != ''){echo $formErrMsg;}  ?></p>
                <form method="POST" action="#" >
                    <input type="text" name="list_name">
                    <button id="add_List" class="button" name="add_list">Add List</button>
                </form>


            </section>
        </article>
    </main>
</div>

</body>
</html>
