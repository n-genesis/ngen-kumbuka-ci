<?php
// app/Helpers/user_settings_helper.php

/**
 * Helper function to check if a user's profile is visible to the current visitor
 * @param int $ownerId The ID of the profile owner
 * @return bool True if the profile is visible, false otherwise
 * 
 */
if (!function_exists('user_settings')) {
    function is_profile_visible(int $ownerId): bool
    {
        $visitorId = auth()->id() ?? null;// Get the current visitor's user ID (null if not logged in)
        $visitorisAdmin = auth()->user()->inGroup('admin');// Check if User is part of admin group

        // Always visible to the owner or admin
        if ($visitorId === $ownerId || $visitorisAdmin)
            return true;
        $settings = service('settings');

        // Get the profile visibility setting for the owner, defaulting to 'user:{ownerId}' if not set
        $visibility = $settings->get('UserSettings.profileVisibility', 'user:' . $ownerId);

        return match ($visibility) {
            'public' => true,
            'private' => false, // Only owner or User in admin group (handled above)
            'friends' => check_friendship($ownerId, $visitorId),
            default => true,
        };
    }

    /**
     * Placeholder for your friendship logic
     * @param int $ownerId The ID of the profile owner
     * @param int|null $visitorId The ID of the visitor (null if not logged
     */
    function check_friendship($ownerId, $visitorId): bool
    {
        if (!$visitorId)
            return false;

        // Example: return model(FriendModel::class)->areFriends($ownerId, $visitorId);
        return false;
    }
}