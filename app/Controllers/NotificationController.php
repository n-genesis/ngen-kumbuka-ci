<?php

namespace App\Controllers;

use App\Controllers\UserController;
use App\Models\NotificationModel;
use CodeIgniter\HTTP\ResponseInterface;

class NotificationController extends UserController
{

    protected $notificationModel;

    public function __construct()
    {
        $this->notificationModel = model(NotificationModel::class);
        session_write_close();
    }
    public function index()
    {
        //
    }

    public function stream()
    {
        // Close the session to prevent session locking
        session_write_close();

        // Set necessary headers for SSE
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');
        header('Connection: keep-alive');

        // Get the current user ID from Parent (UserController)
        $userId = $this->userId;

        while (true) {
            // Check for unread notifications in the database
            $notification = $this->notificationModel
                ->where('actor_id', $userId)
                ->where('is_read', 0)
                ->first();

            if ($notification) {
                // Send the notification data as a JSON string
                echo "data: " . json_encode($notification) . "\n\n";

                // Mark the notification as read to prevent duplicate alerts
                //$this->notificationModel->update($notification->id, ['is_read' => 1]);
            }

            // Flush the output buffer
            if (ob_get_level() > 0)
                ob_flush();
            flush();

            // Wait 3 seconds before the next check to manage server load
            sleep(3);
        }
    }

    // app/Controllers/NotificationController.php

public function stream_two()
{
    $userId = auth()->id(); // Get current logged-in user ID
    if (!$userId) return;

    set_time_limit(0); 
    $this->response->setHeader('Content-Type', 'text/event-stream');
    $this->response->setHeader('Cache-Control', 'no-cache');

    $db = \Config\Database::connect();
    
    // Start checking from current time
    $lastCheck = date('Y-m-d H:i:s');

    while (true) {
        // Query only new notifications for this user
        $notifications = $db->table('notifications')
            ->where('actor_id', $userId)
            ->where('created_at >', $lastCheck)
            ->get()
            ->getResult();

        if (!empty($notifications)) {
            foreach ($notifications as $note) {
                echo "data: " . json_encode($note) . "\n\n";
            }
            // Update the pointer to the latest notification's time
            $lastCheck = date('Y-m-d H:i:s');
        } else {
            // Keep-alive: send an empty comment every 30s to prevent timeout
            echo ": heartbeat\n\n";
        }

        ob_flush();
        flush();
        
        sleep(5); // Wait 5 seconds before next DB poll
    }
}


    // app/Controllers/Notifications.php
    public function getUnreadCount()
    {
        $count = $this->notificationModel->where('recipient_id', session()->get('user_id'))
            ->where('is_read', 0)
            ->countAllResults();

        return $this->response->setJSON(['unread_count' => $count]);
    }
    
}
