<?php

use PHPUnit\Framework\TestCase;

/**
 * Contact Form Validation Tests
 * @ticket SCRUM-29
 */
class ContactFormTest extends TestCase
{
    protected function setUp(): void
    {
        // Reset global variables before each test
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_POST = [];
    }

    /**
     * @ticket SCRUM-29
     * Test 1: Successful form submission with all valid fields
     */
    public function testValidFormSubmission()
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST = [
            'contact_submit' => true,
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'message' => 'Hello there!'
        ];
        
        ob_start();
        include __DIR__ . '/../index.php';
        ob_end_clean();

        global $contact_success;
        $this->assertEquals('Thank you for contacting us! We will get back to you shortly.', $contact_success);
    }

    /**
     * @ticket SCRUM-29
     * Test 2: Empty fields should NOT produce a success message
     */
    public function testEmptyFieldsValidation()
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST = [
            'contact_submit' => true,
            'name' => '',
            'email' => '',
            'message' => ''
        ];
        
        ob_start();
        include __DIR__ . '/../index.php';
        ob_end_clean();

        global $contact_success;
        $this->assertEmpty($contact_success, 'Success message should be empty if fields are missing');
    }

    /**
     * @ticket SCRUM-29
     * Test 3: Missing email should NOT produce a success message
     */
    public function testMissingEmailValidation()
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST = [
            'contact_submit' => true,
            'name' => 'Jane Doe',
            'email' => '',
            'message' => 'This is a message'
        ];
        
        ob_start();
        include __DIR__ . '/../index.php';
        ob_end_clean();

        global $contact_success;
        $this->assertEmpty($contact_success, 'Success message should be empty if email is missing');
    }

    /**
     * @ticket SCRUM-29
     * Test 4: Missing name should NOT produce a success message
     */
    public function testMissingNameValidation()
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST = [
            'contact_submit' => true,
            'name' => '',
            'email' => 'test@example.com',
            'message' => 'This is a message'
        ];
        
        ob_start();
        include __DIR__ . '/../index.php';
        ob_end_clean();

        global $contact_success;
        $this->assertEmpty($contact_success, 'Success message should be empty if name is missing');
    }

    /**
     * @ticket SCRUM-29
     * Test 5: Missing message should NOT produce a success message
     */
    public function testMissingMessageValidation()
    {
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST = [
            'contact_submit' => true,
            'name' => 'Jane Doe',
            'email' => 'jane@example.com',
            'message' => ''
        ];
        
        ob_start();
        include __DIR__ . '/../index.php';
        ob_end_clean();

        global $contact_success;
        $this->assertEmpty($contact_success, 'Success message should be empty if message is missing');
    }

    /**
     * @ticket SCRUM-29
     * Test 6: GET request should NOT trigger form processing
     */
    public function testGetRequestDoesNotProcess()
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_POST = [];

        ob_start();
        include __DIR__ . '/../index.php';
        ob_end_clean();

        global $contact_success;
        $this->assertEmpty($contact_success, 'GET request should not produce success message');
    }
}
