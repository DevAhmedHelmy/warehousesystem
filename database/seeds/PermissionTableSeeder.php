<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list','role-create','role-edit','role-delete','role-search','role-pdf','role-excel',
           'user-list','user-create','user-edit','user-delete','user-search','user-pdf','user-excel',
           'category-list','category-create','category-edit','category-delete','category-search','category-pdf','category-excel',
           'company-list','company-create','company-edit','company-delete','company-search','company-pdf','company-excel',
           'product-list','product-create','product-edit','product-delete','product-search','product-pdf','product-excel',
           'ordinary-user-list','ordinary-user-create','ordinary-user-edit','ordinary-user-delete','ordinary-user-search','ordinary-user-pdf','ordinary-user-excel',
        ];


        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
