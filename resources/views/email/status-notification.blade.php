<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>

        <div class="container" style="width: 50%;">
            <div class="row" style="background-color:#222; height: 50px; margin-bottom: 5px; color: white;"> 
                <div class="col" style="font-size: 30px; text-align: left">
                    NOIE
                </div>   
            </div>
            <div class="row"> 
                <div class="col" style="font-weight: bold;">
                    Hi {{$details->cust_name}},
                </div>
            </div>
            <div class="row"> 
                <div class="col">
                    Your transaction in now 
                </div>
            </div>
            <br>
            <table class="table table-bordered">
                <tr> 
                    <td>Invoice Id</td>
                    <td>{{$details->transaction_id}}</td>
                </tr>
                <tr> 
                    <td>Customer Name</td>
                    <td>{{$details->cust_name}}</td>
                </tr>
                <tr> 
                    <td>Phone Number</td>
                    <td>{{$details->cust_phone}}</td>
                </tr>
                <tr> 
                    <td>Product Name</td>
                    <td>{{$details->product_name}}</td>
                </tr>
                <tr> 
                    <td>Price</td>
                    <td>Rp {{number_format($details->unique_price)}}</td>
                </tr>
                <tr> 
                    <td>Address</td>
                    <td>{{$details->cust_address}}</td>
                </tr>
                <tr> 
                    <td>City</td>
                    <td>{{$details->cust_city}}</td>
                </tr>
                <tr> 
                    <td>State</td>
                    <td>{{$details->cust_state}}</td>
                </tr>
                <tr> 
                    <td>Zipcode</td>
                    <td>{{$details->cust_zipcode}}</td>
                </tr>
            </table>
            <div class="row"> 
                <div class="col">
                    Note 
                </div>
            </div>
            <br>
            <div class="row" style="background-color:#222; height: 70px; margin-bottom: 5px; color: white;"> 
                <div class="col" style="font-size: 30px; text-align: left">
                </div>   
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>