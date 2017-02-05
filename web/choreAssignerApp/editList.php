<?php
/**
 * Created by PhpStorm.
 * User: t2alaska
 * Date: 2/4/2017
 * Time: 10:49 PM
 */
require "dbConnection.php";
$db = get_db();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Chore Assigner | Edit Chore List</title>
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
                <h2>Edit Chore List</h2>
                <hr>
                <h3>Chore List Name</h3>
                <table class="all-results">
                    <thead>
                    <tr>
                        <th>Chore ID</th>
                        <th>Chore Name</th>
                        <th>Description</th>
                        <th>Minimum Age</th>
                        <th>Average Time</th>
                        <th>Recurrence</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $statement = $db->prepare("SELECT * FROM chore");
                    $statement->execute();

                    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                    {
                        echo '<tr>';
                        echo '<td>' . $row['choreid'] . '</td><td>' . $row['chorename'] . '</td><td>' .$row['choredesc'] . '</td><td>' .$row['minage'] .
                            '</td><td>' . $row['avgtimehr'] . ': ' . $row['avgtimemin'] . '</td><td>' .$row['recurrencenum'] .
                            ' ' . $row['recurrencetimeid'] . '</td>';
                        echo '</tr>';

                    }

                    ?>
                    </tbody>
                </table>
                <br>
                <button id="add_chore" class="button">Add Chore</button> <!-- Add input for new chore to be chosen from master list options-->
                <br>
                <h3>List Members</h3> <!-- Need to eventually add the child's name to the chore list above-->
                <table class="all-results">
                    <thead>
                    <tr>
                        <th>Child ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Completed</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $statement = $db->prepare("SELECT * FROM child");
                    $statement->execute();

                    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                    {
                        echo '<tr>';
                        echo '<td>' . $row['childid'] . '</td><td>' . $row['childfirstname'] . '</td><td>' .  $row['childlastname'] . '</td><td>' . $row['childemail'] . '</td><td>' . '<input type="checkbox" >' .'</td>';
                        echo '</tr>';
                    }

                    ?>
                    </tbody>
                </table>
                <button id="add_member" class="button">Add Member</button>
            </section>
        </article>
    </main>
</div>

</body>
</html>
