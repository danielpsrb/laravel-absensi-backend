<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\University;

class UniversityDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a new university
        University::create([
            'name' => 'Sam Ratulangi University',
            'email' => 'rektorat@unsrat.ac.id',
            'address' => 'Kampus Unsrat Bahu, Malalayang, Manado City, North Sulawesi, Indonesia',
            'phone_number' => '0431-863886',
            'description' => 'Universitas Sam Ratulangi sering disingkat dengan sebutan UNSRAT adalah salah satu Perguruan Tinggi Negeri di Indonesia yang berlokasi di Kota Manado, Provinsi Sulawesi Utara[1]. Universitas Sam Ratulangi dipimpin oleh seorang Rektor Universitas Sam Ratulangi yang sekarang adalah Prof. Dr. Ir. Octovian Berty Alexander Sompie, M.Eng, IPU.',
            'total_faculty' => 'Universitas Sam Ratulangi sebagai perguruan tinggi negeri memiliki jumlah 12  dengan Sebelas Fakultas dan satu Program Pasca Sarjana yaitu: Fakultas Kedokteran, Fakultas Teknik, Fakultas Pertanian, Fakultas Peternakan, Fakultas Perikanan dan Ilmu Kelautan, Fakultas Ekonomi, Fakultas Hukum, Fakultas Ilmu Sosial dan Ilmu Politik, Fakultas Sastra, Fakultas Matematika dan Ilmu Pengetahuan Alam, Fakultas Kesehatan Masyarakat, serta Fakultas Pasca Sarjana',
            'latitude' => 1.455783,
            'longitude' => 124.827215,
            'radius_km' => 2,
            'time_in' => '08:00',
            'time_out' => '16:00',
        ]);
    }
}
