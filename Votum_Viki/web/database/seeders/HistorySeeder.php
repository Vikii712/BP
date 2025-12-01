<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HistorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sections')->insert([

            // 1993
            [
                'title_sk' => 'Začiatky v Devínskej Novej Vsi',
                'title_en' => 'Beginnings in Devínská Nová Ves',
                'content_sk' => 'Všetko sa začalo pod názvom Veselá škôlka. Skupina mamičiek  na materskej dovolenke sa rozhodla  využiť svoje schopnosti a vzdelanie nielen pre svoje deti, ale aj pre ostatné rodiny v komunite. Zrodilo sa miesto plné radosti, hier a porozumenia.',
                'content_en' => 'It all started under the name Veselá škólka. A group of mothers on maternity leave decided to use their skills and education not only for their children, but also for other families in the community. A place full of joy, games and understanding was born.',
                'year' => 1993,
                'position' => 1,
                'category' => 'history',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 1995
            [
                'title_sk' => 'Prvé deti so zdravotným znevýhodnením',
                'title_en' => 'The first children with disabilities',
                'content_sk' => 'Postupne sme si začali všímať potrebu venovať pozornosť aj deťom so špeciálnymi potrebami. Do Veselej škôlky boli integrované prvé tri deti so zdravotným znevýhodnením medzi svojich rovesníkov – a ukázalo sa, že to funguje nádherne. Čoskoro sa pridali aj ďalšie rodiny, ktoré hľadali pre svoje deti miesto prijatia a pochopenia.',
                'content_en' => 'We gradually began to notice the need to pay attention to children with special needs. The first three children with disabilities were integrated into Veselá škólka among their peers – and it turned out that it worked beautifully. Soon other families joined, looking for a place of acceptance and understanding for their children.',
                'year' => 1995,
                'position' => 2,
                'category' => 'history',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 2002
            [
                'title_sk' => 'Nový názov: Združenie VOTUM',
                'title_en' => 'New name: VOTUM Association',
                'content_sk' => 'Naša činnosť sa  prirodzene rozšírila a nadobudla nový rozmer. Vznikol názov Združenie VOTUM,  pod  ktorým pôsobíme dodnes. Odvtedy sa zameriavame  predovšetkým na deti a mládež so zdravotným znevýhodnením a na podporu ich rodín.',
                'content_en' => 'Our activities naturally expanded and took on a new dimension. The name VOTUM Association was created, under which we operate to this day. Since then, we have focused primarily on children and youth with health disabilities and on supporting their families.',
                'year' => 2002,
                'position' => 3,
                'category' => 'history',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 2002
            [
                'title_sk' => 'Hudbou ľahšie vpred: začiatok muzikoterapie',
                'title_en' => 'Moving forward more easily with music: the beginning of music therapy',
                'content_sk' => 'Hudba začala byť silným prostriedkom pre rast v našich životoch. Hudba sa stáva mostom medzi svetmi, spôsobom, ako vyjadriť emócie, radosť aj súdržnosť. Táto činnosť sa neskôr  stala hlavnou náplňou našich stretnutí a vyrástla do systematickej práce, procesu muzikoterapie. Zároveň podporujeme komunitu rodičov  prostredníctvom spoločných  akcií, duchovných stretnutí a zážitkových podujatí.',
                'content_en' => 'Music began to be a powerful means of growth in our lives. Music becomes a bridge between worlds, a way to express emotions, joy and cohesion. This activity later became the main content of our meetings and grew into systematic work, the process of music therapy. At the same time, we support the community of parents through joint events, spiritual meetings and experiential events.',
                'year' => 2002,
                'position' => 4,
                'category' => 'history',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 2016
            [
                'title_sk' => 'Nové pôsobisko v Petržalke',
                'title_en' => 'New location in Petržalka',
                'content_sk' => 'Združenie sa presťahovalo do Petržalky, aby sme boli bližšie väčšiemu počtu rodín a záujemcov. Nové  priestory nám umožnili rozšíriť naše aktivity a vytvoriť lepšie zázemie pre deti aj ich rodičov.',
                'content_en' => 'The association moved to Petržalka to be closer to more families and interested parties. The new premises allowed us to expand our activities and create a better environment for children and their parents.',
                'year' => 2016,
                'position' => 5,
                'category' => 'history',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 2023
            [
                'title_sk' => 'Zrod Kapely VOTUM',
                'title_en' => 'Birth of the VOTUM Band',
                'content_sk' => 'S radosťou  sme založili Kapelu VOTUM, ktorú tvoria talentovaní mladí ľudia so zdravotným znevýhodnením, prejavujúci  hlbší záujem o hudbu. Ich energia, odhodlanie a úprimnosť prinášajú hudbe úplne nový rozmer.',
                'content_en' => 'We were happy to found the VOTUM Band, which is made up of talented young people with disabilities who show a deeper interest in music. Their energy, determination and sincerity bring a whole new dimension to music.',
                'year' => 2023,
                'position' => 6,
                'category' => 'history',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 2024
            [
                'title_sk' => '2024 – Hudba v srdci farnosti',
                'title_en' => '2024 – Music in the heart of the parish',
                'content_sk' => 'Od  tohto roku navštevujeme raz mesačne  Farnosť Kráľovnej rodiny na Teplickej ulici, kde hudobne sprevádzame bohoslužby a vytvárame priestor pre duchovné stretnutia mladých ľudí so znevýhodnením. Farnosť sa  stala naším duchovným domovom a miestom, kde sa stretávajú srdcia.',
                'content_en' => 'Starting this year, we visit the Royal Family Parish on Teplická Street once a month, where we accompany church services with music and create a space for spiritual meetings for young people with disabilities. The parish has become our spiritual home and a place where hearts meet.',
                'year' => 2024,
                'position' => 7,
                'category' => 'history',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // 2025
            [
                'title_sk' => 'Nový domov v Cik Cak centre, Petržalka',
                'title_en' => 'New home in the Cik Cak Center, Petržalka',
                'content_sk' => 'Od roku 2025 pôsobíme v Cik Cak centre v Petržalke, kde sa sústreďuje ťažisko našich aktivít – popoludňajšie muzikoterapeutické a komunitné stretnutia, ktoré prinášajú  zmysluplný kontakt a tvorivosť.',
                'content_en' => 'Since 2025, we have been operating in the Cik Cak Center in Petržalka, where the core of our activities is concentrated – afternoon music therapy and community meetings that bring meaningful connection and creativity.',
                'year' => 2025,
                'position' => 8,
                'category' => 'history',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
