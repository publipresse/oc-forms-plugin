<?php

namespace Publipresse\Forms\Classes;

use Flash;
use Carbon\Carbon;
use Publipresse\Forms\Models\Record;
use Publipresse\Forms\Models\Settings;

class GDPR
{
    public static function cleanRecords()
    {
        $gdpr_enable = Settings::get('gdpr_enable', false);
        $gdpr_days   = Settings::get('gdpr_days', false);

        if (!$gdpr_enable) {
            Flash::error(__('GDPR options are disabled'));
            return;
        }

        if ($gdpr_enable && is_numeric($gdpr_days)) {
            $days = Carbon::now()->subDays($gdpr_days);
            $rows = Record::whereDate('created_at', '<', $days)->forceDelete();
            return $rows;
        }

        Flash::error(__('Invalid GDPR days setting value'));
    }
}
