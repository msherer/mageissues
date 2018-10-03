<?php

namespace App\Http\Controllers;

use App\Issue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class IssueController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issues = Issue::orderBy('id', 'DESC')->get();

        return view('issue.index')->with('issues', $issues);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('issue.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //'title', 'description', 'code', 'categories', 'tags'
        $rules = array(
            'title'       => 'required',
            'description' => 'required',
            'code'        => 'required',
            'publisher'   => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('user/issue/create')
                ->withErrors($validator)
                ->withInput(Input::all());
        }

        if (Input::get('tags')) {
            $tags = Input::get('tags');
            $tags = explode(',', $tags);
        }

        var_dump($tags);

        $issue = new Issue;
        $issue->title       = Input::get('title');
        $issue->description = Input::get('description');
        $issue->code        = Input::get('code');
        $issue->publisher   = Input::get('publisher');
        $issue->save();


        $issue->tag($tags);
        $issue->save();

        // redirect
        Session::flash('message', 'Successfully created issue!');
        return Redirect::to('user/issue');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function show(Issue $issue)
    {
        $issue = Issue::find($issue->id);

        return view('issue.issue')->with('issue', $issue);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function edit(Issue $issue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Issue $issue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Issue $issue)
    {
        //
    }

    /**
     * Search all issues for results
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $search = Input::post('q');
        $issues = Issue::withTag($search)->get();

        return view('index')->with('issues', $issues);
    }
}
