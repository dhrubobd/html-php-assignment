<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Card</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            text-align: left;
            font-size: 16px;
            color: #000000;
            line-height: 25px;
            font-family: Arial, Helvetica, sans-serif
        }
        #result-area{
            display: flex;
            justify-content: center; /*Centering Horizentally*/
            align-items: center; /*Centering Vertically*/
            min-height: 100vh;
            background: linear-gradient(to right bottom, #051937, #004d7a, #008793, #00bf72, #a8eb12);
        }
        #result-card{
            max-width: 500px;
            min-height: 200px;
            padding: 30px 20px;
            background-color: aliceblue;
            border-radius: 20px;
        }
        #result-card h1{
            text-align: center;
            font-weight: normal;
            font-size: 25px;
            margin-bottom: 10px;
        }
        #result-form{
            display: flex;
            flex-wrap: wrap;
            align-content: space-between;
        }
        .form-cols{
            max-width: 230px;
            margin: 10px 10px;
        }
        label{
            font-weight: bold;
            line-height: 30px;
        }
        input{
            padding: 7px 10px;
            width: 90%;
            border: 1px solid gray;
            border-radius: 5px;
        }
        input:focus {
            background-color: #00bf72;
            color: aliceblue;
        }
        .radio-input{
            width: 20px;
        }
        #form-buttons{
            margin-top: 30px;
        }
        #form-buttons button{
            color: floralwhite;
            padding: 8px 30px;
            font-weight: 400;
            border: none;
            border-radius: 7px;
            cursor: pointer;
        }
        .submit{
            background: linear-gradient(to right bottom, #051937, #004d7a, #008793, #00bf72, #a8eb12);
        }
    </style>
</head>
<body>
    <div id="result-area">
        <div id="result-card">
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $resultRequest = htmlspecialchars($_POST['resultRequest']);
                }
                if (!empty($resultRequest)) {
            ?>
            Total Marks: 232 <br>
            Average Marks: 46.4 <br>
            Grade: C
            <?php
               }else{
            ?>
            <h1>Please Input Marks</h1>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                <div id="result-form">
                    <div class="form-cols">
                        <label for="Bangla">Bangla</label>
                        <input type="number" name="bangla" id="" placeholder="Numbers Only">
                    </div>
                    <div class="form-cols">
                        <label for="English">English</label>
                        <input type="number" name="english" id="" placeholder="Numbers Only">
                    </div>
                    <div class="form-cols">
                        <label for="Math">Math</label>
                        <input type="number" name="math" id="" placeholder="Numbers Only">
                    </div>
                    <div class="form-cols">
                        <label for="Science">Science</label>
                        <input type="number" name="science" id="" placeholder="Numbers Only">
                    </div>
                    <div class="form-cols">
                        <label for="History">History</label>
                        <input type="number" name="history" id="" placeholder="Numbers Only">
                    </div>
                    <div class="form-cols">
                        <input type="hidden" id="" name="resultRequest" value="yes">
                        <div id="form-buttons">
                            <button type="submit" class="submit">Show Result</button>
                        </div>
                    </div>
                </div>
            </form>
            <?php
               }
            ?>
        </div>
    </div>
</body>
</html>