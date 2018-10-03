@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 rounded" style="background-color: #fff;border: 1px solid #ffa500; padding-bottom: 10px; padding-top: 10px;">
            @foreach ($errors as $error)
                <p>{{ $error }}</p>
            @endforeach

            <form method="post" action="{{ url('user/issue') }}">
                {{ csrf_field() }}

                <input type="hidden" name="publisher" value="{{ Auth::user()->name }}"/>
                <div class="form-group">
                    <label for="issue-title">Title</label>
                    <input type="text" name="title" class="form-control" id="issue-title" aria-describedby="titleHelp" placeholder="Enter title">
                    <small id="titleHelp" class="form-text text-muted">Give your issue a relevant name.</small>
                </div>
                <div class="form-group">
                    <label for="issue-description">Description</label>
                    <textarea name="description" class="form-control" id="issue-description" placeholder="Give a detailed description of the issue" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="issue-editor">Issue Code:</label>
                    <textarea name="code" class="form-control" id="issue-editor" placeholder="Give a detailed description of the issue" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="issue-tags">Tags</label>
                    <input type="text" name="tags" class="form-control" id="issue-tags" aria-describedby="tagHelp" placeholder="Enter tags">
                    <small id="tagHelp" class="form-text text-muted">Throw some tags on to make this easier to find!</small>
                </div>
                <button type="submit" class="btn btn-light" style="border: 1px solid #ffa500;">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
