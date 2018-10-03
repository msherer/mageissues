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
                    <div class="col-9 mb-3 float-left">
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
                            <div class="col-12 pl-3 p-2 border-bottom">
                                {{ $issue->description }}
                            </div>
                            <div class="col-12 pl-3 p-2">
                                {{ $issue->code }}
                            </div>
                        </div>
                    </div>

                    <div class="col-3 mb-3 float-left">
                        <div class="rounded shadow-sm bg-white">
                            <div class="col-12">
                                <h5 class="pt-3 mb-1 font-weight-bold">
                                    Stats
                                </h5>
                                <div class="offset-1">
                                    33: hearts of joy<br/>
                                    1: like(s)<br/>
                                    3298: eye(s) of kilrogg
                                </div>
                            </div>
                            <div class="col-12">
                                <h5 class="pt-3 mb-1">
                                    Tags
                                </h5>
                                    @foreach ($issue->tags as $tag)
                                    <div class="offset-1 mb-3 mt-3">
                                        <span><a href="#" style="color: #ffa500;">{{ ucwords($tag['name']) }}</a></span>
                                    </div>
                                    @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
