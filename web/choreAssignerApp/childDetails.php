<?php
/**
 * Created by PhpStorm.
 * User: t2alaska
 * Date: 2/4/2017
 * Time: 10:36 PM
 */
require "dbConnection.php";
$db = get_db();

?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Chore Assigner | Child Details</title>
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
                <h2>Child Details</h2>
                <hr>
                <h3>Child First and Last Name</h3>

                <p>Parent First and Last Name</p>

                <h3>'Child's Name' Lists</h3>
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
            </section>
        </article>
    </main>
</div>

</body>
</html>
