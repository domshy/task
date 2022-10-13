<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    protected $table = 'announcement';
    protected $fillable = ['title', 'description', 'posted_by', 'start_date', 'end_date'];
}
