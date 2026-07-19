<?php

namespace App\Entities;

use App\Models\NoteModel;
use App\Models\ShareModel;
use CodeIgniter\Entity\Entity;

/**
 * User Note Entity
 * 
 * This class create and entity for the notes table 
 * 
 * @package    App\Entities
 * @author     Andrew Nite <ngendesign@email.com.com>
 * @copyright  2026 N-Gen Design <https://ngendesign.com>
 * @license    https://opensource.org MIT License
 * @link       https://github.com/n-genesis/ngen-kumbuka-ci
 * 
 */
class Note extends Entity
{
    protected $datamap = [];
    protected $dates   = ['updated_at', 'deleted_at'];
    protected $casts   = [];

    public function getCreatedAt(): string
    {
        // Access the raw datetime string from the database row
        $rawDate = $this->attributes['created_at'];
        // 1. Convert the raw database value to a Time instance
        $time = $this->mutateDate($rawDate);

        // 2. Format it using PHP's date format characters:
        // 'M' = Short month (Feb)
        // 'jS' = Day without leading zero + ordinal suffix (3rd)
        // 'Y' = 4-digit year (2025)
        return $time->format('M jS, Y');
    }

    /**
     * Get a count of how many Shares a Note entry has
     * NOTE: Not the best to place is here. But I thought I'd do a 
     * lil lazy loading and keep it seperated since it comes from
     * the Share table but has a relation to the Notes table
     * 
     * @return int|string
     */
    public function getShareHistory(){
        $noteModel = model(NoteModel::class);

        return $noteModel->getNoteSharesCount($this->attributes['id']);
    }

    public function hasUserShared($user_id){
        $sharedModel = model(ShareModel::class);
        return $sharedModel->hasShared($user_id,$this->attributes['id']);
    }

    public function getBodySummary(): string
    {
        helper('text'); // Ensure the helper is loaded
        $rawBody = $this->attributes['body'];

        // Truncate to 150 characters with a '...' suffix
        return character_limiter($rawBody, 150, '...');
    }

    public function getSticker(): string {
        $sticker = $this->attributes['sticker'];

        return $sticker ? $sticker : '57963244';
    }
}
