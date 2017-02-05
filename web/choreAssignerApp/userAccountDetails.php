<?php
/**
 * Created by PhpStorm.
 * User: t2alaska
 * Date: 2/4/2017
 * Time: 9:33 PM
 */
require "dbConnection.php";
$db = get_db();

?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Chore Assigner | User Account</title>
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
                <h2>Account Details</h2>
                <hr>
                <h3>User First and Last Name</h3>

                <h3>Children</h3>
                <table class="all-results">
                    <thead>
                    <tr>
                        <th>Child ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $statement = $db->prepare("SELECT * FROM child");
                    $statement->execute();

                    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                    {
                        echo '<tr>';
                        echo '<td>' . $row['childid'] . '</td><td>' . $row['childfirstname'] . '</td><td>' .  $row['childlastname'] . '</td><td>' . $row['childemail'] . '</td>';
                        echo '</tr>';
                    }

                    ?>
                    </tbody>
                </table>
                <br>
                <button id="new_Child" class="button">Add Child</button>

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
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $statement = $db->prepare("SELECT * FROM child");
                    $statement->execute();

                    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                    {
                        echo '<tr>';
                        echo '<td>' . $row['childid'] . '</td><td>' . $row['childfirstname'] . '</td><td>' .  $row['childlastname'] . '</td><td>' . $row['childemail'] . '</td>';
                        echo '</tr>';
                    }

                    ?>
                    </tbody>
                </table>
                <br>
                <button id="new_List" class="button">Add List</button> <!-- Need to add some inputs for the user to add one from this page.-->

            </section>
        </article>
    </main>
</div>

</body>
</html>
