<?php
use PHPUnit\Framework\TestCase;

class DonThuocListTest extends TestCase {
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

    public function testGetDonThuocList(): void {
        // Call the function to test
        $result = getDonThuocList();

        // Assert that the result is an array
        $this->assertIsArray($result);

        // Assert that the array is not empty
        $this->assertNotEmpty($result);

        // Assert that each item in the array is an associative array with the expected keys
        foreach($result as $item) {
            $this->assertIsArray($item);
            $this->assertArrayHasKey('idDonThuoc', $item);
            $this->assertArrayHasKey('tenBenhNhan', $item);
            $this->assertArrayHasKey('TenDonThuoc', $item);
            $this->assertArrayHasKey('chuandoan', $item);
            $this->assertArrayHasKey('keluan', $item);
            $this->assertArrayHasKey('ngayKeDon', $item);
        }
    }
}
?>