<?php

namespace Publipresse\Forms\Classes;

use Publipresse\Forms\Models\Record;

class UnreadRecords
{
    public static function getTotal()
    {
        $unread = Record::where('unread', 1)->count();
        return ($unread > 0) ? $unread : null;
    }
}
