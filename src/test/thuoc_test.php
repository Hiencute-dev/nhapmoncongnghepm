<?php
use PHPUnit\Framework\TestCase;

class MedicationTest extends TestCase {
    private $conn;

    protected function setUp(): void {
        $this->conn = new mysqli("localhost", "root", "", "cnpm", "3306");
        if($this->conn->connect_errno) {
            echo "Failed to connect to MySQL: ".$this->conn->connect_error;
        }
    }

    protected function tearDown(): void {
        $this->conn->close();
    }

    public function testGetAvailableMedications(): void {
        // Call the function to test
        $result = getAvailableMedications($this->conn);

        // Assert that the result is an array
        $this->assertIsArray($result);

        // Assert that the array is not empty
        $this->assertNotEmpty($result);

        foreach($result as $item) {
            $this->assertIsArray($item);
            $this->assertArrayHasKey('idThuoc', $item);
            $this->assertArrayHasKey('tenThuoc', $item);
        }
    }
}
?>