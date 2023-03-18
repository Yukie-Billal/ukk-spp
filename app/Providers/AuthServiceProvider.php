<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Petugas;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();        
        Gate::define('IsAdmin', function ($auth)
        {
            if (Auth::guard('petugas')->check()) {
                return Auth::guard('petugas')->user()->role->nama_role == 'admin';
            } else {
                return $auth->role->nama_role == 'admin';
            }
        });
        Gate::define('IsPetugas', function ($auth)
        {
            if (Auth::guard('petugas')->check()) {
                return Auth::guard('petugas')->user()->role->nama_role == 'petugas';
            } else {
                $auth->role->nama_role == 'petugas';
            }
        });
        Gate::define('IsOperator', function ($auth)
        {
            if (Auth::guard('petugas')->check()) {
                return Auth::guard('petugas')->user()->role->nama_role == 'petugas' || Auth::guard('petugas')->user()->role->nama_role == 'admin';
            } else {
                $auth->role->nama_role == 'admin' || $auth->role->nama_role == 'petugas';
            }
        });
        Gate::define('IsSiswa', function ($auth)
        {
            if (Auth::guard('siswa')->check()) {
                return Auth::guard('siswa')->user()->role->nama_role == 'siswa';
            }
            $auth->role->nama_role == 'siswa';
        });
    }
}
