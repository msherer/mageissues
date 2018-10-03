@extends('layouts.app')

@section('content')
    <style type="text/css">
        a:hover {
            color: #ffa500 !important;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 rounded" >
                @foreach ($errors as $error)
                    <p>{{ $error }}</p>
                @endforeach

                <div class="row">
                    @foreach ($issues as $issue)
                        <div class="col-4 mb-3">
                            <div class="rounded shadow-sm bg-white">
                                <div class="col-12">
                                    <h3 class="pt-3 mb-0">
                                        <a href="{{ url('/user/issue/' . $issue->id) }}" style="color: #000;">{{ $issue->title }}</a>
                                    </h3>
                                </div>
                                <div class="col-12 pb-1 border-bottom">
                                    <small class="text-muted mt-3">publisher: <a href="#" style="color: #ffa500">{{ $issue->publisher }}</a></small>
                                </div>
                                <div class="col-12 pl-3 p-2 border-bottom">
                                    <span class="text-muted" style="font-size: 12px;">Submitted {{ $issue->originMonth }} months ago</span>
                                </div>
                                <div class="col-12 pl-3 p-2">
                                    @foreach ($issue->tags as $tag)
                                        <span class="pl-1 pr-1 rounded" style="font-size: 12px; border: 1px solid #ffa500;">{{ $tag['name'] }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
