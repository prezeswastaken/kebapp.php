<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdminLogResource;
use App\Models\AdminLog;

class AdminLogController extends Controller
{
    public function index()
    {
        $perPage = 10;

        return AdminLogResource::collection(AdminLog::orderBy('id', 'desc')->paginate($perPage));
    }
}
