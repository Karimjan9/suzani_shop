<?php

declare(strict_types=1);

$projectRoot = dirname(__DIR__);
$isWindows = PHP_OS_FAMILY === 'Windows';

$processes = [
    [
        'name' => 'server',
        'color' => '#93c5fd',
        'command' => 'php artisan serve',
    ],
    [
        'name' => 'queue',
        'color' => '#c4b5fd',
        'command' => 'php artisan queue:listen --tries=1 --timeout=0',
    ],
];

if (! $isWindows) {
    $processes[] = [
        'name' => 'logs',
        'color' => '#fb7185',
        'command' => 'php artisan pail --timeout=0',
    ];
}

$processes[] = [
    'name' => 'vite',
    'color' => '#fdba74',
    'command' => 'npm run dev',
];

$command = [
    'npx',
    'concurrently',
    '-c',
    implode(',', array_column($processes, 'color')),
];

foreach ($processes as $process) {
    $command[] = $process['command'];
}

$command[] = '--names';
$command[] = implode(',', array_column($processes, 'name'));
$command[] = '--kill-others';

if ($isWindows) {
    $commandString = 'npx concurrently';
    $commandString .= ' -c "'.implode(',', array_column($processes, 'color')).'"';

    foreach ($processes as $process) {
        $commandString .= ' "'.$process['command'].'"';
    }

    $commandString .= ' --names "'.implode(',', array_column($processes, 'name')).'"';
    $commandString .= ' --kill-others';

    $command = $commandString;
}

$descriptors = [
    0 => STDIN,
    1 => STDOUT,
    2 => STDERR,
];

$child = proc_open($command, $descriptors, $pipes, $projectRoot);

if (! is_resource($child)) {
    fwrite(STDERR, "Unable to start the dev processes.\n");
    exit(1);
}

$exitCode = proc_close($child);

exit(is_int($exitCode) ? $exitCode : 1);
