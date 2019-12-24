<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'content_management_access',
            ],
            [
                'id'    => '18',
                'title' => 'content_category_create',
            ],
            [
                'id'    => '19',
                'title' => 'content_category_edit',
            ],
            [
                'id'    => '20',
                'title' => 'content_category_show',
            ],
            [
                'id'    => '21',
                'title' => 'content_category_delete',
            ],
            [
                'id'    => '22',
                'title' => 'content_category_access',
            ],
            [
                'id'    => '23',
                'title' => 'content_tag_create',
            ],
            [
                'id'    => '24',
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => '25',
                'title' => 'content_tag_show',
            ],
            [
                'id'    => '26',
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => '27',
                'title' => 'content_tag_access',
            ],
            [
                'id'    => '28',
                'title' => 'content_page_create',
            ],
            [
                'id'    => '29',
                'title' => 'content_page_edit',
            ],
            [
                'id'    => '30',
                'title' => 'content_page_show',
            ],
            [
                'id'    => '31',
                'title' => 'content_page_delete',
            ],
            [
                'id'    => '32',
                'title' => 'content_page_access',
            ],
            [
                'id'    => '33',
                'title' => 'courses_management_access',
            ],
            [
                'id'    => '34',
                'title' => 'course_category_create',
            ],
            [
                'id'    => '35',
                'title' => 'course_category_edit',
            ],
            [
                'id'    => '36',
                'title' => 'course_category_show',
            ],
            [
                'id'    => '37',
                'title' => 'course_category_delete',
            ],
            [
                'id'    => '38',
                'title' => 'course_category_access',
            ],
            [
                'id'    => '39',
                'title' => 'course_subject_create',
            ],
            [
                'id'    => '40',
                'title' => 'course_subject_edit',
            ],
            [
                'id'    => '41',
                'title' => 'course_subject_show',
            ],
            [
                'id'    => '42',
                'title' => 'course_subject_delete',
            ],
            [
                'id'    => '43',
                'title' => 'course_subject_access',
            ],
            [
                'id'    => '44',
                'title' => 'course_chapter_create',
            ],
            [
                'id'    => '45',
                'title' => 'course_chapter_edit',
            ],
            [
                'id'    => '46',
                'title' => 'course_chapter_show',
            ],
            [
                'id'    => '47',
                'title' => 'course_chapter_delete',
            ],
            [
                'id'    => '48',
                'title' => 'course_chapter_access',
            ],
            [
                'id'    => '49',
                'title' => 'course_chapter_group_create',
            ],
            [
                'id'    => '50',
                'title' => 'course_chapter_group_edit',
            ],
            [
                'id'    => '51',
                'title' => 'course_chapter_group_show',
            ],
            [
                'id'    => '52',
                'title' => 'course_chapter_group_delete',
            ],
            [
                'id'    => '53',
                'title' => 'course_chapter_group_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
