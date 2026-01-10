<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sections')->insert([
            [
                'title_sk' => 'Sídlo',
                'title_en' => 'Head office',
                'content_sk' => '<p>Združenie VOTUM</p>
                                <p>Záhradná 485/2</p>
                                <p>900 33 Marianka</p>
                                ',
                'content_en' => '<p>VOTUM Association</p>
                                <p>Záhradná 485/2</p>
                                <p>900 33 Marianka</p>
                                ',
                'year' => null,
                'position' => 1,
                'category' => 'address',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title_sk' => 'Miesto pravidelných aktivít',
                'title_en' => 'Place of regular activities',
                'content_sk' => '<p>CC Centrum</p>
                                <p>Jiráskova 3</p>
                                <p>851 01 Bratislava – Petržalka</p>
                                ',
                'content_en' => '<p>CC Center</p>
                                <p>Jiráskova 3</p>
                                <p>851 01 Bratislava – Petržalka</p>
                                ',
                'year' => null,
                'position' => 2,
                'category' => 'address',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title_sk' => 'Zruženie VOTUM',
                'title_en' => 'VOTUM Association',
                'content_sk' => 'zdruzenie.votum@gmail.com',
                'content_en' => 'zdruzenie.votum@gmail.com',
                'year' => null,
                'position' => 1,
                'category' => 'email',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title_sk' => 'Bankový účet',
                'title_en' => 'Bank account ',
                'content_sk' => 'Slovenská sporiteľňa',
                'content_en' => 'Slovenská sporiteľňa',
                'year' => null,
                'position' => 1,
                'category' => 'bank',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title_sk' => 'Názov účtu',
                'title_en' => 'Account name',
                'content_sk' => 'Združenie VOTUM ',
                'content_en' => 'Združenie VOTUM ',
                'year' => null,
                'position' => 2,
                'category' => 'bank',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title_sk' => 'BIC',
                'title_en' => 'BIC',
                'content_sk' => 'GIBASKBX',
                'content_en' => 'GIBASKBX',
                'year' => null,
                'position' => 3,
                'category' => 'bank',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title_sk' => 'IBAN',
                'title_en' => 'IBAN',
                'content_sk' => 'SK12 0900 0000 0000 1146 2956',
                'content_en' => 'SK12 0900 0000 0000 1146 2956',
                'year' => null,
                'position' => 4,
                'category' => 'bank',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title_sk' => '<p>Mgr. Mária Horváthová, DiS. art</p>
                                <p>Predseda, štatutár</p>
                                <p>Liečebný pedagóg, muzikoterapeut</p>',
                'title_en' => '<p>Mgr. Mária Horváthová, DiS. art</p>
                                <p>Association President, statutory officer</p>
                                <p>Therapeutic Educator, Music Therapist</p>
                                ',
                'content_sk' => '0902 299 661',
                'content_en' => '0902 299 661',
                'year' => null,
                'position' => 1,
                'category' => 'tel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title_sk' => ' <p>Renáta Štaffová</p>
                                <p>Člen výboru </p>
                                <p>Asistent</p>
                                ',
                'title_en' => '<p>Renáta Štaffová</p>
                                <p>Committee member</p>
                                <p>Assistant</p>
                                ',
                'content_sk' => '0908 798 463',
                'content_en' => '0908 798 463',
                'year' => null,
                'position' => 2,
                'category' => 'tel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
