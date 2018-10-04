<?php
require 'helpers.php';
require 'Form.php';
require 'calculations.php';

#allows us to use class
use DWA\Form;

session_start();

#Instantiate objects
$form = new Form($_GET);

#Get data from form request
#Get data from form request
$feet = isset($_GET['feet']) ? $_GET['feet'] : '';
$inches = isset($_GET['inches']) ? $_GET['inches'] : '';
$weight = isset($_GET['weight']) ? $_GET['weight'] : '';
$age = isset($_GET['age']) ? $_GET['age'] : '';
$gender = isset($_GET['gender']) ? $_GET['gender'] : '';
$exerciseAmount = isset($_GET['exerciseAmount']) ? $_GET['exerciseAmount'] : '';

$errors = $form->validate([
    'feet' => 'required|digit',
    'inches' => 'required|numeric',
    'weight' => 'required|numeric',
    'age' => 'required|numeric',
    'gender' => 'required',
    'exerciseAmount' => 'required'
]);

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