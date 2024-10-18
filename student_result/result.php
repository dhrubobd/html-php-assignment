<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Result</title>
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
            background: linear-gradient(to right bottom, #850c0c, #990b1d, #ad0a2e, #c10c40, #d41155);
        }
        .error{
            color: red;
            font-weight: bold;
        }
        .success{
            color:forestgreen;
            font-weight: bold;
            font-size: large;
        }
    </style>
</head>
<body>
    <div id="result-area">
        <div id="result-card">
            <?php
                function calculateResult($markBangla,$markEnglish,$markMath,$markScience,$markHistory){
                    $totalMarks = $markBangla + $markEnglish + $markMath + $markScience + $markHistory;
                    echo "Total Marks: ".$totalMarks."<br>";
                    $avgMarks = $totalMarks/5;
                    echo "Average Marks: ".$avgMarks."<br>";
                    echo "Grade: ";
                    switch ($avgMarks) {
                        case ($avgMarks>=80):
                            echo "A+";
                            break;
                        case ($avgMarks>=70):
                            echo "A";
                            break;
                        case ($avgMarks>=60):
                            echo "A-";
                            break;
                        case ($avgMarks>=50):
                            echo "B";
                            break;
                        case ($avgMarks>=40):
                            echo "C";
                            break;
                        case ($avgMarks>=33):
                            echo "D";
                            break;
                        default:
                            echo "F";
                            break;
                    }
                }
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $markBangla = $_POST['bangla'];
                    $markEnglish = $_POST['english'];
                    $markMath = $_POST['math'];
                    $markScience = $_POST['science'];
                    $markHistory = $_POST['history'];

                    if(empty($markBangla)||empty($markEnglish)||empty($markMath)||empty($markScience)||empty($markHistory)){
                
            ?>
                        <h2 class="error">Empty Marks Submitted!!!</h2>
            <?php
                    }else if((is_numeric($markBangla)!=1)||(is_numeric($markEnglish)!=1)||(is_numeric($markMath)!=1)||(is_numeric($markScience)!=1)||(is_numeric($markHistory)!=1)){
            ?>
                        <h2 class="error">Invalid Marks!!!</h2>
            <?php
                    }else{
                        if(($markBangla<0) || ($markBangla>100) || ($markEnglish<0) || ($markEnglish>100) || ($markMath<0) || ($markMath>100) || ($markScience<0) || ($markScience>100) || ($markHistory<0) || ($markHistory>100)){
            ?>
                            <h2 class="error">Marks should be between 0 to 100.</h2>
            <?php
                        }else{
                            if(($markBangla<33)||($markEnglish<33)||($markMath<33)||($markScience<33)||($markHistory<33)){
            ?>
                            <h1 class="error">Result: FAIL</h1>
            <?php                    
                            }else{
            ?>
                                <div class="success">
                                    <?php calculateResult($markBangla,$markEnglish,$markMath,$markScience,$markHistory);?>
                                </div>            
            <?php
                            }
                        }
                    }

               }else{
            ?>
            <h1>Please Input Marks</h1>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                <div id="result-form">
                    <div class="form-cols">
                        <label for="Bangla">Bangla</label>
                        <input type="text" name="bangla" id="" placeholder="Numbers Only">
                    </div>
                    <div class="form-cols">
                        <label for="English">English</label>
                        <input type="text" name="english" id="" placeholder="Numbers Only">
                    </div>
                    <div class="form-cols">
                        <label for="Math">Math</label>
                        <input type="text" name="math" id="" placeholder="Numbers Only">
                    </div>
                    <div class="form-cols">
                        <label for="Science">Science</label>
                        <input type="text" name="science" id="" placeholder="Numbers Only">
                    </div>
                    <div class="form-cols">
                        <label for="History">History</label>
                        <input type="text" name="history" id="" placeholder="Numbers Only">
                    </div>
                    <div class="form-cols">
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