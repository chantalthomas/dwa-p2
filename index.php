<?php
require 'helpers.php';
require 'logic.php';

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class='col-md-4 col-md-offset-4 container'>
    <h1>Caloric Calculator</h1>
    <form action='calculateCaloricIntake.php' method='get' class='inputContainer'>
        <fieldset class='form-group'>
            <legend>Height</legend>
            <label>
                <input type='number' name='feet' value='<?php if (isset($feet)) echo $feet ?>'>
                <input type='number' name='inches' value='<?php if (isset($inches)) echo $inches ?>'>
            </label>
        </fieldset>
        <fieldset class='form-group'>
            <legend>Weight</legend>
            <label>
                <input type='number' name='weight' value='<?php if (isset($weight)) echo $weight ?>'>
            </label>
        </fieldset>
        <fieldset class='form-group'>
            <legend>Age</legend>
            <label>
                <input type='number' name='age' value='<?php if (isset($age)) echo $age ?>'>
            </label>
        </fieldset>
        <fieldset class='form-group'>
            <legend>Gender</legend>
            <input type='radio'
                   name='gender'
                   id='female'
                   value='female' <?php echo (isset($gender) && $gender == 'female') ? 'checked' : ''; ?>>
            <label for='female'>Female</label><br/>
            <input type='radio'
                   name='gender'
                   id='male'
                   value='male' <?php echo (isset($gender) && $gender == 'male') ? 'checked' : ''; ?>>
            <label for='male'>Male</label><br/>
        </fieldset>
        <fieldset class='form-group'>
            <legend>Fitness Level</legend>
            <label>
                <select name="exerciseAmount">
                    <option value='none' <?php echo (isset($exerciseAmount) && $exerciseAmount == 'none') ? 'selected' : ''; ?>>Little to No Exercise</option>
                    <option value='slightly' <?php echo (isset($exerciseAmount) && $exerciseAmount == 'slightly') ? 'selected' : ''; ?>>Slightly Active</option>
                    <option value='moderate' <?php echo (isset($exerciseAmount) && $exerciseAmount == 'moderate') ? 'selected' : ''; ?>>Moderately Active</option>
                    <option value='active' <?php echo (isset($exerciseAmount) && $exerciseAmount == 'active') ? 'selected' : ''; ?>>Active</option>
                    <option value='veryActive' <?php echo (isset($exerciseAmount) && $exerciseAmount == 'veryActive') ? 'selected' : ''; ?>>Very Active</option>
                </select>
            </label>
        </fieldset>
        <input type="submit" class='submitButton' name='submit' value='Submit'>

        <?php if ($hasErrors): ?>
            <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
            </ul>
        <?php endif ?>
    </form>
    <div class='outputContainer'>
        <?php if (!$hasErrors): ?>
            <?php if (isset($caloricIntake)): ?>
                Your caloric intake is: <?= round($caloricIntake, 0, PHP_ROUND_HALF_UP) ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
