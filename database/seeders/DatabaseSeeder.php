<?php

namespace Database\Seeders;

use App\Models\Biodata;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seeder dinonaktifkan - Edit data langsung di database (phpMyAdmin)
        // Jika ingin menggunakan seeder lagi, uncomment kode di bawah ini
        
        /*
        $biodata = Biodata::updateOrCreate(
            ['email' => 'akmalhakimpurawijaya@gmail.com'],
            [
                'full_name' => 'Muhammad Akmal Hakim Purawijaya',
                'job_title' => 'Mahasiswa Teknik Informatika',
                'phone' => '+62 812-3456-7890',
                'address' => 'Sukabumi, Indonesia',
                'website' => 'https://akmalhakim.dev',
                'linkedin' => 'https://www.linkedin.com/in/akmalhakim_11',
                'github' => 'https://github.com/akmalhakim_11',
                'summary' => 'Mahasiswa Teknik Informatika yang fokus pada pengembangan aplikasi web berbasis Laravel dan ekosistem JavaScript. Terbiasa berkolaborasi dalam tim dan senang mempelajari teknologi baru.',
            ]
        );

        $biodata->educations()->delete();
        $biodata->educations()->createMany([
            [
                'institution' => 'Universitas Pendidikan Indonesia',
                'degree' => 'Sarjana Teknik Informatika',
                'field_of_study' => 'Pengembangan Perangkat Lunak',
                'start_year' => '2022',
                'end_year' => null,
                'description' => 'Fokus pada rekayasa perangkat lunak, basis data, dan pemrograman web. Aktif mengikuti berbagai proyek kolaboratif.',
            ],
            [
                'institution' => 'SMA Negeri 3 Bandung',
                'degree' => 'Sekolah Menengah Atas',
                'field_of_study' => 'Ilmu Pengetahuan Alam',
                'start_year' => '2019',
                'end_year' => '2022',
                'description' => 'Aktif di ekstrakurikuler komputer dan beberapa kompetisi teknologi tingkat kota.',
            ],
        ]);

        $biodata->experiences()->delete();
        $biodata->experiences()->createMany([
            [
                'company' => 'PT Digital Kreasi Indonesia',
                'position' => 'Web Developer Intern',
                'location' => 'Bandung, Indonesia',
                'start_date' => Carbon::create(2024, 7, 1),
                'end_date' => Carbon::create(2024, 8, 31),
                'is_current' => false,
                'description' => 'Membangun dan memelihara aplikasi web internal menggunakan Laravel serta melakukan integrasi API pihak ketiga.',
            ],
            [
                'company' => 'Freelance',
                'position' => 'Full-stack Web Developer',
                'location' => 'Remote',
                'start_date' => Carbon::create(2023, 3, 1),
                'end_date' => null,
                'is_current' => true,
                'description' => 'Mengerjakan berbagai proyek website untuk UMKM termasuk landing page, toko online sederhana, dan sistem reservasi.',
            ],
        ]);

        $biodata->skills()->delete();
        $biodata->skills()->createMany([
            ['name' => 'Laravel', 'proficiency' => 80, 'display_order' => 1],
            ['name' => 'PHP', 'proficiency' => 78, 'display_order' => 2],
            ['name' => 'JavaScript', 'proficiency' => 75, 'display_order' => 3],
            ['name' => 'React', 'proficiency' => 65, 'display_order' => 4],
            ['name' => 'Tailwind CSS', 'proficiency' => 70, 'display_order' => 5],
            ['name' => 'MySQL', 'proficiency' => 72, 'display_order' => 6],
        ]);
        */
    }
}
