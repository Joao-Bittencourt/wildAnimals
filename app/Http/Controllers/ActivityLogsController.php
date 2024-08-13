<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;

class ActivityLogsController extends Controller
{
    public function index()
    {
        return view('activityLogs.list', [
            'logs' => ActivityLog::paginate(Controller::DEFAULT_PAGE_SIZE)
        ]);
    }

    public function show(int $activityLogId)
    {
        $activityLog = ActivityLog::find($activityLogId);

        return view('activityLogs.show', [
            'activityLog' => $activityLog
        ]);
    }
}
