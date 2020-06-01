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
           'role-list','role-create','role-edit','role-delete',
           'user-list','user-create','user-edit','user-delete',
           'category-list','category-create','category-edit','category-delete',
           'company-list','company-create','company-edit','company-delete',
           'product-list','product-create','product-edit','product-delete',
           'client-list','client-create','client-edit','client-delete',
           'supplier-list','supplier-create','supplier-edit','supplier-delete',
           'stock-list','stock-create','stock-edit','stock-delete',
           'sale-bills-list','sale-bills-create','sale-bills-edit','sale-bills-delete',
           'purchase-bills-list','purchase-bills-create','purchase-bills-edit','purchase-bills-delete',
           'search','pdf','excel',
        ];


        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}
