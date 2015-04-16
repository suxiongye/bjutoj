<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/14
 * Time: 15:03
 */
class SentrySeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();
        DB::table('groups')->delete();
        DB::table('users_groups')->delete();

        Sentry::getUserProvider()->create(
            array(
                'username' =>  'student',
                'password'=> 'student',
                'solved'    => 0,
                'submit'    => 0,
                'activated' => 1,
            )
        );

        Sentry::getUserProvider()->create(
            array(
                'username' =>  'teacher',
                'password'=> 'teacher',
                'solved'    => 0,
                'submit'    => 0,
                'activated' => 1,
            )
        );

        Sentry::getGroupProvider()->create(
          array(
              'name'    =>  'Admin',
              'permissions'=>['admin'=>1]
          )
        );

        Sentry::getGroupProvider()->create(
            array(
                'name'    =>  'Student',
                'permissions'=>['student'=>1]
            )
        );

        $adminUser = Sentry::getUserProvider()->findByLogin('teacher');
        $adminGroup = Sentry::getGroupProvider()->findByName('Admin');
        $adminUser->addGroup($adminGroup);

        $studentUser =  Sentry::getUserProvider()->findByLogin('student');
        $studentGroup = Sentry::getGroupProvider()->findByName('Student');
        $studentUser->addGroup($studentGroup);
    }
}