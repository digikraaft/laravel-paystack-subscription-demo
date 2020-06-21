<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Billing Plans</title>
</head>
<body>

<h1 class="text-center">Choose any of the plans</h1>

@if($plans)
    <div class="card-group">
        @foreach($plans as $plan)
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title text-center">{{$plan->name}}</h5>
                    <h3 class="text-center">{{$plan->currency}} {{($plan->amount)/100}}</h3>
                    <p class="card-text">{{$plan->description}}</p>
                    <form action="{{route('billing.process')}}" method="POST" >
                        {{ csrf_field() }}
                        <script
                            src="https://js.paystack.co/v1/inline.js"
                            data-key="{{env('PAYSTACK_PUBLIC_KEY')}}"
                            data-email="{{Auth::user()->email}}"
                            data-plan="{{($plan->plan_code)}}"
                            data-ref="DK_SUB_{{time()}}_{{$plan->id}}"
                            >
                        </script>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endif
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
