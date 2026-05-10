<?php

use PHPUnit\Framework\TestCase;

/**
 * Page Load and Availability Tests
 * @ticket SCRUM-30
 */
class PageLoadTest extends TestCase
{
    /**
     * @ticket SCRUM-30
     * Test 1: Page loads properly and returns HTML content (basic availability test)
     */
    public function testPageLoadsProperly()
    {
        // Reset server vars to simulate normal GET request
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_POST = [];

        ob_start();
        include __DIR__ . '/../index.php';
        $output = ob_get_clean();

        // Check if output is not empty
        $this->assertNotEmpty($output, 'Page should return content');
        
        // Basic availability check: HTML skeleton is present
        $this->assertStringContainsString('<!DOCTYPE html>', $output, 'Page should contain DOCTYPE');
        $this->assertStringContainsString('<html', $output, 'Page should contain html tag');
    }

    /**
     * @ticket SCRUM-30
     * Test 2: Verify page contains critical UI elements (brand name and contact form)
     */
    public function testPageContainsCriticalElements()
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_POST = [];

        ob_start();
        include __DIR__ . '/../index.php';
        $output = ob_get_clean();

        // Title and Hero Section check
        $this->assertStringContainsString('QuickPOS', $output, 'Page should contain the brand name QuickPOS');
        $this->assertStringContainsString('class="contact__form"', $output, 'Page should contain the contact form');
    }

    /**
     * @ticket SCRUM-30
     * Test 3: Verify page contains the navigation bar with expected links
     */
    public function testPageContainsNavigation()
    {
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $_POST = [];

        ob_start();
        include __DIR__ . '/../index.php';
        $output = ob_get_clean();

        $this->assertStringContainsString('navbar', $output, 'Page should contain a navigation bar');
        $this->assertStringContainsString('Features', $output, 'Page should contain Features nav link');
        $this->assertStringContainsString('Pricing', $output, 'Page should contain Pricing nav link');
    }
}
