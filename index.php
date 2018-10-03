<?php
require 'helpers.php';
require 'logic.php';

#allows us to use class
use DWA\Form;

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
    <form action='calculateCaloricIntake.php' method='get' class='inputContainer'>
        <fieldset>
            <legend>Height</legend>
            <label>
                <input type='number' name='feet' value='<?php if (isset($feet)) echo $feet ?>'>
                <input type='number' name='inches' value='<?php if (isset($inches)) echo $inches ?>'>
            </label>
        </fieldset>
        <fieldset>
            <legend>Weight</legend>
            <label>
                <input type='number' name='weight' value='<?php if (isset($weight)) echo $weight ?>'>
            </label>
        </fieldset>
        <fieldset>
            <legend>Age</legend>
            <label>
                <input type='number' name='age' value='<?php if (isset($age)) echo $age ?>'>
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
                    <option value='none'>Little to No Exercise</option>
                    <option value='slightly'>Slightly Active</option>
                    <option value='moderate'>Moderately Active</option>
                    <option value='active'>Active</option>
                    <option value='veryActive'>Very Active</option>
                </select>
            </label>
        </fieldset>
        <input type="submit" class='submitButton' name='submit' value='Submit'>

        <?php if ($hasErrors): ?>
            <?php foreach ($errors as $error): ?>
                <?= $error ?>
            <?php endforeach; ?>
        <?php endif ?>
    </form>
    <?php if (isset($caloricIntake)): ?>
        Your caloric intake is: <?= $caloricIntake ?>
    <?php endif; ?>
</div>
</body>
</html>
