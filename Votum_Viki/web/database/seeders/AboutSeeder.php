<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sections')->insert([
            [
                'title_sk' => 'Spolu je život veselší!',
                'title_en' => 'Together, life is more joyful!',
                'content_sk' => 'Už viac ako 30 rokov budujeme komunitu plnú radosti a vzájomnej podpory. Cez muzikoterapiu a komunitné aktivity pomáhame ľuďom so znevýhodnením rozvíjať ich jedinečné talenty.',
                'content_en' => 'For more than 30 years, we\'ve been building a community filled with joy and mutual support. Through music therapy and community activities, we help people with disabilities develop their unique talents.',
                'year' => null,
                'position' => 1,
                'category' => 'hero',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title_sk' => 'Náš tím',
                'title_en' => 'Our team',
                'content_sk' => 'Spoznať členov nášho tímu',
                'content_en' => 'Get to know our team',
                'year' => null,
                'position' => 1,
                'category' => 'ourTeam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title_sk' => 'VOTUM – z latinského „želanie, sľub”',
                'title_en' => 'VOTUM – from Latin “wish, promise”',
                'content_sk' => '<p>Našim želaním je vytvárať spoločenstvo ľudí, ktorí si navzájom pomáhajú, podporujú sa a prinášajú si do života radosť. Sľubujeme, že sa o to budeme snažiť najlepšie, ako vieme.</p><p>Naša činnosť vychádza z kresťanských hodnôt – z úcty k Bohu, človeku a prostrediu, v ktorom žijeme. Veríme, že každý z nás je jedinečný, má svoje miesto, talenty a hodnotu. Spoločne sa učíme prijímať sa navzájom, rozvíjať svoje schopnosti a tvoriť komunitu, kde sa každý cíti vítaný.</p><p>Nič nepreverí Váš zámer lepšie ako čas... Už viac ako 30 rokov sa snažíme prinášať do života porozumenie, rešpekt a lásku – jednoducho to, čo robí život krajším.</p>',
                'content_en' => '
<p>Our wish is to create a community of people who help each other, support each other and bring joy to their lives. We promise to do our best to do so.</p>

<p>Our activities are based on Christian values – respect for God, people and the environment in which we live. We believe that each of us is unique, has our own place, talents and value. Together we learn to accept each other, develop our abilities and create a community where everyone feels welcome.</p>

<p>Nothing will test your intention better than time... For more than 30 years, we have been trying to bring understanding, respect and love to life – simply what makes life more beautiful.</p>
',
                'year' => null,
                'position' => 1,
                'category' => 'about',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'title_sk' => 'Poslanie',
                'title_en' => 'Mission',
                'content_sk' => '
<p>Naším poslaním je prinášať radosť, podporu a príležitosti ľuďom so zdravotným znevýhodnením a ich rodinám. Robíme to cez hudbu, tvorivosť a spoločné zážitky.</p>

<ol>
<li>Budujeme spoločenstvo – vytvárame bezpečné a priateľské prostredie pre deti, mladých a dospelých so špeciálnymi potrebami a pre ich rodiny.</li>
<li>Podporujeme rozvoj a kreativitu – veríme, že každý má svoj talent a sny, ktoré si zaslúžia priestor na naplnenie.</li>
<li>Pomáhame, spájame a prepájame – stojíme pri ľuďoch so znevýhodnením, dávame im možnosť zažiariť a byť súčasťou spoločnosti.</li>
<li>Ukazujeme silu umenia – cez hudbu a vystúpenia búrame bariéry a prinášame pochopenie aj radosť všetkým, ktorí nás vnímajú.</li>
</ol>
',
                'content_en' => '
<p>Our mission is to bring joy, support and opportunities to people with disabilities and their families. We do this through music, creativity and shared experiences.</p>

<ol>
<li>We build community – we create a safe and friendly environment for children, youth and adults with special needs and their families.</li>
<li>We support development and creativity – we believe that everyone has their own talent and dreams that deserve space to be fulfilled.</li>
<li>We help, connect and interconnect – we stand with people with disabilities, giving them the opportunity to shine and be part of society.</li>
<li>We show the power of art – through music and performances we break down barriers and bring understanding and joy to all who perceive us.</li>
</ol>
',
                'year' => null,
                'position' => 2,
                'category' => 'about',
                'created_at' => now(),
                'updated_at' => now(),
            ],

                [
                    'title_sk' => 'Pravidelná činnosť',
                    'title_en' => 'Regular activities',
                    'content_sk' => '
<p>Každý týždeň sa stretávame v stredu, štvrtok a piatok v CIK CAK centre v Petržalke, kde prebiehajú muzikoterapeutické a komunitné stretnutia pre detí a mladých ľudí so znevýhodnením – spolu približne 30 účastníkov. Účastníci sú rozdelení do malých skupín, vo výnimočných prípadoch pracujeme individuálne alebo duálne. Štvrtky patria Kapele VOTUM a mladým z DSS Gaudeamus. Piatky sú komunitné.</p>

<p>Každý pondelok prebieha zdravotné plávanie, ktoré pomáha našim deťom v rozvoji pohybu aj sebadôvery (účasť závisí od záujmu a kapacity bazéna).</p>

<p>Raz do mesiaca sa stretávame aj vo Farnosti Kráľovnej rodiny na Teplickej ulici, kde hudobne sprevádzame svätú omšu a potom pokračujeme duchovným stretnutím s rozhovormi.</p>
',
                    'content_en' => '
<p>Every week we meet on Wednesday, Thursday and Friday at the CIK CAK center in Petržalka, where music therapy and community meetings for children and young people with disabilities take place - a total of approximately 30 participants. Participants are divided into small groups, in exceptional cases we work individually or dually. Thursdays belong to the VOTUM Band and young people from DSS Gaudeamus. Fridays are community.</p>

<p>Every Monday there is a health swimming session, which helps our children develop movement and self-confidence (participation depends on interest and pool capacity).</p>

<p>Once a month we also meet at the Royal Family Parish on Teplická Street, where we accompany the Holy Mass with music and then continue with a spiritual meeting with conversations.</p>
',
                    'year' => null,
                    'position' => 3,
                    'category' => 'about',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title_sk' => 'Komunitné a spoločenské aktivity',
                    'title_en' => 'Community and social activities',
                    'content_sk' => '
<p>Naše podujatia sú plné radosti, spevu, priateľstiev a spoločných zážitkov. Každý rok sa tešíme na:</p>
<ol>
<li>Letný kemp v Marianke – týždeň plný športu, hudby, tanca, tvorivých dielní a smiechu.</li>
<li>Letná slávnosť vo V-klube – koncert našich mladých pre rodičov, priateľov a podporovateľov. Stretnutie so staršími a menej aktívnymi členmi združenia.</li>
<li>Vianočná besiedka – spoločné rozlúčenie so starým rokom s programom, hudbou a pohostením.</li>
<li>Ozdravný pobyt v Chorvátsku – už viac ako 12 rokov spolu s rodinami trávime letnú dovolenku pri mori.</li>
<li>Farský ples – tradícia, ktorú si nenecháme ujsť! Zabávame sa spolu do rána a kapela VOTUM poteší tanečníkov svojim vystúpením.</li>
<li>Tvorivé stretnutia – obľúbené dielne pri výrobe adventných vencov, ktoré spájajú tvorivosť, vôňu ihličia a krásnu atmosféru.</li>
</ol>
',
                    'content_en' => '
<p>Our events are full of joy, singing, friendships and shared experiences. Every year we look forward to:</p>
<ol>
<li>Summer camp in Marianka – a week full of sports, music, dance, creative workshops and laughter.</li>
<li>Summer festival in V-club – a concert by our young people for parents, friends and supporters. Meeting with older and less active members of the association.</li>
<li>Christmas gathering – a joint farewell to the old year with a program, music and refreshments.</li>
<li>Healing stay in Croatia – for more than 12 years we have been spending summer holidays by the sea with our families.</li>
<li>Parish ball – a tradition that we do not miss! We have fun together until the morning and the VOTUM band will delight the dancers with their performance.</li>
<li>Creative meetings – popular workshops for making Advent wreaths that combine creativity, the scent of pine needles and a beautiful atmosphere.</li>
</ol>
',
                    'year' => null,
                    'position' => 4,
                    'category' => 'about',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'title_sk' => 'O muzikoterapii',
                    'title_en' => 'About music therapy',
                    'content_sk' => '
<p>V muzikoterapii nám ide o liečebný a podporný postup, v ktorom kvalifikovane prostredníctvom pomáhajúceho vzťahu, hudby a hudobných elementov sprevádzame klienta alebo skupinu terapeutickým procesom. Cieľom tohto procesu je relevantným spôsobom rozvinúť potenciál a obnoviť funkcie jedinca tak, aby mohol dosiahnuť lepšiu intrapersonálnu a/alebo interpersonálnu integráciu, s cieľom naplnenia jeho telesných, psychických, emocionálnych a sociálnych potrieb.</p>

<p>Na začiatku každého školského roka si pre každého klienta stanovíme individuálne ciele muzikoterapie – podľa jeho potrieb. V priebehu roka a na konci roka sa individuálne pozeráme, kam sa posunuli, čo nám muzikoterapia priniesla a ako sa ďalej rozvíjať. Učíme sa vidieť krásu malých krokov.</p>
',
                    'content_en' => '
<p>In music therapy, we are talking about a healing and supportive procedure in which we accompany a client or a group through a therapeutic process in a qualified way through a helping relationship, music and musical elements. The aim of this process is to develop the potential and restore the functions of the individual in a relevant way so that they can achieve better intrapersonal and/or interpersonal integration, with the aim of fulfilling their physical, psychological, emotional and social needs.</p>

<p>At the beginning of each school year, we set individual music therapy goals for each client - according to their needs. During the year and at the end of the year, we individually look at where they have moved, what music therapy has brought us and how to develop further. We learn to see the beauty of small steps.</p>
',
                    'year' => null,
                    'position' => 5,
                    'category' => 'about',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                ]);

        $mariaId = DB::table('sections')->insertGetId([

                    'title_sk' => 'Mgr. Mária Horváthová, DiS. Art.',
                    'title_en' => 'Mgr. Mária Horváthová, DiS. Art.',
                    'content_sk' => '<p>Predsedníčka združenia, liečebný pedagóg, muzikoterapeut</p>
<p>Mária je srdcom aj motorom združenia VOTUM. Začala s nami spolupracovať ešte ako praktikantka počas štúdia liečebnej pedagogiky na Univerzite Komenského v Bratislave v roku 2013. Po bakalárskom štúdiu pokračovala v sociálnej práci, ktorú ukončila magisterským titulom v roku 2016.</p>
<p>Hudba bola vždy jej vášňou, a tak sa prirodzene prepojila s muzikoterapiou – odborom, ktorý ju napĺňa a v ktorom sa neustále vzdeláva. Absolvovala dlhodobý kurz muzikoterapie u Mgr. et Mgr. Mateja Lipského, PhD. (2015–2017) a v súčasnosti študuje magisterský odbor Muzikoterapia na Univerzite Palackého v Olomouci pod vedením akreditovaných supervízorov.</p>
<p>Okrem toho je absolventkou Konzervatória Bratislava, kde študovala cirkevnú hudbu a hru na organe. Počas 11 rokov štúdia sa sólovo predstavila na mnohých koncertoch. V roku 2023 ukončila štúdium recitálom na Velehrade. V súčasnoti pôsobí ako organistka, spieva v zbore Konzervatória a aj sama vedie zbor ako zbormajsterka.</p>
<p>Vo VOTUMe sa stará nielen o muzikoterapiu, ale aj o celkový chod združenia – od organizácie koncertov, letných táborov a duchovných stretnutí až po komunikáciu s rodičmi, grantové žiadosti, web a sociálne siete. Od roku 2025 je predsedníčkou združenia VOTUM.</p>
<p>„Hudba je pre mňa mostom, ktorý spája ľudí, aj keď hovoria rôznymi jazykmi.“</p>',
                    'content_en' => '<p>Association President, Therapeutic Educator, Music Therapist</p>
<p>Mária is the heart and engine of the VOTUM association. She started working with us as an intern while studying therapeutic pedagogy at Comenius University in Bratislava in 2013. After her bachelor\'s degree, she continued her social work, graduating with a master\'s degree in 2016.</p>
<p>Music has always been her passion, so she naturally connected with music therapy – a field that fulfills her and in which she is constantly educating herself. She completed a long-term music therapy course with Mgr. et Mgr. Matej Lipský, PhD. (2015–2017) and is currently studying for a master\'s degree in Music Therapy at Palackého University in Olomouc under the guidance of accredited supervisors.</p>
<p>In addition, she is a graduate of the Bratislava Conservatory, where she studied church music and organ playing. During her 11 years of study, she performed solo at many concerts. In 2023, she completed her studies with a recital in Velehrad (CZ). Currently, she works as an organist, sings in the Conservatory choir, and also leads the choir as a choirmaster.</p>
<p>At VOTUM, she not only takes care of music therapy, but also of the overall operation of the association – from organizing concerts, summer camps and spiritual meetings to communicating with parents, grant applications, the website and social networks. Since 2025, she has been the president of the VOTUM association.</p>
<p>“For me, music is a bridge that connects people, even if they speak different languages.”</p>',
                    'year' => null,
                    'position' => 1,
                    'category' => 'team',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

        DB::table('files')->insert([
            'section_id' => $mariaId,
            'event_id' => null,
            'url' => 'images/team/Maria.jpg',
            'type' => 'image',
            'title_sk' => 'Mgr. Mária Horváthová, DiS. Art.',
            'title_en' =>'Mgr. Mária Horváthová, DiS. Art.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        $renataId = DB::table('sections')->insertGetId([
                    'title_sk' => 'Renáta Štaffová',
                    'title_en' => 'Renáta Štaffová',
                    'content_sk' => '<p>Administrátorka, asistentka, organizátorka s veľkým srdcom</p>
<p>Renáta je človek, ktorý spája VOTUM, prakticky aj ľudsky. Dlhé roky pôsobila ako SZČO v oblasti marketingu, manažmentu a eventov. Vďaka tejto práci získala skúsenosti s organizáciou podujatí, komunikáciou, tvorbou obsahu aj správou sociálnych sietí.</p>
<p>V osobnom živote je predovšetkým mama dieťaťa so znevýhodnením a práve to jej prináša hlboké porozumenie potrebám našich mladých a ich rodičov.</p>
<p>Vo VOTUMe sa stará o financie, dokumentáciu, účtovné podklady, projekty, sociálne siete aj o praktické detaily, bez ktorých by sa naše podujatia neuskutočnili. Organizačné kurzy plávania, presuny, technika – vždy vie, čo práve treba.</p>
<p>Je súčasťou združenia od roku 2010 a od roku 2022 tu pôsobí ako zamestnankyňa na čiastočný úväzok.</p>
<p>„Každý deň, keď vidím úsmev našich mladých, viem, že to, čo robíme, má zmysel.“</p>',
                    'content_en' => '<p>Administrator, assistant, organizer with a big heart</p>
<p>Renáta is the person who connects VOTUM, practically and humanly. For many years she worked as a self-employed person in the field of marketing, management and events. Thanks to this work, she gained experience in organizing events, communication, content creation and social media management.</p>
<p>In her personal life, she is primarily a mother of a child with a disability, and this gives her a deep understanding of the needs of our young people and their parents.</p>
<p>At VOTUM, she takes care of finances, documentation, accounting documents, projects, social networks and practical details, without which our events would not take place. She also organizes swimming courses, helps with transfers, technology and always knows what is needed.</p>
<p>She has been part of the association since 2010 and has been working here as a part-time employee since 2022.</p>
<p>“Every day, when I see the smiles of our young people, I know that what we do has meaning.”</p>',
                    'year' => null,
                    'position' => 2,
                    'category' => 'team',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

        DB::table('files')->insert([
            'section_id' => $renataId,
            'event_id' => null,
            'url' => 'images/team/Renata.jpg',
            'type' => 'image',
            'title_sk' => 'Renáta Štaffová',
            'title_en' =>'Renáta Štaffová',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        $janaId = DB::table('sections')->insertGetId([
                    'title_sk' => 'Ing. Jana Hodeková',
                    'title_en' => 'Ing. Jana Hodeková',
                    'content_sk' => '<p>Zakladateľka združenia VOTUM</p>
<p>Janka stála pri zrode Združenia, keď sa skupina mamičiek v roku 1993 rozhodla vytvoriť miesto, kde by sa deti – aj tie so špeciálnymi potrebami – cítili prijaté a šťastné.</p>
<p>Vďaka jej odhodlaniu a vízii vznikol základ dnešného VOTUMu. Združenie viedla na jeho čele vyše 30 rokov. Vďaka Jankinému šarmu a srdečnosti prišlo do Votumu veľa ľudí ochotných pomáhať. Budovala povedomie o VOTUMe 25 benefičných plesov a prostredníctvom mnohých kultúrnych podujatí nielen v Devínskej Novej Vsi. Vždy mala veľmi blízko k všetkým Votumákom a prakticky sa starala o ich potreby.</p>
<p>Od roku 2002 Janka spolupracuje s Radou pre poradenstvo v sociálnej práci. Ako konzultantka nabáda zariadenia ku zvyšovaniu kvality sociálnych služieb a deinštitucionalizácii.</p>
<p>Stále zostáva dôležitou súčasťou nášho spoločenstva a je pre nás inšpiráciou svojím nasadením, otvorenosťou, láskou a pokorou.</p>
<p>“Votumáci sú mojou srdcovou záležitosťou.”</p>',
                    'content_en' => '<p>Founder of the VOTUM Association</p>
<p>Janka was at the birth of the Association, when a group of mothers decided in 1993 to create a place where children – even those with special needs – would feel accepted and happy.</p>
<p>Thanks to her determination and vision, the foundation of today\'s VOTUM was created. She led the Association for over 30 years. Thanks to Janka\'s charm and warmth, many people willing to help came to VOTUM. She built awareness of VOTUM through 18 benefit balls and through many cultural events not only in Devínska Nová Ves. She was always very close to all Votumáci and practically took care of their needs.</p>
<p>Janka has been working with the Social Work Advisory Council since 2002. As a consultant, she encourages facilities to improve the quality of social services and deinstitutionalize.</p>
<p>“Votumáci are a matter of my heart.”</p>',
                    'year' => null,
                    'position' => 3,
                    'category' => 'team',
                    'created_at' => now(),
                    'updated_at' => now(),
        ]);

        DB::table('files')->insert([
            'section_id' => $janaId,
            'event_id' => null,
            'url' => 'images/team/Jana.jpg',
            'type' => 'image',
            'title_sk' => 'Ing. Jana Hodeková',
            'title_en' => 'Ing. Jana Hodeková',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('sections')->insert([
            'title_sk' => 'Výbor združenia',
            'title_en' => 'Association Committee',
            'content_sk' => "
<ul>
    <li>Mária Horváthová – predsedníčka, štatutár</li>
    <li>Renáta Štaffová – člen</li>
    <li>Radoslava Blizniaková – člen</li>
    <li>Jana Hodeková – člen</li>
    <li>Eva Rakovská – člen</li>
    <li>Mária Komarová – kontrolór</li>
</ul>

<p>V minulosti tvorili VOTUM mnohí inšpiratívni ľudia a celé rodiny. Skupina priateľov a rodín, ktorí si boli nápomocní a spoločne sa pričinili o toto dielo.</p>

<p>Ďakujeme: Hodekovcom, Švecovcom, Wűrflovcom, Katke Horváthovej, Zuzane Vitekovej, Lucii Štasselovej, Savkovcom, Táni Kuzmovej, Hajkovcom, Drábikovcom, pani Taubnerovej, Deličovcom, biskupovi Haľkovi, Slavovi Jurkovi, množstvu dobrovoľníkov a všetkým ľuďom, ktorí vďaka svojej dobrej vôli budovali, alebo budujú VOTUM.</p>
",
            'content_en' => "
<ul>
    <li>Mária Horváthová – Chairwoman, Statutory Officer</li>
    <li>Renáta Štaffová – Member</li>
    <li>Radoslava Blizniaková – Member</li>
    <li>Jana Hodeková – Member</li>
    <li>Eva Rakovská – Member</li>
    <li>Mária Komarová – Controller</li>
</ul>

<p>In the past, VOTUM was formed by many inspiring people and entire families. A group of friends and families who helped each other and contributed together to this work.</p>

<p>We thank: family Hodek, Švec, Wűrfl, Katka Horváth, Zuzana Vitek, Lucia Štassel, family Savko, Tána Kuzmová, family Hajko, Drábik, Mrs. Taubnerová, family Delič, Bishop Haľko, Slavo Jurko, the many volunteers and all the people who, thanks to their good will, built or are building VOTUM.</p>
",
            'year' => null,
            'position' => 99,
            'category' => 'team',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


    }
}
