<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Jobs\ProcessPodcast;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function showLoginForm()
    {
        $user = $this->user->find(1);

        ProcessPodcast::dispatch($user);
    }

    public function login(Request $request)
    {
        $rules = [
            'username'   => 'require',
            'password' => 'required|string|min:6|max:20',
        ];
        $params = $this->validate($request, $rules);
        return ($token = Auth::guard('admin')->attempt($params))
            ? response(['token' => 'bearer ' . $token], 201)
            : response(['error' => '账号或密码错误'], 400);
    }
}
