<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Core extends Migration
{

    public function up()
    {

        // ------------------------------------------------------------------------
        // classroom
        // ------------------------------------------------------------------------
        $this->forge->addField([
            'id'                => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'classroom_code'    => ['type' => 'VARCHAR', 'constraint' => '100'],
            'classroom_name'    => ['type' => 'VARCHAR', 'constraint' => '100'],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],

        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('classroom');


        // ------------------------------------------------------------------------
        // classroom_vs_user
        // ------------------------------------------------------------------------
        $fields = [
            'classroom_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'user_id'  => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
        ];

        $this->forge->addField($fields);
        $this->forge->addKey(['classroom_id', 'user_id']);
        $this->forge->addForeignKey('classroom_id', 'classroom', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');
        $this->forge->createTable('classroom_vs_user', true);



        // ------------------------------------------------------------------------
        // semester
        // ------------------------------------------------------------------------
        $this->forge->addField([
            'id'                => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'semester_code'     => ['type' => 'VARCHAR', 'constraint' => '100'],
            'semester_name'     => ['type' => 'VARCHAR', 'constraint' => '100'],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],

        ]);
        $this->forge->addKey('id', true); // pk
        $this->forge->createTable('semester');


        // ------------------------------------------------------------------------
        // semester_vs_user
        // ------------------------------------------------------------------------
        $fields = [
            'semester_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'user_id'  => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
        ];

        $this->forge->addField($fields);
        $this->forge->addKey(['semester_id', 'user_id']);
        $this->forge->addForeignKey('semester_id', 'semester', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');
        $this->forge->createTable('semester_vs_user', true);



        // ------------------------------------------------------------------------
        // lesson
        // ------------------------------------------------------------------------
        $this->forge->addField([
            'id'                => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'lesson_code'       => ['type' => 'VARCHAR', 'constraint' => '100'],
            'lesson_name'       => ['type' => 'VARCHAR', 'constraint' => '100'],
            'content'           => ['type' => 'TEXT', 'null' => true],
            'gmeet_link'        => ['type' => 'VARCHAR', 'constraint' => '100'],
            'file_url'          => ['type' => 'VARCHAR', 'constraint' => '255'],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],

        ]);
        $this->forge->addKey('id', true); // pk
        $this->forge->createTable('lesson');


        // ------------------------------------------------------------------------
        // lesson_vs_semester
        // ------------------------------------------------------------------------
        $fields = [
            'lesson_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'semester_id'  => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
        ];

        $this->forge->addField($fields);
        $this->forge->addKey(['lesson_id', 'semester_id']);
        $this->forge->addForeignKey('lesson_id', 'lesson', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('semester_id', 'semester', 'id', '', 'CASCADE');
        $this->forge->createTable('lesson_vs_semester', true);



        // ------------------------------------------------------------------------
        // lesson_vs_classroom
        // ------------------------------------------------------------------------
        $fields = [
            'lesson_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'classroom_id'  => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
        ];

        $this->forge->addField($fields);
        $this->forge->addKey(['lesson_id', 'classroom_id']);
        $this->forge->addForeignKey('lesson_id', 'lesson', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('classroom_id', 'classroom', 'id', '', 'CASCADE');
        $this->forge->createTable('lesson_vs_classroom', true);




        // ------------------------------------------------------------------------
        // attendance
        // ------------------------------------------------------------------------
        $this->forge->addField([
            'id'                => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'date'              => ['type' => 'datetime', 'null' => false],
            'status'            => ['type' => 'VARCHAR', 'constraint' => '100'],
            'created_at'        => ['type' => 'datetime', 'null' => true],
            'updated_at'        => ['type' => 'datetime', 'null' => true],
            'deleted_at'        => ['type' => 'datetime', 'null' => true],

        ]);
        $this->forge->addKey('id', true); // pk
        $this->forge->createTable('attendance');


        // ------------------------------------------------------------------------
        // attendance_vs_user
        // ------------------------------------------------------------------------
        $fields = [
            'attendance_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'user_id'  => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
        ];

        $this->forge->addField($fields);
        $this->forge->addKey(['attendance_id', 'user_id']);
        $this->forge->addForeignKey('attendance_id', 'attendance', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id', '', 'CASCADE');
        $this->forge->createTable('attendance_vs_user', true);


        // ------------------------------------------------------------------------
        // attendance_vs_semester
        // ------------------------------------------------------------------------
        $fields = [
            'attendance_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'semester_id'  => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
        ];

        $this->forge->addField($fields);
        $this->forge->addKey(['attendance_id', 'semester_id']);
        $this->forge->addForeignKey('attendance_id', 'attendance', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('semester_id', 'semester', 'id', '', 'CASCADE');
        $this->forge->createTable('attendance_vs_semester', true);


        // ------------------------------------------------------------------------
        // attendance_vs_classroom
        // ------------------------------------------------------------------------
        $fields = [
            'attendance_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'classroom_id'  => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
        ];

        $this->forge->addField($fields);
        $this->forge->addKey(['attendance_id', 'classroom_id']);
        $this->forge->addForeignKey('attendance_id', 'attendance', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('classroom_id', 'classroom', 'id', '', 'CASCADE');
        $this->forge->createTable('attendance_vs_classroom', true);



        // ------------------------------------------------------------------------

    }

    public function down()
    {

        // drop constraints first to prevent errors
        if ($this->db->DBDriver != 'SQLite3') // @phpstan-ignore-line
        {
            $this->forge->dropForeignKey('attendance_vs_classroom', 'attendance_vs_classroom_attendance_id_foreign');
            $this->forge->dropForeignKey('attendance_vs_classroom', 'attendance_vs_classroom_classroom_id_foreign');
            $this->forge->dropForeignKey('attendance_vs_semester', 'attendance_vs_semester_attendance_id_foreign');
            $this->forge->dropForeignKey('attendance_vs_semester', 'attendance_vs_semester_semester_id_foreign');
            $this->forge->dropForeignKey('attendance_vs_user', 'attendance_vs_user_attendance_id_foreign');
            $this->forge->dropForeignKey('attendance_vs_user', 'attendance_vs_user_user_id_foreign');
            $this->forge->dropForeignKey('classroom_vs_user', 'classroom_vs_user_classroom_id_foreign');
            $this->forge->dropForeignKey('classroom_vs_user', 'classroom_vs_user_user_id_foreign');
            $this->forge->dropForeignKey('lesson_vs_classroom', 'lesson_vs_classroom_classroom_id_foreign');
            $this->forge->dropForeignKey('lesson_vs_classroom', 'lesson_vs_classroom_lesson_id_foreign');
            $this->forge->dropForeignKey('lesson_vs_semester', 'lesson_vs_semester_lesson_id_foreign');
            $this->forge->dropForeignKey('lesson_vs_semester', 'lesson_vs_semester_semester_id_foreign');
            $this->forge->dropForeignKey('semester_vs_user', 'semester_vs_user_semester_id_foreign');
            $this->forge->dropForeignKey('semester_vs_user', 'semester_vs_user_user_id_foreign');
        }

        $this->forge->dropTable('classroom');
        $this->forge->dropTable('classroom_vs_user');
        $this->forge->dropTable('semester');
        $this->forge->dropTable('semester_vs_user');
        $this->forge->dropTable('lesson');
        $this->forge->dropTable('lesson_vs_semester');
        $this->forge->dropTable('lesson_vs_classroom');
        $this->forge->dropTable('attendance');
        $this->forge->dropTable('attendance_vs_user');
        $this->forge->dropTable('attendance_vs_semester');
        $this->forge->dropTable('attendance_vs_classroom');
    }
}
