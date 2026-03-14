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
        $visitorId = auth()->id();

        // Always visible to the owner
        if ($visitorId === $ownerId)
            return true;
        $settings = service('settings');

        $visibility = $settings->get('UserSettings.profileVisibility', 'user:' . $ownerId);

        return match ($visibility) {
            'public' => true,
            'private' => false, // Only owner (handled above)
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