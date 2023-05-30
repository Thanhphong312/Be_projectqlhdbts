@extends('layouts.app')


@section('page-title', $title)

@section('message')
@include('partials.messages')
@endsection

@section('content')
<div class="content-main">
    <!-- start search -->
    @include('partials.common.search')
    <!-- end    
    <!--
    <!--  start slide bar  -->
    <div class="wrapper">
        <!-- Sidebar  -->
        @include('partials.common.slide-bar')

Page Content  -->

Page Content          -->
        
    </div>
    <!-- end slide bar -->
</div>
@endsection

@section('JS')
@endsectionection