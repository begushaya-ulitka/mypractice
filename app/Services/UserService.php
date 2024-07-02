<?php

namespace App\Services;

use App\Models\User;

class UserService {
    public function getById($id) {
        return User::where('id', $id)->first();
    }

    public function updateName($id, $name) {
        $user = $this->getById($id);

        if ($user) {
            $user->name = $name;
            $user->save();
        }
    }
}
