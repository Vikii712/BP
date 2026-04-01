<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Backup;

class AdminBackupController extends Controller
{
    public function create()
    {
        $config = config('database.connections.pgsql');
        $filename = 'backup_' . now()->format('Y-m-d_H-i-s') . '.sql';
        $dir = storage_path('app/laravel-backup');

        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        $path = $dir . '\\' . $filename;
        $pgdump = 'C:\\Program Files\\PostgreSQL\\18\\bin\\pg_dump.exe';

        $command = sprintf(
            'set PGPASSWORD=%s && "%s" -h %s -p %s -U %s %s > "%s" 2>&1',
            escapeshellarg($config['password']),
            $pgdump,
            $config['host'],
            $config['port'],
            $config['username'],
            $config['database'],
            $path
        );

        shell_exec($command);

        if (file_exists($path) && filesize($path) > 0) {
            Backup::create([
                'file_name' => $filename,
                'created_at' => now(),
            ]);
            return back()->with('success', 'Záloha bola vytvorená.');
        }

        return back()->with('error', 'Záloha sa nevytvorila.');
    }
}
