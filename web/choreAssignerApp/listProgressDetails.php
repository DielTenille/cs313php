<?php
/**
 * Created by PhpStorm.
 * User: t2alaska
 * Date: 2/4/2017
 * Time: 10:50 PM
 */
require "dbConnection.php";
$db = get_db();
$listID = $_GET['listid'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Chore Assigner | Chore List Progress</title>
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
                <h2>Chore List Progress</h2>
                <hr>
                <h3>Chore List Name</h3>
                <label>List Status:
                <select>
                    <?php
                    $statement = $db->prepare("SELECT statusname FROM status");
                    $statement->execute();
                    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                    {
                        echo '<option>' . $row['statusname'] . '</option>';

                    }

                    ?>
                </select>
                </label>
                <table class="all-results">
                    <thead>
                    <tr>
                        <th>Chore ID</th>
                        <th>Chore Name</th>
                        <th>Description</th>
                        <th>Minimum Age</th>
                        <th>Average Time</th>
                        <th>Recurrence</th>
                        <th>Completed</th>
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
                            ' ' . $row['recurrencetimeid'] . '</td><td>' . '<input type="checkbox" >' .'</td>';
                        echo '</tr>';

                    }

                    ?>
                    </tbody>
                </table>
                <br>
                <button id="save" class="button">Save Progress</button>
                <button id="list_complete" class="button">Mark Complete</button>

                <h3>List Members</h3> <!-- Need to eventually add the child's name to the chore list above-->
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
            </section>
        </article>
    </main>
</div>

</body>
</html>
