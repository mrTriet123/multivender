<?php

namespace App\Providers;

use App\Role;
use App\User;
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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });


        // Auth gates for: User management
        Gate::define('cms_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: CmsPages
        Gate::define('page_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('page_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('page_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('page_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('page_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: CmsBanners
        Gate::define('banner_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('banner_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('banner_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('banner_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('banner_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: CmsFqas
        Gate::define('fqa_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('fqa_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('fqa_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('fqa_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('fqa_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: CmsTestimonials
        Gate::define('testimonial_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('testimonial_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('testimonial_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('testimonial_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('testimonial_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });


        // Auth gates for: Messaging Feature
        Gate::define('messages_feature_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Contact Messages
        Gate::define('contact_messages_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('contact_messages_show', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('contact_messages_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('contact_messages_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Product management
        Gate::define('product_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Product Brands
        Gate::define('brand_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('brand_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('brand_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('brand_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('brand_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Catalog
        Gate::define('catalog', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: shops Management
        Gate::define('shop_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('shop_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('shop_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('shop_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('shop_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Products Management
        Gate::define('product_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('product_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('product_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('product_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('product_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Category Management
        Gate::define('category_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('category_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('category_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('category_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('category_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

    }
}
