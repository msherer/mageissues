<?php

namespace App\Http\Controllers;

use App\Issue;
use DateTime;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issues = Issue::orderBy('id', 'DESC')->get();

        foreach ($issues as $issue) {
            $createdAtParts = explode(' ', $issue->created_at);
//            $createdAtParts = explode('-', $issue->created_at);
//            $dateObj   = DateTime::createFromFormat('!m', $createdAtParts[1]);
//            $monthName = $dateObj->format('F'); // March
            $datetime1 = date_create($createdAtParts[0]);
            $datetime2 = date_create(date("Y-m-d"));
            $interval = date_diff($datetime1, $datetime2);
            $date = $interval->m + ($interval->y * 12);
            $issue->originMonth = $date;
        }

        return view('index')->with('issues', $issues);
    }
}
