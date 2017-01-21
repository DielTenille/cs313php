<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Tenille | My PHP Survey Results</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/homepage-css.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster+Two" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond" rel="stylesheet">

</head>

<body>
    <div>
        <header>
            <h1><a href="index.php">Tenille Diel</a></h1>
            <hr>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="assignments.php">Assignments</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <article>
                <h2>Survey Results</h2>
                
                <table id="all-results">
                    <?php
                        $myfile = fopen("survey-results.txt", "r") or die("Unable to open file!");
                        while(!feof($myfile)){
                            $check = fgets($myfile);
                            if($check != ""){
                            echo "<tr><td>" . $check . "</td><td>" . fgets($myfile) . "</td><td>" . fgets($myfile) . "</td><td>" . fgets($myfile) . "</td><td>" . fgets($myfile) . "</td><td>" . fgets($myfile) . "</td><td>" . fgets($myfile) . "</td></tr>";
                            }
                        }
                        fclose($myfile); 
                    ?> 
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Color</th>
                            <th>Animal</th>
                            <th>Children</th>
                            <th>Degree</th>
                            <th>Comments</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?=$name ?></td>
                            <td><?=$email ?></td>
                            <td><?=$color ?></td>
                            <td><?=$animal ?></td>
                            <td><?=$numChild ?></td>
                            <td><?=$degree ?></td>
                            <td><?=$comment ?></td>
                        </tr>
                    </tbody>
                </table>

                <a class= "button" href="lesson3-php-survey.php">Back to Survey!</a>
            </article>
        </main>
    </div>
</body>


</html>