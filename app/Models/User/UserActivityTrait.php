<?php

namespace App\Model\Traits;

trait UserActivityTrait
{
    /**
     * Captures data before insertion.
     * $data contains 'data' (array of fields to be inserted).
     */
    protected function logBeforeInsert(array $data)
    {
        // Example: Add 'created_by' field automatically
        $data['data']['created_by'] = auth()->id();
        
        return $data;
    }

    /**
     * Captures data after insertion.
     * $data contains 'id' (new PK) and 'data' (inserted fields).
     */
    protected function logAfterInsert(array $data)
    {
        if ($data['result']) {
            // Logic for activity logging table
            $activityModel = model('ActivityLogModel');
            $activityModel->insert([
                'user_id'   => auth()->id(),
                'action'    => 'created_record',
                'table'     => $this->table,
                'record_id' => $data['id']
            ]);
        }

        return $data;
    }
}