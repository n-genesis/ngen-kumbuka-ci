<?php

namespace App\Controllers\User;

use App\Controllers\UserController;
use App\Models\NotificationModel;
use CodeIgniter\API\ResponseTrait;

class Notification extends UserController
{
    use ResponseTrait; // Provides easy JSON response methods

    protected $notificationModel;

    public function __construct()
    {
        $this->notificationModel = model(NotificationModel::class);
        session_write_close();
    }
    public function index()
    {
        return $this->renderView('pages/user/notifications', [
            'appTitle' => setting('App.appName') . ' | Notifications',
            'pageHeader' => 'User Notifications',
            'breadcrumbLinks' => [
                ['label' => 'Home', 'url' => site_url('home')],
                ['label'=> 'User Profile','url'=> site_url(['user/profile','username' => $this->username])],
                ['label' => 'Notifications', 'url' => '']
            ],
            'notifications' => $this->notificationModel->getNotificationsByUserId($this->userId)->paginate(10),
            'pager' => $this->notificationModel->pager,
        ]);
    }


    // app/Controllers/Notifications.php
    public function getUnreadCount()
    {
        $count = $this->notificationModel->where('recipient_id', session()->get('user_id'))
            ->where('is_read', 0)
            ->countAllResults();

        return $this->response->setJSON(['unread_count' => $count]);
    }

    public function stream()
    {

        // Prevent script timeout for long connections
        set_time_limit(0);


        while (true) {

            // echo "data: " . json_encode([
            //     'source_type' => 'Share',
            //     'title' => 'Hello World',
            //     'message' => 'From Kumbuka',
            // ]) . "\n\n";

            // Fetch unread notifications for the logged-in user
            $notifications = $this->notificationModel->where('recipient_id', $this->userId)
                ->where('is_read', 0)
                ->findAll();
            $count = $this->notificationModel->getUnreadCountbyUserId($this->userId);
            $noticeCount = ['count' => $count];

            if (!empty($notifications)) {
                foreach ($notifications as $note) {
                    $note->count = $count;// Add count return data
                    echo "data: " . json_encode($note) . "\n\n";
                    // Mark as 'sent' or 'read' immediately to avoid duplicates in the next tick
                    // Or use a timestamp to only fetch notifications created AFTER the last loop
                    
                    # MOVED THESE OPERATIONS To MarkAsRead method for AJAX requests 
                    // Mark as read or handle state so it doesn't loop
                    //$this->notificationModel->update($note->id, ['is_read' => 1]);
                }
            } else {
                // Send a "ping" to keep the connection alive (prevents proxy timeouts)
                echo ": ping\n\n";
            }

            // Pushes output buffer to the client immediately
            if (ob_get_level() > 0) {
                ob_flush();
            }
            flush();

            // Check if client is still connected
            if (connection_aborted())
                break;
            // Sleep to prevent 100% CPU usage
            sleep(3); // Adjust polling interval
        }
        // This stops the script immediately, preventing any "After Filters" 
        // (like the toolbar) from ever running for this specific request.
        exit();
    }

    public function markAsRead()
    {
            // 1. Get JSON data as an associative array
            $json = $this->request->getJSON(true);
            $id = $json['id'] ?? null;

            if (!$id) {
                return $this->fail('Invalid notification ID', 400);
            }

            $model = $this->notificationModel;

            // 2. Perform the update
            $update = $model->where(['id' => $id, 'recipient_id'=> $this->userId])->set(['is_read' => 1])->update();
            if ($update) {
                return $this->respond([
                    'success' => true,
                    'message' => 'Notification marked as read',
                    'csrf_token' => csrf_hash() // Send the new token back!
                ]);
            }

        return $this->fail('Failed to update record', 500);
    }

}
