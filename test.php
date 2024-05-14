<?php
use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    // Test with valid bounds
    public function testRandomNumberWithValidBounds()
    {
        $_SERVER["REQUEST_METHOD"] = "POST";
        $_POST['lowerBound'] = 1;
        $_POST['upperBound'] = 100;

        // Capture the output
        ob_start();
        include './random.php';
        $output = ob_get_clean();

        // Check if the output is a number within the given range
        $this->assertGreaterThanOrEqual(1, intval($output));
        $this->assertLessThanOrEqual(100, intval($output));
    }

    // Test with mismatched bounds
    public function testRandomNumberWithMissingBounds()
    {
        $_SERVER["REQUEST_METHOD"] = "POST";
        $_POST['lowerBound'] = 10;
        $_POST['upperBound'] = 1;

        ob_start();
        include './random.php';
        $output = ob_get_clean();

        $this->assertEquals("Error: Lower bound must be less than upper bound.\n", $output);
    }

    // Test with invalid method
    public function testRandomNumberWithInvalidMethod()
    {
        $_SERVER["REQUEST_METHOD"] = "GET";

        ob_start();
        include './random.php';
        $output = ob_get_clean();

        $this->assertEquals("Error: No data submitted.\n", $output);
    }
}
