<?php

namespace App\Security;

class ContentSecurityPolicy
{
    public static function front(string $nonce, bool $isDev = false): string
    {
        $directives = [
            "default-src 'self'",
            "base-uri 'self'",
            "form-action 'self'",
            "frame-ancestors 'self'",
            "object-src 'none'",
            "script-src 'self' 'nonce-{$nonce}'" . ($isDev
                ? " http://127.0.0.1:5173 http://localhost:5173 'unsafe-eval'"
                : ""),

            "style-src 'self' 'nonce-{$nonce}'" . ($isDev
                ? " http://127.0.0.1:5173 http://localhost:5173"
                : ""),

            "connect-src 'self'" . ($isDev
                ? " ws://127.0.0.1:5173 ws://localhost:5173 http://127.0.0.1:5173 http://localhost:5173"
                : ""),
            "img-src 'self' data: blob:",
            "font-src 'self' data:" . ($isDev
                ? " http://127.0.0.1:5173 http://localhost:5173"
                : ""),
            "media-src 'self' blob:",
            "frame-src 'self' https://www.youtube-nocookie.com",
            "worker-src 'self' blob:",
            "manifest-src 'self'",
            "upgrade-insecure-requests",
        ];

        return implode('; ', $directives);
    }

    public static function admin(string $nonce, bool $isDev = false): string
    {
        $directives = [
            "default-src 'self'",
            "base-uri 'self'",
            "form-action 'self'",
            "frame-ancestors 'self'",
            "object-src 'none'",
            "script-src 'self' 'nonce-{$nonce}'" . ($isDev
                ? " http://127.0.0.1:5173 http://localhost:5173 'unsafe-eval'"
                : ""),

            "style-src 'self' 'nonce-{$nonce}'" . ($isDev
                ? " http://127.0.0.1:5173 http://localhost:5173"
                : ""),

            "connect-src 'self'" . ($isDev
                ? " ws://127.0.0.1:5173 ws://localhost:5173 http://127.0.0.1:5173 http://localhost:5173"
                : ""),
            "img-src 'self' data: blob:",
            "font-src 'self' data:" . ($isDev
                ? " http://127.0.0.1:5173 http://localhost:5173"
                : ""),
            "media-src 'self' blob:",
            "frame-src 'self' https://www.youtube-nocookie.com",
            "worker-src 'self' blob:",
            "manifest-src 'self'",
            "upgrade-insecure-requests",
        ];

        return implode('; ', $directives);
    }
}
