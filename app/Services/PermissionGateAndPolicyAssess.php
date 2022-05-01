<?php 

namespace App\Services;
use Illuminate\Support\Facades\Gate;
use App\Policies\ProductPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\SliderPolicy;
use App\Policies\SettingPolicy;
use App\Policies\BlogPolicy;
use App\Policies\OrderPolicy;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use App\Policies\CouponPolicy;
use App\Policies\ContactPolicy;

class PermissionGateAndPolicyAssess {

    public function setGateAndPolicyAssess(){

        $this->defineGateProduct();
        $this->defineGateCategory();
        $this->defineGateSlider();
        $this->defineGateSetting();
        $this->defineGateBlog();
        $this->defineGateOrder();
        $this->defineGateRole();
        $this->defineGateUser();
        $this->defineGateCoupon();
        $this->defineGateContact();

    }

    public function defineGateProduct() {

        Gate::define('product-view',[ProductPolicy::class,'viewAny']);
        Gate::define('product-create',[ProductPolicy::class,'create']);
        Gate::define('product-update',[ProductPolicy::class,'update']);
        Gate::define('product-delete',[ProductPolicy::class,'delete']);

    }

    public function defineGateCategory() {

        Gate::define('category-view',[CategoryPolicy::class,'viewAny']);
        Gate::define('category-create',[CategoryPolicy::class,'create']);
        Gate::define('category-update',[CategoryPolicy::class,'update']);
        Gate::define('category-delete',[CategoryPolicy::class,'delete']);

    }

    public function defineGateSlider() {

        Gate::define('slider-view',[SliderPolicy::class,'viewAny']);
        Gate::define('slider-create',[SliderPolicy::class,'create']);
        Gate::define('slider-update',[SliderPolicy::class,'update']);
        Gate::define('slider-delete',[SliderPolicy::class,'delete']);

    }

    public function defineGateSetting() {

        Gate::define('setting-view',[SettingPolicy::class,'viewAny']);
        Gate::define('setting-create',[SettingPolicy::class,'create']);
        Gate::define('setting-update',[SettingPolicy::class,'update']);
        Gate::define('setting-delete',[SettingPolicy::class,'delete']);

    }

    public function defineGateBlog() {

        Gate::define('blog-view',[BlogPolicy::class,'viewAny']);
        Gate::define('blog-create',[BlogPolicy::class,'create']);
        Gate::define('blog-update',[BlogPolicy::class,'update']);
        Gate::define('blog-delete',[BlogPolicy::class,'delete']);

    }

    public function defineGateOrder() {

        Gate::define('order-view',[OrderPolicy::class,'viewAny']);
        Gate::define('order-create',[OrderPolicy::class,'create']);
        Gate::define('order-update',[OrderPolicy::class,'update']);
        Gate::define('order-delete',[OrderPolicy::class,'delete']);

    }

    public function defineGateRole() {

        Gate::define('role-view',[RolePolicy::class,'viewAny']);
        Gate::define('role-create',[RolePolicy::class,'create']);
        Gate::define('role-update',[RolePolicy::class,'update']);
        Gate::define('role-delete',[RolePolicy::class,'delete']);

    }

    public function defineGateUser() {

        Gate::define('user-view',[UserPolicy::class,'viewAny']);
        Gate::define('user-create',[UserPolicy::class,'create']);
        Gate::define('user-update',[UserPolicy::class,'update']);
        Gate::define('user-delete',[UserPolicy::class,'delete']);

    }

    public function defineGateCoupon() {

        Gate::define('coupon-view',[CouponPolicy::class,'viewAny']);
        Gate::define('coupon-create',[CouponPolicy::class,'create']);
        Gate::define('coupon-update',[CouponPolicy::class,'update']);
        Gate::define('coupon-delete',[CouponPolicy::class,'delete']);

    }

    public function defineGateContact() {

        Gate::define('contact-view',[ContactPolicy::class,'viewAny']);
        Gate::define('contact-delete',[ContactPolicy::class,'delete']);

    }

}