<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupportSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sections')->insert([
            [
                'title_sk' => 'Prečo venovať 2% ?',
                'title_en' => 'Why donate 2%?',
                'content_sk' =>'Vaše 2 % z dane sú pre nás každý rok tým najväčším darom. Tvoria hlavný zdroj financovania  našej činnosti a vďaka ním môžeme pokračovať v tom, čo robíme – prinášať radosť, hudbu a zmysluplné aktivity pre našich mladých. Tlačivá  a potrebné informácie nájdete v sekcii DOKUMENTY.',
                'content_en' => 'Your 2% of tax is the biggest gift to us every year. It is the main source of funding for our activities and thanks to it we can continue what we do – bringing joy, music and meaningful activities to our young people. You can find forms and necessary information in the DOCUMENTS section.',
                'year' => null,
                'position' => 1,
                'category' => 'percentWhy',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title_sk' => 'Celý názov',
                'title_en' => 'Whole name',
                'content_sk' =>'Združenie VOTUM',
                'content_en' => 'Združenie VOTUM',
                'year' => null,
                'position' => 1,
                'category' => 'percentInfo',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'title_sk' => 'Právna forma',
                'title_en' => 'Legal form',
                'content_sk' =>'Občianske združenie',
                'content_en' => 'Civic association',
                'year' => null,
                'position' => 2,
                'category' => 'percentInfo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title_sk' => 'Fyzická osoba',
                'title_en' => 'Natural person',
                'content_sk' =>'
                <ol>
                    <li>Stiahnite si príslušné tlačivo z webovej stránky Finančnej správy alebo nášho združenia.</li>
                    <li>Vyplňte údaje o sebe a o prijímateľovi 2% (naše údaje nájdete uvedené nižšie).</li>
                    <li>Podajte tlačivo na daňový úrad alebo ho odošlite elektronicky cez finančnú správu.</li>
                    <li>Uschovajte si potvrdenie o podaní pre vlastnú evidenciu.</li>
                </ol>',
                'content_en' => '<ol>
                    <li>Download the required form from the Financial Administration website or from our organization.</li>
                    <li>Fill in your personal information and the recipient’s information (our details are listed below).</li>
                    <li>Submit the form to the tax office or send it electronically via the financial administration portal.</li>
                    <li>Keep the confirmation of submission for your records.</li>
                </ol>',
                'year' => null,
                'position' => 1,
                'category' => 'percentHow',
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'title_sk' => 'Právnická osoba',
                'title_en' => 'Legal person',
                'content_sk' => '
                <ol>
                    <li>Stiahnite si príslušné tlačivo z webovej stránky Finančnej správy alebo nášho združenia.</li>
                    <li>Vyplňte údaje o sebe a o prijímateľovi 2% (naše údaje nájdete uvedené nižšie).</li>
                    <li>Podajte tlačivo na daňový úrad alebo ho odošlite elektronicky cez finančnú správu.</li>
                    <li>Uschovajte si potvrdenie o podaní pre vlastnú evidenciu.</li>
                </ol>',
                'content_en' => '<ol>
                    <li>Download the required form from the Financial Administration website or from our organization.</li>
                    <li>Fill in your personal information and the recipient’s information (our details are listed below).</li>
                    <li>Submit the form to the tax office or send it electronically via the financial administration portal.</li>
                    <li>Keep the confirmation of submission for your records.</li>
                </ol>',
                'year' => null,
                'position' => 2,
                'category' => 'percentHow',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title_sk' => 'Ďakujeme za vašu podporu!',
                'title_en' => 'Thank you for your support!',
                'content_sk' =>'Ďakujeme, že pomáhate našim deťom a mladým rásť, tvoriť a žiť naplno.',
                'content_en' => 'Thank you for helping our children and young people grow, create and live to the fullest.',
                'year' => null,
                'position' => 1,
                'category' => 'percentThanks',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title_sk' => 'Prečo je vaša podpora dôležitá?',
                'title_en' => 'Why is your support important?',
                'content_sk' =>'Vďaka vašej finančnej, materiálnej či inej pomoci dokážeme robiť viac.
Vybrali sme si cestu nekomerčnej organizácie, ktorá sa snaží čo najmenej zaťažovať rozpočet rodín našich detí. Preto si každú formu podpory nesmierne vážime.
Máme srdce, nadšenie a chuť pomáhať, ale vašou podporou sa naše sny menia na skutočnosť.
Ak cítite, že naša práca má zmysel, podporte nás spôsobom, ktorý je vám najbližší.',
                'content_en' => 'Thanks to your financial, material or other help, we are able to do more.
We have chosen the path of a non-profit organization that tries to put as little strain on the budget of our children\'s families as possible.
Therefore, we greatly appreciate every form of support.
    We have the heart, enthusiasm and desire to help, but with your support our dreams become reality.
If you feel that our work has meaning, support us in the way that is closest to you.
                ',
                'year' => null,
                'position' => 1,
                'category' => 'support',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title_sk' => 'QR kód:',
                'title_en' => 'QR Code:',
                'content_sk' => '
        <p><strong>Najjednoduchší a najrýchlejší spôsob</strong>, ako nás podporiť.</p>
        <p>Zaslať môžete <strong>ľubovoľnú sumu</strong>.</p>

        <h4 class=" font-semibold text-votum-blue mt-4">Postup:</h4>
        <ol class="list-decimal pl-6 space-y-2">
            <li>Otvorte aplikáciu svojej banky a v časti "zaplatiť" zvoľte možnosť platba pomocou QR kódu.</li>
            <li>Sumu, ktorou chcete prispieť, môžete upraviť podľa vlastnej vôle. QR je prednastavený na sumu 20 €.</li>
            <li>Už stačí len platbu odoslať. Ďakujeme!</li>
        </ol>
    ',
                'content_en' => '
        <p><strong>The easiest and fastest way</strong> to support us.</p>
        <p>You can send <strong>any amount you like</strong>.</p>

        <h4 class=" font-semibold text-votum-blue mt-4">Instructions:</h4>
        <ol class="list-decimal pl-6 space-y-2">
            <li>Open your banking app and choose the "Pay" option using a QR code.</li>
            <li>You can adjust the amount you wish to contribute. The QR code is pre-set to 20 €.</li>
            <li>Finally, submit the payment. Thank you!</li>
        </ol>
    ',
                'year' => null,
                'position' => 1,
                'category' => 'qrHow',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title_sk' => 'Ďakujeme za vašu podporu!',
                'title_en' => 'Thank you for your support!',
                'content_sk' =>'Každý príspevok, bez ohľadu na výšku, pomáha našim deťom a mladým rásť, tvoriť a žiť naplno.',
                'content_en' => 'Every contribution, no matter the amount, helps our children and young people grow, create, and live life to the fullest.',
                'year' => null,
                'position' => 1,
                'category' => 'financialThanks',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title_sk' => 'Finančný dar',
                'title_en' => 'Financial donation',
                'content_sk' =>'
                <p>Za  každé darované euro sme úprimne vďační. </p>

<p>Vaša podpora nám pomáha hradiť všetky potrebné výdavky spojené s činnosťou združenia.
Všetky príspevky smerujú priamo na rozvoj aktivít a podporu našich detí a mladých.</p>

<p>Môžete prispieť jednorazovo,  alebo pravidelne mesačne.</p>

                ',

                'content_en' => '
                <p>We are sincerely grateful for every donated euro.  </p>

<p>Your support helps us cover all necessary expenses related to the activities of the association.
All contributions go directly to the development of activities and support of our children and young people.
</p>

<p>You can donate once or regularly on a monthly basis.</p>

                ',
                'year' => null,
                'position' => 1,
                'category' => 'financialWhy',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title_sk' => 'Ako inak pomôcť?',
                'title_en' => 'How else to help?',
                'content_sk' => '
    <p>Nielen finančný príspevok dokáže urobiť rozdiel.</p>
    <p>Vaše schopnosti, čas, alebo organizovanie podujatia môžu byť pre nás rovnako cenné. Pozrite si možnosti nižšie a kontaktujte nás, ak vás niektorá z nich zaujala!</p>
',

                'content_en' => '
    <p>Not only a financial contribution can make a difference.</p>
    <p>Your skills, time, or organizing an event can be just as valuable to us. Check out the options below and contact us if any of them interest you!</p>
',
                'year' => null,
                'position' => 1,
                'category' => 'otherWhy',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title_sk' => 'Ďakujeme za vašu podporu!',
                'title_en' => 'Thank you for your support!',
                'content_sk' =>'Vďaka vašej podpore môžeme pokračovať v našej činnosti, v tom, čo nás baví a pomáha iným.',
                'content_en' => 'Thanks to your support, we can continue our activities, doing what we enjoy while helping others.',
                'year' => null,
                'position' => 1,
                'category' => 'otherThanks',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title_sk' => 'Máte inú myšlienku?',
                'title_en' => 'Do you have another idea?',
                'content_sk' => '
                Každá forma podpory je vítaná! Ak máte nápad, ako by ste nám mohli pomôcť inak, neváhajte nás kontaktovať. Spoločne nájdeme najlepšie riešenie.',
                'content_en' => '
                Every form of support is welcome! If you have an idea on how you could help us in another way, do not hesitate to contact us. Together we will find the best solution.',
                'year' => null,
                'position' => 1,
                'category' => 'otherIdea',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);



        $sectionId1 = DB::table('sections')->insertGetId([
            'title_sk' => 'Dobrovoľníctvo, ktoré vás posilní',
            'title_en' => 'Volunteering that empowers you',
            'content_sk' => '
            <p>Dobrovoľníctvo u nás nie je len o pomoci – je o zážitkoch, priateľstve a radosti. Možno vás prekvapí, ako veľmi vás naplní alebo zmení…</p>
            <p>Dobrovoľníci sú pre nás aj pre naše deti nesmierne dôležití. Najviac sa osvedčilo zapojenie počas letného kempu, pri verejných vystúpeniach alebo ako osobný asistent pri individuálnych záujmoch našich mladých. Nakoľko pracujeme s deťmi a mladými s rôznymi telesnými či mentálnymi znevýhodneniami, každá pomocná ruka sa zíde – pri presunoch, sebaobsluhe a tvorivých aktivitách.</p>
            <p>Každá chvíľa, ktorú venujete, má veľkú hodnotu. Pridajte sa k nám a zažite, aké to je – byť súčasťou niečoho, čo mení životy.</p>
        ',
            'content_en' => '
            <p>Volunteering for us is not just about helping – it is about experiences, friendship and joy. You may be surprised at how much it will fulfill or change you…</p>
            <p>Volunteers are incredibly important to us and to our children. The most successful have been involvement during summer camp, public speaking or as a personal assistant in the individual interests of our young people. Since we work with children and young people with various physical or mental disabilities, every helping hand is welcome – during transfers, self-care and creative activities.</p>
            <p>Every moment you dedicate has great value. Join us and experience what it is like to be part of something that changes lives.</p>
        ',
            'year' => null,
            'position' => 1,
            'category' => 'otherType',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('files')->insert([
            'section_id' => $sectionId1,
            'event_id' => null,
            'url' => 'fa-hand-holding-heart',
            'type' => 'image',
            'title_sk' => '',
            'title_en' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        $sectionId2 = DB::table('sections')->insertGetId([
            'title_sk' => 'Partnerská podpora',
            'title_en' => 'Partner Support',
            'content_sk' => '
            <p>S vďakou vítame všetky organizácie, firmy a spoločnosti, ktoré sa rozhodnú podporiť naše združenie – či už finančne, materiálne alebo mediálne.</p>
            <p>Občas potrebujeme nové hudobné nástroje, dopravu na výlet, priestor na koncert, alebo len niekoho, kto o nás napíše pár milých slov.</p>
            <p>Každá forma pomoci sa počíta. Spolu dokážeme rozohrať viac.</p>
        ',
            'content_en' => '
            <p>We gratefully welcome all organizations, companies and societies that decide to support our association – whether financially, materially or through the media.</p>
            <p>Sometimes we need new musical instruments, transportation for a trip, a venue for a concert, or just someone to write a few kind words about us.</p>
            <p>Every form of help counts. Together we can do more.</p>
        ',
            'year' => null,
            'position' => 2,
            'category' => 'otherType',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('files')->insert([
            'section_id' => $sectionId2,
            'event_id' => null,
            'url' => 'fa-gift',
            'type' => 'image',
            'title_sk' => '',
            'title_en' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        $sectionId3 = DB::table('sections')->insertGetId([
            'title_sk' => 'Podpora vystúpení Kapely VOTUM',
            'title_en' => 'Support for VOTUM Band performances',
            'content_sk' => '
            <p>Potrebujete hudobne sprevádzať Vaše podujatie? Veľmi radi prídeme hudobne obohatiť Vaše podujatie.</p>
            <p>Kapela VOTUM je výsledkom dlhoročnej práce s mladými talentovanými ľuďmi so zdravotným znevýhodnením, ktorí milujú hudbu a chcú sa o svoju radosť podeliť so svetom.</p>
            <p>Na verejných vystúpeniach sa prezentujeme vždy novým hudobným programom – prispôsobeným danej príležitosti. Naši Votumáci vystupujú s obrovskou energiou, nadšením a úprimnosťou, ktorá si získava srdcia publika všade, kam prídu.</p>
            <p>Každé vystúpenie je ich prácou, v ktorej sú naozaj dobrí, preto financie za koncert putujú priamo im ako honorár.</p>
            <h4 class="font-semibold mt-4">Naše doterajšie vystúpenia:</h4>
            <ul class="list-disc pl-6 space-y-1">
                <li>Platforma rodín detí so zdravotným postihnutím – konferencia, Primaciálny palác (2023)</li>
                <li>BKIS – Festival Noc hudby (2024)</li>
                <li>BKIS – Vianočné spevy, hlavné pódium Františkánske námestie (2024)</li>
                <li>Farnosť Kráľovnej rodiny, Teplická – pravidelné hudobné sprevádzanie bohoslužieb (od 2023 dodnes)</li>
                <li>Bratislava – Staré Mesto: Festival zo srdca (2025)</li>
                <li>BKIS – Bratislavské Vianoce, hlavné pódium (2025)</li>
                <li>Farské plesy (2022, 2023)</li>
                <li>Každoročný koncert vo V-klube pre našich priaznivcov a rodičov</li>
            </ul>
            <p>Hudba nás spája, prináša radosť nám – a veríme, že aj vám.</p>
        ',
            'content_en' => '
            <p>Do you need musical accompaniment for your event? We would be happy to come and enrich your event with music.</p>
            <p>The VOTUM band is the result of many years of work with young talented people with disabilities who love music and want to share their joy with the world.</p>
            <p>At public performances, we always present ourselves with a new musical program - adapted to the occasion. Our Votum members perform with enormous energy, enthusiasm and sincerity, which wins the hearts of the audience wherever they go.</p>
            <p>Each performance is their work, which they are really good at, so the funds for the concert go directly to them as a fee.</p>
            <h4 class="font-semibold mt-4">Our previous performances:</h4>
            <ul class="list-disc pl-6 space-y-1">
                <li>Platform of Families of Children with Disabilities – conference, Primate’s Palace (2023)</li>
                <li>BKIS – Night of Music Festival (2024)</li>
                <li>BKIS – Christmas Carols, main stage Františkánske námestie (2024)</li>
                <li>Parish Teplická – regular musical accompaniment of church services (from 2023 to the present)</li>
                <li>Bratislava – Old Town: Festival from the Heart (2025)</li>
                <li>BKIS – Bratislava Christmas, main stage (2025)</li>
                <li>Parish Balls (2022, 2023)</li>
                <li>Annual concert in the V-club for our supporters and parents</li>
            </ul>
            <p>Music unites us, brings joy to us – and we believe to you too.</p>
        ',
            'year' => null,
            'position' => 3,
            'category' => 'otherType',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('files')->insert([
            'section_id' => $sectionId3,
            'event_id' => null,
            'url' => 'fa-drum',
            'type' => 'image',
            'title_sk' => '',
            'title_en' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
