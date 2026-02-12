<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class SseFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // app/Filters/SseFilter.php or your SSE Controller
        $session = \Config\Services::session();

        // 1. Turn off output buffering at the PHP level
        while (ob_get_level() > 0) {
            ob_end_clean();
        }

        // 2. Set required headers for a persistent stream
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Connection: keep-alive');
        header('X-Accel-Buffering: no'); 

        // 3. We check if a session is active before closing to avoid errors.
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_write_close(); // Prevent session blocking
        }

        // Crucial: Release the lock so AJAX requests can proceed
        $session->close(); 

    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}

