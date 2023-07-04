<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\AcademyPhoto;
use App\Models\AcademyStudent;
use App\Models\CourseSchedule;
use App\Models\OfferNotification;
use App\Models\OrderStatus;
use App\Models\SuperAdmin;
use App\Models\Teacher;
use App\Models\TeacherSchedule;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            AcademySeeder::class,
            AcademyPhotoSeeder::class,
            StudentSeeder::class,
            TeacherSeeder::class,
            AcademyStudentSeeder::class,
            AcademyTeacherSeeder::class,
            CourseSeeder::class,
            AnnualScheduleSeeder::class,
            CertificateSeeder::class,
            ExamSeeder::class,
            FeedBackSeeder::class,
            GroupSeeder::class,
            LessonSeeder::class,
            OfferSeeder::class,
            OfferStudentSeeder::class,
            QuestionSeeder::class,
            SuperAdminSeeder::class,
            TeacherScheduleSeeder::class,
            LessonNotificationSeeder::class,
            AcademyNotificationSeeder::class,
            OfferNotificationSeeder::class,
            CourseStudentSeeder::class,
            OfferAnnualScadualSeeder::class
            
        ]);
    }
}
