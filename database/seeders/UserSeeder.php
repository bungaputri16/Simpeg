<?php

namespace Database\Seeders;

use App\Models\AlamatdanKontak;
use App\Models\Keluarga;
use App\Models\Kepegawaian;
use App\Models\Kependudukan;
use App\Models\Lainlain;
use App\Models\TandaTangan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@polindra.ac.id',
            'nip' => 'admin',
            'role' => 'admin',
            'password' => bcrypt(123456)
        ]);

        $userrofan = User::create([
            'name' => 'rofan aziz',
            'email' => 'rofan@polindra.ac.id',
            'nip' => '2105002',
            'role' => 'pegawai',
            'password' => bcrypt(123456)
        ]);

        Kependudukan::create([
            'user_id' => $userrofan->id,
        ]);
        Keluarga::create([
            'user_id' => $userrofan->id,
        ]);
        Kepegawaian::create([
            'user_id' => $userrofan->id,
        ]);
        AlamatdanKontak::create([
            'user_id' => $userrofan->id,
        ]);
        Lainlain::create([
            'user_id' => $userrofan->id,
        ]);
        TandaTangan::create([
            'user_id' => $userrofan->id,
        ]);

        $badruzzamanUser = User::create([
            'name' => 'baddruzzaman',
            'email' => 'baddruzzaman@polindra.ac.id',
            'nip' => '2105003',
            'role' => 'pegawai',
            'password' => bcrypt(123456)
        ]);
        Kependudukan::create([
            'user_id' => $badruzzamanUser->id,
        ]);
        Keluarga::create([
            'user_id' => $badruzzamanUser->id,
        ]);
        Kepegawaian::create([
            'user_id' => $badruzzamanUser->id,
        ]);
        AlamatdanKontak::create([
            'user_id' => $badruzzamanUser->id,
        ]);
        Lainlain::create([
            'user_id' => $badruzzamanUser->id,
        ]);
        TandaTangan::create([
            'user_id' => $badruzzamanUser->id,
        ]);

        $lubis = User::create([
            'name' => 'ahmad lubis ghozali',
            'email' => 'lubis@polindra.ac.id',
            'nip' => '2105004',
            'role' => 'pegawai',
            'password' => bcrypt(123456)
        ]);
        Kependudukan::create([
            'user_id' => $lubis->id,
        ]);
        Keluarga::create([
            'user_id' => $lubis->id,
        ]);
        Kepegawaian::create([
            'user_id' => $lubis->id,
        ]);
        AlamatdanKontak::create([
            'user_id' => $lubis->id,
        ]);
        Lainlain::create([
            'user_id' => $lubis->id,
        ]);
        TandaTangan::create([
            'user_id' => $lubis->id,
        ]);


        $karsid = User::create([
            'name' => 'karsid',
            'email' => 'karsid@polindra.ac.id',
            'nip' => '2105005',
            'role' => 'pegawai',
            'password' => bcrypt(123456)
        ]);
        Kependudukan::create([
            'user_id' => $karsid->id,
        ]);
        Keluarga::create([
            'user_id' => $karsid->id,
        ]);
        Kepegawaian::create([
            'user_id' => $karsid->id,
        ]);
        AlamatdanKontak::create([
            'user_id' => $karsid->id,
        ]);
        Lainlain::create([
            'user_id' => $karsid->id,
        ]);
        TandaTangan::create([
            'user_id' => $karsid->id,
        ]);


        $wardika = User::create([
            'name' => 'wardika',
            'email' => 'wardika@polindra.ac.id',
            'nip' => '2105006',
            'role' => 'pegawai',
            'password' => bcrypt(123456)
        ]);
        Kependudukan::create([
            'user_id' => $wardika->id,
        ]);
        Keluarga::create([
            'user_id' => $wardika->id,
        ]);
        Kepegawaian::create([
            'user_id' => $wardika->id,
        ]);
        AlamatdanKontak::create([
            'user_id' => $wardika->id,
        ]);
        Lainlain::create([
            'user_id' => $wardika->id,
        ]);
        TandaTangan::create([
            'user_id' => $wardika->id,
        ]);


        $eka = User::create([
            'name' => 'eka ismanto hadi',
            'email' => 'eka@polindra.ac.id',
            'nip' => '2105007',
            'role' => 'pegawai',
            'password' => bcrypt(123456)
        ]);
        Kependudukan::create([
            'user_id' => $eka->id,
        ]);
        Keluarga::create([
            'user_id' => $eka->id,
        ]);
        Kepegawaian::create([
            'user_id' => $eka->id,
        ]);
        AlamatdanKontak::create([
            'user_id' => $eka->id,
        ]);
        Lainlain::create([
            'user_id' => $eka->id,
        ]);
        TandaTangan::create([
            'user_id' => $eka->id,
        ]);

        $winanai = User::create([
            'name' => 'winani',
            'email' => 'winani@polindra.ac.id',
            'nip' => '2105008',
            'role' => 'pegawai',
            'password' => bcrypt(123456)
        ]);
        Kependudukan::create([
            'user_id' => $winanai->id,
        ]);
        Keluarga::create([
            'user_id' => $winanai->id,
        ]);
        Kepegawaian::create([
            'user_id' => $winanai->id,
        ]);
        AlamatdanKontak::create([
            'user_id' => $winanai->id,
        ]);
        Lainlain::create([
            'user_id' => $winanai->id,
        ]);
        TandaTangan::create([
            'user_id' => $winanai->id,
        ]);

        $yani = User::create([
            'name' => 'mohammad yani',
            'email' => 'yani@polindra.ac.id',
            'nip' => '2105009',
            'role' => 'pegawai',
            'password' => bcrypt(123456)
        ]);
        Kependudukan::create([
            'user_id' => $yani->id,
        ]);
        Keluarga::create([
            'user_id' => $yani->id,
        ]);
        Kepegawaian::create([
            'user_id' => $yani->id,
        ]);
        AlamatdanKontak::create([
            'user_id' => $yani->id,
        ]);
        Lainlain::create([
            'user_id' => $yani->id,
        ]);
        TandaTangan::create([
            'user_id' => $yani->id,
        ]);


        $fauzan = User::create([
            'name' => 'fauzan amri',
            'email' => 'fauzan@polindra.ac.id',
            'nip' => '2105010',
            'role' => 'pegawai',
            'password' => bcrypt(123456)
        ]);
        Kependudukan::create([
            'user_id' => $fauzan->id,
        ]);
        Keluarga::create([
            'user_id' => $fauzan->id,
        ]);
        Kepegawaian::create([
            'user_id' => $fauzan->id,
        ]);
        AlamatdanKontak::create([
            'user_id' => $fauzan->id,
        ]);
        Lainlain::create([
            'user_id' => $fauzan->id,
        ]);
        TandaTangan::create([
            'user_id' => $fauzan->id,
        ]);


        $rendi =  User::create([
            'name' => 'rendi',
            'email' => 'rendi@polindra.ac.id',
            'nip' => '2105011',
            'role' => 'pegawai',
            'password' => bcrypt(123456)
        ]);
        Kependudukan::create([
            'user_id' => $rendi->id,
        ]);
        Keluarga::create([
            'user_id' => $rendi->id,
        ]);
        Kepegawaian::create([
            'user_id' => $rendi->id,
        ]);
        AlamatdanKontak::create([
            'user_id' => $rendi->id,
        ]);
        Lainlain::create([
            'user_id' => $rendi->id,
        ]);
        TandaTangan::create([
            'user_id' => $rendi->id,
        ]);


        $nurbudi = User::create([
            'name' => 'nur budi nugraha',
            'email' => 'budi@polindra.ac.id',
            'nip' => '2105012',
            'role' => 'pegawai',
            'password' => bcrypt(123456)
        ]);
        Kependudukan::create([
            'user_id' => $nurbudi->id,
        ]);
        Keluarga::create([
            'user_id' => $nurbudi->id,
        ]);
        Kepegawaian::create([
            'user_id' => $nurbudi->id,
        ]);
        AlamatdanKontak::create([
            'user_id' => $nurbudi->id,
        ]);
        Lainlain::create([
            'user_id' => $nurbudi->id,
        ]);
        TandaTangan::create([
            'user_id' => $nurbudi->id,
        ]);

        $berlian = User::create([
            'name' => 'berlian kusuma dewi',
            'email' => 'berlian@polindra.ac.id',
            'nip' => '2105013',
            'role' => 'pegawai',
            'password' => bcrypt(123456)
        ]);
        Kependudukan::create([
            'user_id' => $berlian->id,
        ]);
        Keluarga::create([
            'user_id' => $berlian->id,
        ]);
        Kepegawaian::create([
            'user_id' => $berlian->id,
        ]);
        AlamatdanKontak::create([
            'user_id' => $berlian->id,
        ]);
        Lainlain::create([
            'user_id' => $berlian->id,
        ]);
        TandaTangan::create([
            'user_id' => $berlian->id,
        ]);


        $sukroni = User::create([
            'name' => 'sukroni',
            'email' => 'sukroni@polindra.ac.id',
            'nip' => '2105014',
            'role' => 'pegawai',
            'password' => bcrypt(123456)
        ]);
        Kependudukan::create([
            'user_id' => $sukroni->id,
        ]);
        Keluarga::create([
            'user_id' => $sukroni->id,
        ]);
        Kepegawaian::create([
            'user_id' => $sukroni->id,
        ]);
        AlamatdanKontak::create([
            'user_id' => $sukroni->id,
        ]);
        Lainlain::create([
            'user_id' => $sukroni->id,
        ]);
        TandaTangan::create([
            'user_id' => $sukroni->id,
        ]);


        $nurhomat = User::create([
            'name' => 'nurohmat',
            'email' => 'nurohmat@polindra.ac.id',
            'nip' => '2105015',
            'role' => 'pegawai',
            'password' => bcrypt(123456)
        ]);
        Kependudukan::create([
            'user_id' => $nurhomat->id,
        ]);
        Keluarga::create([
            'user_id' => $nurhomat->id,
        ]);
        Kepegawaian::create([
            'user_id' => $nurhomat->id,
        ]);
        AlamatdanKontak::create([
            'user_id' => $nurhomat->id,
        ]);
        Lainlain::create([
            'user_id' => $nurhomat->id,
        ]);
        TandaTangan::create([
            'user_id' => $nurhomat->id,
        ]);

        $fikri = User::create([
            'name' => 'moh ali fikri',
            'email' => 'fikri@polindra.ac.id',
            'nip' => '2105016',
            'role' => 'pegawai',
            'password' => bcrypt(123456)
        ]);
        Kependudukan::create([
            'user_id' => $fikri->id,
        ]);
        Keluarga::create([
            'user_id' => $fikri->id,
        ]);
        Kepegawaian::create([
            'user_id' => $fikri->id,
        ]);
        AlamatdanKontak::create([
            'user_id' => $fikri->id,
        ]);
        Lainlain::create([
            'user_id' => $fikri->id,
        ]);
        TandaTangan::create([
            'user_id' => $fikri->id,
        ]);


        $indra = User::create([
            'name' => 'indra fitriyanto',
            'email' => 'indra@polindra.ac.id',
            'nip' => '2105017',
            'role' => 'pegawai',
            'password' => bcrypt(123456)
        ]);
        Kependudukan::create([
            'user_id' => $indra->id,
        ]);
        Keluarga::create([
            'user_id' => $indra->id,
        ]);
        Kepegawaian::create([
            'user_id' => $indra->id,
        ]);
        AlamatdanKontak::create([
            'user_id' => $indra->id,
        ]);
        Lainlain::create([
            'user_id' => $indra->id,
        ]);
        TandaTangan::create([
            'user_id' => $indra->id,
        ]);

        $halida = User::create([
            'name' => 'Halida Nurul Fitri',
            'email' => 'halida@polindra.ac.id',
            'nip' => '2105011212',
            'role' => 'admin-pegawai',
            'password' => bcrypt(123456)
        ]);
        Kependudukan::create([
            'user_id' => $halida->id,
        ]);
        Keluarga::create([
            'user_id' => $halida->id,
        ]);
        Kepegawaian::create([
            'user_id' => $halida->id,
        ]);
        AlamatdanKontak::create([
            'user_id' => $halida->id,
        ]);
        Lainlain::create([
            'user_id' => $halida->id,
        ]);
        TandaTangan::create([
            'user_id' => $halida->id,
        ]);
        

    }
}
