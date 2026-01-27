<?php

namespace App\Helpers;

use HTMLPurifier;
use HTMLPurifier_Config;

class HtmlSanitizer
{
    public static function clean($html)
    {
        if (empty($html)) {
            return $html;
        }

        $config = HTMLPurifier_Config::createDefault();

        // Rozšírené povolené HTML tagy vrátane Quill tried
        // img[src|alt|width|height] - povolíme obrázky ak ich Quill používa
        $config->set('HTML.Allowed', 'p,strong,em,u,ol,ul,li,a[href|target],h1,h2,h3,h4,br,span[class],img[src|alt|width|height]');

        // Povolené atribúty
        $config->set('HTML.AllowedAttributes', 'a.href,a.target,span.class,img.src,img.alt,img.width,img.height');

        // Povolené CSS triedy (pre Quill formátovanie)
        $config->set('Attr.AllowedClasses', 'ql-align-center,ql-align-right,ql-align-justify,ql-indent-1,ql-indent-2,ql-indent-3,ql-indent-4,ql-indent-5,ql-indent-6,ql-indent-7,ql-indent-8,list-decimal,pl-6,space-y-2,font-semibold,text-votum-blue,mt-4');

        // Automaticky pridá target="_blank" rel="noopener noreferrer" pre bezpečnosť
        $config->set('HTML.TargetBlank', true);

        // Zakáže nebezpečné elementy
        $config->set('HTML.ForbiddenElements', 'script,iframe,object,embed');

        // Encoding
        $config->set('Core.Encoding', 'UTF-8');

        // AutoParagraph vypneme, aby Quill mohol spravovať vlastné <p> tagy
        $config->set('AutoFormat.AutoParagraph', false);

        $purifier = new HTMLPurifier($config);

        return $purifier->purify($html);
    }
}
