<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Jobs\ProcessPodcast;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
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

    public function login()
    {
        dd('fdadf');
        App::make('test');
    }
}
