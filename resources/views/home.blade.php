@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    @if(auth()->user()->subscribed())

                        <p>Great! You are subscribed!!</p>
                        @if(auth()->user()->subscription()->active())

                            <p>You have an active subscription that ends in {{auth()->user()->subscription()->daysLeft()}} days.</p>
                            @if(auth()->user()->subscription()->renews())
                                <p>Your sub will renew on: {{auth()->user()->subscription()->endsAt()}}. <a href="{{route('billing.cancel')}}">Cancel Now</a></p>
                            @else
                                <p>Your subscription will not renew. <a href="{{route('billing.restart')}}">Restart Now</a> </p>
                            @endif
                        @endif
                    @else
                            <p>You are not subscribed. <a href="{{route('billing.plans')}}">Choose a plan here</a></p>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
