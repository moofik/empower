<?php


namespace App\Service\Monitoring;


use Laravel\Telescope\EntryType;
use Laravel\Telescope\IncomingEntry;
use Laravel\Telescope\Telescope;

/**
 * Class TelescopeMonitor
 * @package App\Service\Monitoring
 * Stateless monitoring manager service
 */
class TelescopeMonitor
{
    /**
     * @return bool
     */
    private static function shouldMonitor(): bool
    {
        return env('APP_PERFORMANCE_MONITORING', false);
    }

    /**
     * @param  string  $monitoringTag
     * @param  bool  $timestampTag
     */
    public static function tagDatabaseQueries(string $monitoringTag, $timestampTag = true): void
    {
        if (self::shouldMonitor()) {
            Telescope::tag(function (IncomingEntry $entry) use ($monitoringTag, $timestampTag) {
                if ($entry->type === EntryType::QUERY) {
                    $result = [$monitoringTag];

                    if ($timestampTag) {
                       $result[] = date('Y-m-d H:m:s');
                    }

                    return $result;
                }

                return [];
            });
        }
    }
}
