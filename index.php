<?php
#require 'helpers.php';
#require 'logic.php';
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <title>Chantal Thomas</title>
    <meta charset="utf-8">
    <link href='css/normalize.css' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href='css/styles.css' rel='stylesheet'>

</head>
<body>
<div class='container'>
    <h1>Caloric Calculator</h1>
    <form action='toKilograms.php' method='get' class='inputContainer'>
        <fieldset>
            <legend>Height</legend>
            <label>
                <input type='number' name='feet'>
                <input type='number' name='inches'>
            </label>
        </fieldset>
        <fieldset>
            <legend>Weight</legend>
            <label>
                <input type='number' name='weight'>
            </label>
        </fieldset>
        <fieldset>
            <legend>Age</legend>
            <label>
                <input type='number' name='age'>
            </label>
        </fieldset>
        <fieldset>
            <legend>Gender</legend>
            <input type='radio' name='gender' id='female' value='female'>
            <label for='female'>Female</label><br/>
            <input type='radio' name='gender' id='male' value='male'>
            <label for='male'>Male</label><br/>
        </fieldset>
        <fieldset>
            <legend>Fitness Level</legend>
            <label>
                <select name="exerciseAmount">
                    <option value='none'>None</option>
                    <option value='slightly'>Slightly</option>
                    <option value='moderate'>Moderate</option>
                    <option value='active'>Active</option>
                    <option value='veryActive'>Very Active</option>
                </select>
            </label>
        </fieldset>
        <input type="submit" class='submitButton' value='Submit'>
    </form>
</div>
</body>
</html>
