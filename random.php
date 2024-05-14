<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['lowerBound']) && isset($_POST['upperBound'])) {
        $lower = intval($_POST['lowerBound']);
        $upper = intval($_POST['upperBound']);
        if ( $lower < $upper ) {
            echo rand($lower, $upper);
        } else {
            echo "Error: Lower bound must be less than upper bound.";
        }
    } else {
        echo "Error: Both bounds must be provided.";
    }
} else {
    echo "Error: No data submitted.";
}

?>

