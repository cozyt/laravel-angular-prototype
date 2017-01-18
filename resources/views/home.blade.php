@extends('layouts.app')

@section('content')
<div
 class="container"
 ng-controller="Tickets"
 ng-init="api={{ json_encode($api) }}"
>

    <div class="row">
        <div class="col-md-4">
            @include('regions.create-ticket')
        </div>
        <div class="col-md-8">
            @include('regions.ticket-listing')
            @include('regions.ticket-redemption')
            <br>
        </div>
    </div>

</div>
@endsection

@section('angular-scripts')
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-sanitize.js"></script>
<script src="{{ asset('js/tickets.js') }}"></script>
@endsection
