<?php

use App\Models\FollowerModel;
// app/Helpers/user_settings_helper.php

/**
 * Helper function to check if a user's profile is visible to the current visitor
 * @param int $ownerId The ID of the profile owner
 * @return bool True if the profile is visible, owner, or Admin otherwise false
 * 
 */
if (!function_exists('user_settings')) {
    function is_profile_visible(int $ownerId): bool
    {
        $visitorId = auth()->id() ?? null;// Get the current visitor's user ID (null if not logged in)
        // Check if the visitor or Admin
        if (auth()->loggedIn()){
            $visitorisAdmin = auth()->user()->inGroup('admin');// Check if User is part of admin group
        } else {
            $visitorisAdmin = false;
        }
        

        // Always visible to the owner or admin
        if ($visitorId === $ownerId || $visitorisAdmin)
            return true;

        $settings = service('settings');
        // Get the profile visibility setting for the owner, defaulting to 'user:{ownerId}' if not set
        $visibility = $settings->get('UserSettings.profileVisibility', 'user:' . $ownerId);

        // echo "Is Profile Visibility: $visibility, Visitor ID: $visitorId, Owner ID: $ownerId, Is Admin: " . ($visitorisAdmin ? 'Yes' : 'No') . "\n";
        // exit;

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

        $isFollowing = model(FollowerModel::class)->isFollowing($visitorId, $ownerId, true);

        // echo "Checking friendship: Visitor ID = $visitorId, Owner ID = $ownerId, Is Following = " . ($isFollowing ? 'Yes' : 'No') . "\n";
        // exit;

        if ($isFollowing) {
            return true;
        }
        return false;
    }
}