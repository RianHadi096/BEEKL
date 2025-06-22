<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name','email','password','created_at','is_premium','avatar_frame','dark_mode', 'avatar'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = []; // You might want to add a beforeUpdate callback for password hashing too
    protected $afterUpdate    = [];
    protected $beforeFind     = []; // You can add a beforeFind callback if needed
    protected $afterFind      = ['processAvatarUrl'];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    /**
     * Automatically processes the avatar path into a full URL after finding user data.
     * This ensures consistency across the entire application.
     *
     * @param array $data The data returned from a find* method.
     */
    protected function processAvatarUrl(array $data): array
    {
        // If no data was found, just return the original data.
        if (empty($data['data'])) {
            return $data;
        }

        $defaultAvatar = 'https://storage.googleapis.com/a1aa/image/lnxD0awdWAcMn5tsFaLsLZJffEaEfpf09u-jKt82wBc.jpg';

        // Check if it's a single result (from find()) using the 'singleton' key
        if ($data['singleton'] === true) {
            $data['data']['avatar'] = !empty($data['data']['avatar']) ? base_url($data['data']['avatar']) : $defaultAvatar;
        } else {
            // It's multiple results (from findAll())
            foreach ($data['data'] as &$user) {
                if (is_array($user)) {
                    $user['avatar'] = !empty($user['avatar']) ? base_url($user['avatar']) : $defaultAvatar;
                }
            }
        }

        return $data;
    }
}
