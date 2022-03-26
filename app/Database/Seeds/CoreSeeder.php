<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;
use Myth\Auth\Password;



class CoreSeeder extends Seeder
{

    public $DATA_DUMMY_COUNT = 10;



    public function run()
    {

        $data['DATA_DUMMY_COUNT'] = $this->DATA_DUMMY_COUNT;

        // ------------------------------------------------------------------------
        // user
        // ------------------------------------------------------------------------
        $dataUser = [
            'fullname' => 'Administrator',
            'email'    => 'admin@admin.com',
            'username' => 'admin',
            'password_hash' => Password::hash('admin123'),
            'avatar' => 'avatar-1.png',
            'active' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),

        ];

        $temp = $this->db->table('users')->where(['username' => 'admin'])->get()->getRow();
        if (empty($temp->fullname)) {
            $this->db->table('users')->insert($dataUser);

            // dummy another user
            for ($i = 0; $i < $data['DATA_DUMMY_COUNT']; $i++) {
                $this->db->table('users')->insert($this->genUsers());
            }
        }





        // ------------------------------------------------------------------------
        // user groups
        // ------------------------------------------------------------------------
        $dataUserGroups = [
            [
                'name' => 'admin',
                'description'    => 'Administrator',
            ],
            [
                'name' => 'teacher',
                'description'    => 'Pengajar',
            ],
            [
                'name' => 'student',
                'description'    => 'Peserta Didik',
            ],
        ];

        $temp = $this->db->table('auth_groups')->where(['name' => 'admin'])->get()->getRow();
        if (empty($temp->name)) {
            $this->db->table('auth_groups')->insertBatch($dataUserGroups);
        }





        // ------------------------------------------------------------------------
        // user vs user group
        // ------------------------------------------------------------------------
        $dataUserVsUserGroups = ['group_id' => 1, 'user_id' => 1];

        $temp = $this->db->table('auth_groups_users')->where(['group_id' => 1])->get()->getRow();
        if (empty($temp->group_id)) {
            $this->db->table('auth_groups_users')->insert($dataUserVsUserGroups);

            // dummy another data
            for ($i = 1; $i < $data['DATA_DUMMY_COUNT']; $i++) {
                $this->db->table('auth_groups_users')->insert($this->genUserVsUserGroups($i + 1));
            }
        }




        // ------------------------------------------------------------------------
        // classroom
        // ------------------------------------------------------------------------
        $dataClassRoom = [
            ['classroom_code' => '1A', 'classroom_name' => 'Kelas 1A', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['classroom_code' => '1B', 'classroom_name' => 'Kelas 1B', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['classroom_code' => '1C', 'classroom_name' => 'Kelas 1C', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ];

        $temp = $this->db->table('classroom')->where(['id' => 1])->get()->getRow();
        if (empty($temp->id)) {
            $this->db->table('classroom')->insertBatch($dataClassRoom);
        }




        // ------------------------------------------------------------------------
        // classroom vs user
        // ------------------------------------------------------------------------
        $dataClassroomVsUser = ['classroom_id' => 1, 'user_id' => 1];

        $temp = $this->db->table('classroom_vs_user')->where(['classroom_id' => 1])->get()->getRow();
        if (empty($temp->classroom_id)) {
            // dummy another data
            for ($i = 1; $i < $data['DATA_DUMMY_COUNT']; $i++) {
                $this->db->table('classroom_vs_user')->insert($this->genClassroomVsUser($i + 1));
            }
        }



        // ------------------------------------------------------------------------
        // semester
        // ------------------------------------------------------------------------
        $dataClassRoom = [
            ['semester_code' => '1', 'semester_name' => 'Semester 1', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['semester_code' => '2', 'semester_name' => 'Semester 2', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ];

        $temp = $this->db->table('semester')->where(['id' => 1])->get()->getRow();
        if (empty($temp->id)) {
            $this->db->table('semester')->insertBatch($dataClassRoom);
        }


        // ------------------------------------------------------------------------
        // semester vs user
        // ------------------------------------------------------------------------
        $temp = $this->db->table('semester_vs_user')->where(['semester_id' => 1])->get()->getRow();
        if (empty($temp->semester_id)) {
            // dummy another data
            for ($i = 1; $i < $data['DATA_DUMMY_COUNT']; $i++) {
                $this->db->table('semester_vs_user')->insert($this->genSemesterVsUser($i + 1));
            }
        }
    }








    // ------------------------------------------------------------------------
    // GENERATOR
    // ------------------------------------------------------------------------
    private function genUsers(): array
    {
        $faker = Factory::create();
        return [
            'fullname' => $faker->name(),
            'email'    => $faker->email(),
            'username' => $faker->userName(),
            'password_hash' => Password::hash('user123'),
            'avatar' => 'avatar-' . rand(1, 5) . '.png',
            'active' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
    }

    private function genUserVsUserGroups($i): array
    {
        return ['group_id'   => rand(2, 3), 'user_id'    => $i];
    }

    private function genClassroomVsUser($i): array
    {
        return ['classroom_id'   => rand(1, 3), 'user_id'    => $i];
    }

    private function genSemesterVsUser($i): array
    {
        return ['semester_id'   => rand(1, 2), 'user_id'    => $i];
    }
}
