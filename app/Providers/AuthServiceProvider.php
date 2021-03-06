<?php

namespace App\Providers;

use App\Modules\Admin\Course\Models\Course;
use App\Modules\Admin\Course\Policies\CoursePolicy;
use App\Modules\Admin\Material\Policies\MaterialPolicy;
use App\Modules\Admin\Material\Models\Material;
use App\Modules\Admin\Methods\Models\Method;
use App\Modules\Admin\Methods\Policies\MethodPolicy;
use App\Modules\Admin\Role\Models\Role;
use App\Modules\Admin\Role\Policies\RolePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Role::class => RolePolicy::class,
        Course::class => CoursePolicy::class,
        Material::class => MaterialPolicy::class,
        Method::class => MethodPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
