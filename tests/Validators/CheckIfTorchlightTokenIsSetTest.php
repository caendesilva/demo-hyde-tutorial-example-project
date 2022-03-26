<?php

use Illuminate\Contracts\Console\Kernel;
use Hyde\Framework\Features;

$app = require __DIR__.'/../../bootstrap/app.php';
$app->make(Kernel::class)->bootstrap();

if (Features::hasTorchlight(true)) {
    test('check if torchlight token is set', function () {
        $assertion = Features::hasTorchlight();
        if (!$assertion) {
            $this->addWarning('Torchlight is enabled in the config, but an API token could not be found in the dotenv file.');
        } else {
            $this->assertTrue($assertion);
        }
    })->group('validators');
}