<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [


            [
                'group_name' => 'contactus',
                'permissions' => [
                    // admin Permissions
                    'contactus.create',
                    'contactus.view',
                    'contactus.edit',
                    'contactus.delete',
                ]
            ],

            [
                'group_name' => 'berita',
                'permissions' => [
                    // berita Permissions
                    'berita.create',
                    'berita.view',
                    'berita.edit',
                    'berita.delete',
                ]
            ],

            [
                'group_name' => 'calendar',
                'permissions' => [
                    // calendar Permissions
                    'calendar.create',
                    'calendar.view',
                    'calendar.edit',
                    'calendar.delete',
                ]
            ],

            [
                'group_name' => 'proposal',
                'permissions' => [
                    // proposal Permissions
                    'proposal.create',
                    'proposal.view',
                    'proposal.edithima',
                    'proposal.editprodi',
                    'proposal.editfakultas',
                    'proposal.delete',
                ]
            ],

        ];


        // Create and Assign Permissions
        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                // Create Permission
                Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
            }
        }
    }
}
