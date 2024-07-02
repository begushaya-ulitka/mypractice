<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CabinetController extends Controller
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * @param UserService
     */
    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function showPage(Request $request) {
        $user = $this->userService->getById(Auth::id());
        return view('cabinet', ['user' => $user]);
    }

    public function editName(Request $request) {
        if (!$request->name) {
            return redirect(route('cabinet'))->withErrors([
                'errors' => 'Ошибка при заполнении поля «Имя»' 
            ]);
        }

        $this->userService->updateName(Auth::id(), $request->name);
        return back()->with('success', 'Имя успешно изменено');
    }
}
