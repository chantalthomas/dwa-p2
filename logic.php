<?php

session_start();

$hasErrors = false;

if (isset($_SESSION['results'])) {
    $results = $_SESSION['results'];

    $feet = $results['feet'];
    $inches = $results['inches'];
    $weight = $results['weight'];
    $age = $results['age'];
    $gender = $results['gender'];
    $exerciseAmount = $results['exerciseAmount'];
    $caloricIntake = $results['caloricIntake'];
    $errors = $results['errors'];
    $hasErrors = $results['hasErrors'];
}

session_unset();