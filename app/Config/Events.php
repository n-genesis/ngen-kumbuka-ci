<?php

namespace Config;

use App\Models\User\UserModel;
use CodeIgniter\Events\Events;
use CodeIgniter\Exceptions\FrameworkException;
use CodeIgniter\HotReloader\HotReloader;
use PHPUnit\Event\Event;

/*
 * --------------------------------------------------------------------
 * Application Events
 * --------------------------------------------------------------------
 * Events allow you to tap into the execution of the program without
 * modifying or extending core files. This file provides a central
 * location to define your events, though they can always be added
 * at run-time, also, if needed.
 *
 * You create code that can execute by subscribing to events with
 * the 'on()' method. This accepts any form of callable, including
 * Closures, that will be executed when the event is triggered.
 *
 * Example:
 *      Events::on('create', [$myInstance, 'myMethod']);
 */

Events::on('pre_system', static function (): void {
    if (ENVIRONMENT !== 'testing') {
        if (ini_get('zlib.output_compression')) {
            throw FrameworkException::forEnabledZlibOutputCompression();
        }

        while (ob_get_level() > 0) {
            ob_end_flush();
        }

        ob_start(static fn($buffer) => $buffer);
    }

    /*
     * --------------------------------------------------------------------
     * Debug Toolbar Listeners.
     * --------------------------------------------------------------------
     * If you delete, they will no longer be collected.
     */
    if (CI_DEBUG && !is_cli()) {
        Events::on('DBQuery', 'CodeIgniter\Debug\Toolbar\Collectors\Database::collect');
        service('toolbar')->respond();
        // Hot Reload route - for framework use on the hot reloader.
        if (ENVIRONMENT === 'development') {
            service('routes')->get('__hot-reload', static function (): void {
                (new HotReloader())->run();
            });
        }
    }

    /**
     * Activity Event Listener
     * 
     * TODO: Need to name this even better and create email templates
     */
    Events::on('onActivity', function ($actorId, $recipientId, $sourceId, $type) {
        if (ENVIRONMENT !== 'development') {
            
            // 1. Fetch User Data
            $userModel = model(UserModel::class);
            $recipient = $userModel->find($recipientId);
            $actor = $userModel->find($actorId);

            // 2. Define custom messages based on the action type
            $messages = [
                'post' => "{$actor->username} published a new note.",
                'comment' => "{$actor->username} commented on your note.",
                'share' => "{$actor->username} shared a note of yours."
            ];
            $body = $messages[$type] ?? "You have a new update.";

            // 3. Trigger External Notifications (Email/Push)
            // Email Notification
            $email = \Config\Services::email();
            $email->setTo($recipient->email);
            $email->setSubject('New Notification');
            $email->setMessage($body);
            $email->send();

            // 4. Trigger Real-Time Push (Pusher example)
            // $pusher = service('pusher'); // Assuming Pusher is configured as a service
            // $pusher->trigger("user-channel-{$recipientId}", 'new-notif', [
            //     'message' => $body,
            //     'url' => base_url("posts/view/{$sourceId}")
            // ]);
        }
    });

    Events::on('login', static function(){
        log_activity('User logged into acount','system','info');
    });
    Events::on('logout', static function(){
        log_activity('User has logged out of account','system','info'); 
    });

});
