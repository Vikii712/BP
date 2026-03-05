<?php

namespace App\Csp\Policies;

use Spatie\Csp\Directive;
use Spatie\Csp\Policies\Policy;

class ContentSecurityPolicy extends Policy
{
    public function configure(): void
    {
        $this
            ->addDirective(Directive::DEFAULT_SRC, 'self')
            ->addDirective(Directive::SCRIPT_SRC, 'self', 'https://cdnjs.cloudflare.com')
            ->addDirective(Directive::STYLE_SRC, 'self', 'https://cdnjs.cloudflare.com', 'unsafe-inline')
            ->addDirective(Directive::IMG_SRC, 'self', 'data:')
            ->addDirective(Directive::FONT_SRC, 'self', 'https://cdnjs.cloudflare.com');
    }
}
