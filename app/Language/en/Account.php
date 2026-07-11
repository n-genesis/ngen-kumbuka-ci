<?php
declare(strict_types=1);

/**
 * Language file for Backend Pages
 * 
 * This file contains all the language strings used in the backend pages of the application.
 * It is organized into sections based on the different pages and components of the backend.
 */

return [
    // Account Pages Strings

    // Buttons
    'btn' => [
        'edit' => 'Edit',
        'post' => 'Post',
        'save' => 'Save Changes',
        'cancel' => 'Cancel',
        'delete' => 'Delete',
        'back' => 'Back',
    ],

    'update-notice' => 'If you change your email, remember the new one when you sign back in. If you use the forget and and a Magick-Link send to your email, it will be send to the updated email. Make sure you have access to that email account.',

    'update-password' => [
        'text-new-password' => 'Password must be at least 8 characters long and contain a mix of letters, numbers, and symbols.',
    ],

    // Delete Account
    'delete-account' => [
        'text' => 'Deleting your account is a permanent action and cannot be undone. If you are sure you want to delete your account, select the button below.',
        'notice' => 'This application does not store any digital personal information. To learn more please read the Privacy Policy for more information.',
        'btn' => 'I understand, delete my account',
    ]
];