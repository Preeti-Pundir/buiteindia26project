<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add new customer </title>
    {{-- <link rel='stylesheet' herf="{{asset('styles/css/bootstrap.min.css')}}"> --}}
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="form-group">
                 <form>
                    {{-- <form action="{{route(customer.save)}}" method='post'> 
                        
                        @csrf
                       <h1>Add new customer</h1>
                       <div>
                        @php
                           $email = user_email();
                        @endphp
                   `
                           {{ $email }}php  --}}
                          
                           
                    </div>
                        <div class="form-group">
                            <label for="customer">Customer</label>
                            <input type="text" name="name" id="name" >
                        </div>

                        <div class="form-group">
                            <label for="customer">customer_id</label>
                            <input type="text" name="customer_id" id="customer_id" >
                        </div>

                        <button type='submit' class="btn-btn-primary btn block">submit</button>
                    </form>
                 
                </div>

            </div>

        </div>
    </div>
</body>
</html> 