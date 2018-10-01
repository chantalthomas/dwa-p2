<?php

session_start();

if(isset($_SESSION['results'])){
    $results = $_SESSION['results'];

    $feet = $results['feet'];
    $inches = $results['inches'];
    $weight = $results['weight'];
    $age = $results['age'];
    $gender = $results['gender'];
    $exerciseAmount = $results['exerciseAmount'];
}

session_unset();