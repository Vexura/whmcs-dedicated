<?php
declare(strict_types=1);
if (!defined('WHMCS')) { exit('Direct access is not permitted.'); }
require_once __DIR__.'/bootstrap.php';
use Vexura\Whmcs\Dedicated\Module;
use Vexura\Whmcs\Dedicated\Registrar;
use Vexura\Whmcs\Dedicated\Automation;

/** Dedicated Server: WHMCS MetaData callback. */
function vexuradedicated_MetaData(): array
{
    return ['DisplayName' => 'Vexura · Dedicated Server', 'APIVersion' => '1.1', 'RequiresServer' => true, 'DefaultSSLPort' => 443];
}

/** Dedicated Server: WHMCS ConfigOptions callback. */
function vexuradedicated_ConfigOptions(): array
{
    return Module::config('dedicated');
}

/** Dedicated Server: WHMCS TestConnection callback. */
function vexuradedicated_TestConnection(array $params): array
{
    return Module::connection($params);
}

/** Dedicated Server: WHMCS ClientArea callback. */
function vexuradedicated_ClientArea(array $params): array
{
    return Module::clientArea('dedicated', $params);
}

/** Dedicated Server: WHMCS AdminCustomButtonArray callback. */
function vexuradedicated_AdminCustomButtonArray(): array
{
    return ['Bereitstellung prüfen' => 'RefreshStatus', 'Bezahlte Rechnungen abgleichen' => 'SyncPaidInvoices'];
}

/** Dedicated Server: WHMCS CreateAccount callback. */
function vexuradedicated_CreateAccount(array $params): string
{
    return Module::run('dedicated', 'create', $params);
}

/** Dedicated Server: WHMCS RefreshStatus callback. */
function vexuradedicated_RefreshStatus(array $params): string
{
    return Module::run('dedicated', 'create', $params);
}

/** Dedicated Server: WHMCS SyncPaidInvoices callback. */
function vexuradedicated_SyncPaidInvoices(array $params): string
{
    return Module::run('dedicated', 'sync', $params);
}

/** Dedicated Server: WHMCS TerminateAccount callback. */
function vexuradedicated_TerminateAccount(array $params): string
{
    return Module::run('dedicated', 'terminate', $params);
}

/** Dedicated Server: WHMCS SuspendAccount callback. */
function vexuradedicated_SuspendAccount(array $params): string
{
    return Module::run('dedicated', 'suspend', $params);
}

/** Dedicated Server: WHMCS UnsuspendAccount callback. */
function vexuradedicated_UnsuspendAccount(array $params): string
{
    return Module::run('dedicated', 'unsuspend', $params);
}
