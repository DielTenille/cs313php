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
                <li><a href="childrenList.php">Children</a></li>
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
                <br>
                <button id="new_User" class="button">Add User</button>
                <table class="all-results">
                    <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                <?php
                $statement = $db->prepare("SELECT appuserid, appusername, firstname, lastname, email FROM appuser");
                $statement->execute();

                while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                {
                    echo '<tr>';
                    echo '<td>' . $row['appuserid'] . '</td><td>' . $row['appusername'] . '</td><td>' .  $row['firstname'] . '</td><td>' . $row['lastname'] . '</td><td>' . $row['email'] . '</td>';
                    echo '</tr>';
                }

                ?>
                    </tbody>
                </table>

            </section>
        </article>
    </main>
</div>

</body>
</html>
