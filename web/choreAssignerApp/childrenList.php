<?php
/**
 * Created by PhpStorm.
 * User: t2alaska
 * Date: 2/4/2017
 * Time: 8:31 PM
 */
require "dbConnection.php";
$db = get_db();

?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Chore Assigner | Children</title>
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
                <h2>List of Children</h2>
                <hr>
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
