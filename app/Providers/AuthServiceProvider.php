<?php

namespace App\Providers;
use App\Policies\EmpleadoPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Empleado::class => EmpleadoPolicy::class,//se registra el EmpleadoPolicy que se creo por consola
    ];

    

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        // Gate::guessPolicyNamesUsing(function ($class) {
        // return 'App\\Policies\\' . class_basename ( $class).'Policy';
        // });

        $this->registerPolicies();

        //
    }
}
