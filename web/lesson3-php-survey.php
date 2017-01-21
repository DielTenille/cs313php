<?php
session_start();

//survey variables
$name = $email = $color = $animal = $numChild = $degree = $comment = "";

//error variables
$nameErr = $emailErr = $colorErr = $animalErr = $numChildErr = $degreeErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST["name"])) {
        $nameErr = "Name is Required";
    } else {
        $name = formatInput($_POST["name"]);
    }
    
    if(empty($_POST["email"])) {
        $emailErr = "Email is Required";
    } else {
        $email = formatInput($_POST["email"]);
    }
    
    if(empty($_POST["color"])) {
        $colorErr = "Color is Required";
    } else {
        $color = formatInput($_POST["color"]);
    }
    
    if(empty($_POST["animal"])) {
        $animalErr = "Animal is Required";
    } else {
        $animal = formatInput($_POST["animal"]);
    }
    
    if(empty($_POST["children"])) {
        $numChildErr = "Number of children is Required";
    } else {
        $numChild = formatInput($_POST["children"]);
    }
    
    if(empty($_POST["degree"])) {
        $degreeErr = "Degree is Required";
    } else {
        $degree = formatInput($_POST["degree"]);
    }
    
    $comment = formatInput($_POST["comment"]);
    
     if($nameErr == "" && $emailErr == "" && $colorErr == "" && $animalErr == "" && $numChildErr == "" && $degreeErr == ""){
        $myfile = fopen("survey-results.txt", "a") or die("Unable to open file!");
        $txt = "$name\n$email\n$color\n$animal\n$numChild\n$degree\n$comment\n";
        fwrite($myfile, $txt);
        fclose($myfile);
         
        $_SESSION["surveyCompleted"] = "true";
          var_dump($name, $email, $color, $animal, $numChild, $degree, $comment);
    
        if($_SESSION["surveyCompleted"]){
                header('Location: my-survey-results.php');
                exit(); // for security
            }
     }
}

function formatInput($data) {
  $data = trim($data);
  $data = htmlspecialchars($data);
  return $data;
}    
?>


<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tenille | PHP Survey</title>
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
                <h2>Lesson 3: PHP Survey</h2>
                <hr id="survey-hr">
                <br>
                <form method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>  >

                    <label>Name: </label>
                    <input type="text" name="name"><span class="error"> * <?php echo $nameErr;?></span>
                    <br>
                    <label>E-mail: </label>
                    <input type="text" name="email"><span class="error"> * <?php echo $emailErr;?></span>
                    <br><br>

                    <label>1- What is your favorite color?</label><span class="error"> * <?php echo $colorErr;?></span>
                    <br>
                    <input type="radio" name="color" value="Red">Red
                    <br>
                    <input type="radio" name="color" value="Yellow">Yellow
                    <br>
                    <input type="radio" name="color" value="Blue">Blue
                    <br>
                    <input type="radio" name="color" value="Green">Green
                    <br>
                    <input type="radio" name="color" value="Pink">Pink
                    <br>
                    <input type="radio" name="color" value="Other">Other
                    <br><br>

                    <label>2- What is your favorite animal?</label><span class="error"> * <?php echo $animalErr;?></span>
                    <br>
                    <input type="radio" name="animal" value="Dog">Dog
                    <br>
                    <input type="radio" name="animal" value="Cat">Cat
                    <br>
                    <input type="radio" name="animal" value="Bird">Bird
                    <br>
                    <input type="radio" name="animal" value="Bird">Horse
                    <br>
                    <input type="radio" name="animal" value="Horse">Other
                    <br><br>

                    <label>3- How many children do you have?</label><span class="error"> * <?php echo $numChildErr;?></span>
                    <br>
                    <input type="radio" name="children" value="None">None
                    <br>
                    <input type="radio" name="children" value="1">1
                    <br>
                    <input type="radio" name="children" value="2">2
                    <br>
                    <input type="radio" name="children" value="3">3
                    <br>
                    <input type="radio" name="children" value="4">4
                    <br>
                    <input type="radio" name="children" value="5">5
                    <br>
                    <input type="radio" name="children" value="6">6
                    <br>
                    <input type="radio" name="children" value="7">7 or more
                    <br><br>

                    <label>4- What college degree are you working towards or completed?</label><span class="error"> * <?php echo $degreeErr;?></span>
                    <br>
                    <input type="radio" name="degree" value="Cerificate">Certificate
                    <br>
                    <input type="radio" name="degree" value="Associates">Associates
                    <br>
                    <input type="radio" name="degree" value="Bachelors">Bachelors
                    <br>
                    <input type="radio" name="degree" value="Masters">Masters
                    <br>
                    <input type="radio" name="degree" value="Doctorate">Doctorate
                    <br>
                    <input type="radio" name="degree" value="None">None
                    <br><br>
                    
                    <label>5- How did you hear about this survey?</label>
                    <br>
                    <textarea name="comment" rows="10" cols="60"></textarea>
                    <br>

                    <button class="button" type="submit">Submit Survey</button>
                    <br>
                    <a class="button" href="my-survey-results.php">See Results Now!</a>

                </form>
            </article>
        </main>
    </div>
</body>

</html>