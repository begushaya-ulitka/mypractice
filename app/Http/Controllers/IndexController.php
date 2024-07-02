<?php

namespace App\Http\Controllers;

use App\Constants\Role;
use App\Services\RoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    /**
     * @var RoleService
     */
    protected $roleService;

    /**
     * @param RoleService
     */
    public function __construct(RoleService $roleService) {
        $this->roleService = $roleService;
    }

    public function showPage(Request $request) {
        return view('index');
    }
}
