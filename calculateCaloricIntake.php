<?php
require 'helpers.php';
require 'Form.php';

#allows us to use class
use DWA\Form;

session_start();

#Instantiate objects
$form = new Form($_GET);

#Get data from form request
$feet = $_GET['feet'];
$inches = $_GET['inches'];
$weight = $_GET['weight'];
$age = $_GET['age'];
$gender = $_GET['gender'];
$exerciseAmount = $_GET['exerciseAmount'];

$errors = $form->validate([
    'feet' => 'required|digit',
    'inches' => 'required|numeric',
    'weight' => 'required|numeric',
    'age' => 'required|numeric',
    'gender' => 'required',
    'exerciseAmount' => 'required'
]);

#dump($errors);

if (!$form->hasErrors) {
#convert weight to kilograms
    function toKilograms($weight)
    {
        $weightResult = ($weight * 0.453592);

        return $weightResult;
    }

#convert height to centimeters
    function toCentimeters($feet, $inches)
    {
        $heightResult = (($feet * 12) + $inches) * 2.54;

        return $heightResult;
    }

#Mifflin Equation
    function mifflinEquation($weight, $feet, $inches, $age)
    {
        global $gender;
        global $exerciseAmount;
        #if the user is a woman
        if ($gender == 'female') {
            if ($exerciseAmount == 'none') {
                $caloricIntake = ((10 * toKilograms($weight)) + (6.25 * toCentimeters($feet, $inches)) - (5 * $age) - 161) * 1.2;

                return $caloricIntake;
            } else if ($exerciseAmount == 'slightly') {
                $caloricIntake = ((10 * toKilograms($weight)) + (6.25 * toCentimeters($feet, $inches)) - (5 * $age) - 161) * 1.375;

                return $caloricIntake;
            } else if ($exerciseAmount == 'moderate') {
                $caloricIntake = ((10 * toKilograms($weight)) + (6.25 * toCentimeters($feet, $inches)) - (5 * $age) - 161) * 1.55;

                return $caloricIntake;
            } else if ($exerciseAmount == 'active') {
                $caloricIntake = ((10 * toKilograms($weight)) + (6.25 * toCentimeters($feet, $inches)) - (5 * $age) - 161) * 1.725;

                return $caloricIntake;
            }
            if ($exerciseAmount == 'veryActive') {
                $caloricIntake = ((10 * toKilograms($weight)) + (6.25 * toCentimeters($feet, $inches)) - (5 * $age) - 161) * 1.9;

                return $caloricIntake;
            }
        } #if the user is a man
        else {
            if ($exerciseAmount == 'none') {
                $caloricIntake = ((10 * toKilograms($weight)) + (6.25 * toCentimeters($feet, $inches)) - (5 * $age) + 5) * 1.2;

                return $caloricIntake;
            } else if ($exerciseAmount == 'slightly') {
                $caloricIntake = ((10 * toKilograms($weight)) + (6.25 * toCentimeters($feet, $inches)) - (5 * $age) + 5) * 1.375;

                return $caloricIntake;
            } else if ($exerciseAmount == 'moderate') {
                $caloricIntake = ((10 * toKilograms($weight)) + (6.25 * toCentimeters($feet, $inches)) - (5 * $age) + 5) * 1.55;

                return $caloricIntake;
            } else if ($exerciseAmount == 'active') {
                $caloricIntake = ((10 * toKilograms($weight)) + (6.25 * toCentimeters($feet, $inches)) - (5 * $age) + 5) * 1.725;

                return $caloricIntake;
            } else if ($exerciseAmount == 'veryActive') {
                $caloricIntake = ((10 * toKilograms($weight)) + (6.25 * toCentimeters($feet, $inches)) - (5 * $age) + 5) * 1.9;

                return $caloricIntake;
            }
        }
    }
}
#storing data in the session
$_SESSION['results'] = [
    'errors' => $errors,
    'hasErrors' => $form->hasErrors,
    'feet' => $feet,
    'inches' => $inches,
    'weight' => $weight,
    'age' => $age,
    'gender' => $gender,
    'exerciseAmount' => $exerciseAmount,
    'caloricIntake' => mifflinEquation($weight, $feet, $inches, $age)
];

#Redirect
header('Location: index.php');

#echo mifflinEquation($weight, $feet, $inches, $age);



