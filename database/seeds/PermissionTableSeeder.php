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
           'client-list','client-create','client-edit','client-delete','client-search','client-pdf','client-excel',
           'suplier-list','suplier-create','suplier-edit','suplier-delete','suplier-search','suplier-pdf','suplier-excel',
        ];


        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
