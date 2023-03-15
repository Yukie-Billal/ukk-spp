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
        
        Gate::define('IsAdmin', function (Petugas $petugas)
        {
            return $petugas->role->nama_role == 'admin';
        });
        Gate::define('IsPetugas', function (Petugas $petugas)
        {
            return $petugas->role->nama_role == 'petugas';
        });
        // Gate::define('IsOperator', function (Petugas $petugas)
        // {
        //     return $petugas->role->nama_role == 'petugas' || $petugas->role->nama_role == 'admin';
        // });
        Gate::define('IsSiswa', function ()
        {
            // Auth::guard('siswa')->user()->role->nama_role;
        });
    }
}
