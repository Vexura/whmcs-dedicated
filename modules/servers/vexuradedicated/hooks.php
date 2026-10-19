<?php
declare(strict_types=1);
if (!defined('WHMCS')) { exit('Direct access is not permitted.'); }
require_once __DIR__.'/bootstrap.php';
use Vexura\Whmcs\Dedicated\Module;
use Vexura\Whmcs\Dedicated\Registrar;
use Vexura\Whmcs\Dedicated\Automation;

add_hook('InvoiceCreated', 1, static function (array $vars): void { Automation::snapshot('dedicated', (int) $vars['invoiceid']); });
add_hook('InvoicePaid', 1, static function (array $vars): void { Automation::paid('dedicated', (int) $vars['invoiceid']); });
add_hook('AfterCronJob', 1, static function (array $vars): void { Automation::cron('dedicated'); });
