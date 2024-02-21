<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">
    <style>
        /* Use flexbox to align radio button and label horizontally */
        .radio-container {
            display: flex;
            align-items: center;
            margin-bottom: 5px; /* Optional: Add margin for spacing */
        }

        /* Adjust styles for radio button */
        input[type="radio"] {
            margin-right: 5px; /* Optional: Add space between radio button and label */
        }

        /* Additional styles for the label */
        label {
            margin-top:10px;
            /* Additional label styles can be applied here */
        }

    </style>
</head>
<body>
    <div class="radio-container">
        <input type="radio" id="option1" name="radioGroup">
        <label for="option1">Option 1</label>
    </div>
    <div class="radio-container">
        <input type="radio" id="option2" name="radioGroup">
        <label for="option2">Option 2</label>
    </div>
</body>
</html>