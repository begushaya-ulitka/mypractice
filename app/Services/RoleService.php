<?php

namespace App\Services;

use App\Models\Role;
use App\Models\UserRole;

class RoleService {
    public function getById($id) {
        return Role::where('id', $id)->first();
    }

    public function getUserRoleByUserId($id) {
        return UserRole::where('user_id', $id)->first();
    }
}
