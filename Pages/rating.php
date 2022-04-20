<?php
session_start();
$connect = mysqli_connect('localhost', 'root', '', 'hexa_pc_building');
if (isset($_POST['btnSend'])) {
    if (!isset($_SESSION['UserID'])) {
        echo "<script>   
                alert('Please Login');
                window.location.assign('login.php');
            </script>";
    } else {
        $rating = $_POST['txtradio'];
        $question = $_POST['txtquestion'];
        $userid = $_SESSION['UserID'];
        $run = mysqli_query($connect, "INSERT INTO `Rating`(`RatingID`, `UserID`, `Rating`, `RatingText`) VALUES (NULL,'$userid','$rating','$question')");
        if ($run) {
            echo "<script>
            alert('Thank you for your feedback :)');
            window.location.assign('index.php');
        </script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Support</title>
    <style>
        .container {
            margin-bottom: 10rem;
        }

        footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }

        .support-wrap {
            margin-top: 6rem;
        }

        .support-body {
            display: flex;
            flex-direction: column;
            width: 50%;
            margin: 0 auto;
        }

        textarea {
            resize: none;
            padding: 0;
            border: none;
            background-color: #eeeeee;
            border-radius: 10px;
        }

        #rate,
        .question {
            margin-top: 0.5rem;
        }

        .rate-div {
            margin-top: 1rem;
        }

        label {
            font-size: 1.2rem;
        }

        textarea {
            width: 100%;
            font-size: 1.1rem;
            padding: 0.4rem;
        }

        button {
            margin-top: 0.8rem;
            width: 100%;
            padding: 1rem;
            cursor: pointer;
            border: none;
            background-color: #0080ff;
            color: white;
            font-size: 1.1rem;
            border-radius: 10px;
        }

        h2 {
            color: #0080ff;
            font-size: 1.6rem;
        }

        @media (max-width: 856px) {
            .support-wrap {
                margin-top: 3rem;
            }
        }

        @media (max-width: 658px) {
            .support-body {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        include 'header.php';
        ?>

        <div class="support-wrap">
            <div class="support-body">
                <h2>Please Rate Us</h2>
                <form method="post">
                    <label for="rate">Please Rate Our Services</label>
                    <div class="rating-div" id="rate">
                        <input type="radio" name="txtradio" id="1" value="1" required>
                        <label for="1">1</label>
                        <input type="radio" name="txtradio" id="2" value="2" required>
                        <label for="2">2</label>
                        <input type="radio" name="txtradio" id="3" value="3" required>
                        <label for="3">3</label>
                        <input type="radio" name="txtradio" id="4" value="4" required>
                        <label for="4">4</label>
                        <input type="radio" name="txtradio" id="5" value="5" required>
                        <label for="5">5</label>
                    </div>

                    <div class="rate-div">
                        <label for="rate" class="rate-label">Reason for your rating (optional)</label>
                        <div class="question">
                            <textarea name="txtquestion" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>

                    <button type="submit" name="btnSend">Send</button>
                </form>
            </div>
        </div>

    </div>

    <?php
    include("footer.php");
    ?>
</body>

</html>