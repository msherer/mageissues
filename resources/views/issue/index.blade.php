@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 rounded" style="background-color: #fff;border: 1px solid #ffa500; padding-bottom: 10px; padding-top: 10px;">
                @foreach ($errors as $error)
                    <p>{{ $error }}</p>
                @endforeach

                <div class="row mb-2">
                    <div class="col-8"><span class="align-middle" style="line-height: 2.3;">My Issues</span></div>
                    <div class="col-4"><a href="{{ url('/user/issue/create') }}" class="btn btn-light float-right" style="border: 1px solid #ffa500;">Create Issue</a></div>
                </div>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Tags</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($issues as $issue)
                    <tr>
                        <th scope="row">{{ $issue->id }}</th>
                        <td>{{ $issue->title }}</td>
                        <td>{{ $issue->created_at }}</td>
                        <td>{{ $issue->updated_at }}</td>
                        <td>
                            @foreach ($issue->tags as $tag)
                                <span class="p-1 rounded" style="border: 1px solid #ffa500;">{{ $tag['name'] }}</span>
                            @endforeach
                        </td>
                        <td><a href="{{ url('/user/issue/' . $issue->id) }}" class="btn btn-light float-right" style="border: 1px solid #ffa500;">View Issue</a></td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
