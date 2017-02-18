<?php
/**
 * Created by PhpStorm.
 * User: t2alaska
 * Date: 2/4/2017
 * Time: 10:49 PM
 */
require "dbConnection.php";
$db = get_db();
$listID = $_GET['id'];
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
                    $statement = $db->prepare("SELECT * FROM chore c INNER JOIN recurrence r ON (c.recurrencetimeid = r.recurrenceid)");
                    $statement->execute();

                    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                    {
                        echo '<tr>';
                        echo '<td>' . $row['choreid'] . '</td><td>' . $row['chorename'] . '</td><td>' .$row['choredesc'] . '</td><td>' .$row['minage'] .
                            '</td><td>' . $row['avgtimehr'] . ': ' . $row['avgtimemin'] . '</td><td>' .$row['recurrencenum'] .
                            ' ' . $row['recurrencename'] . '</td>';
                        echo '</tr>';

                    }

                    ?>
                    </tbody>

                </table>
                <form method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
                    <select class="dropdown" name="master_chore_list">
                        <?php
                        $statement = $db->prepare("SELECT * FROM chore");
                        $statement->execute();
                        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                        {
                            echo '<option value="' . $row['choreid'] . '">' . $row['chorename'] . '</option>';
                        }
                        ?>
                    </select>

                <button name="add_chore" type="submit" class="button">Add Chore</button> <!-- Add input for new chore to be chosen from master list options-->
                </form>
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
                <form method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
                    <select class="dropdown" name="child_list">
                        <?php
                        $statement = $db->prepare("SELECT childid, childfirstname, childlastname FROM child");
                        $statement->execute();
                        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                        {
                            echo '<option value="' . $row['childid'] . '">' . $row['childfirstname'] . ' ' . $row['childlastname'] . '</option>';
                        }
                        ?>
                    </select>

                    <button name="add_member" type="submit" class="button">Add Member</button>
                </form>
            </section>
        </article>
    </main>
</div>

</body>
</html>
