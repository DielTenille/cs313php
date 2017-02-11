<?php
/**
 * Created by PhpStorm.
 * User: t2alaska
 * Date: 2/4/2017
 * Time: 9:40 AM
 */

require "dbConnection.php";
$db = get_db();

?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Chore Assigner | Home</title>
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
                <h3>Current Users</h3>

                <table class="all-results">
                    <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>View</th>
                    </tr>
                    </thead>
                    <tbody>
                <?php
                $statement = $db->prepare("SELECT appuserid, appusername, firstname, lastname, email 
                                           FROM appuser 
                                           ORDER BY appuserid");
                $statement->execute();

                while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                ?>
                <tr>
                    <td> <?= $row['appuserid'] ?> </td>
                    <td> <?= $row['appusername'] ?></td>
                    <td> <?= $row['firstname'] ?> </td>
                    <td> <?= $row['lastname'] ?></td>
                    <td> <?= $row['email'] ?> </td>
                    <td><button onclick="window.location='userAccountDetails.php?id=<?= $row['appuserid'] ?>'">View</button></td>
                </tr>
                <?php
                }

                ?>
                    </tbody>
                </table>
                <button id="new_User" class="button" onclick="window.location='addUser.php'">Add User</button>
            </section>
        </article>
    </main>
</div>

</body>
</html>
