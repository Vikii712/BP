<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeEditController extends Controller
{
    public function edit()
    {
        return view('pages.admin.home-edit', [
            'data' => [
                'sk' => [
                    'motto' => 'Spolu meníme životy k lepšiemu',
                    'intro' => 'Združenie VOTUM pomáha ľuďom s detskou mozgovou obrnou...',
                    'hero_image' => 'img123.jpg',
                    'hero_alt' => 'Účastníci letného stretnutia združenia VOTUM',
                    'team_image' => 'team.jpg',
                    'team_alt' => 'Tím združenia VOTUM',
                ],
                'en' => [
                    'motto' => 'Together we change lives for the better',
                    'intro' => 'VOTUM association supports people with cerebral palsy...',
                    'hero_image' => 'img123.jpg',
                    'hero_alt' => 'Participants of the VOTUM summer meeting',
                    'team_image' => 'team.jpg',
                    'team_alt' => 'VOTUM association team',
                ],
            ],
        ]);
    }
    public function update()
    {
        return $this->edit();
    }
}
