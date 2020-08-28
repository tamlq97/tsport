<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <div class="container" style='max-width:700px;margin:0 auto'>
        <div row="">
            <div class="ml-3 text-left col-6"><a href="http://localhost:8080">VinhTrang</a></div>
        </div>
        <hr class="text-danger">
        <br>
        <h3 class='text-uppercase text-primary'>Confirm Product Available</h3>
        <br>
                    
        <p>Hello <i>{{ $receiver}}</i>,</p>
        <p>Your order <b>#{{$madh}}</b> ({{$orderDate}}) has been <span style='font-weight:600'>Shop 
            @foreach ($products as $prod)
                </span> <i>{{$prod['product']['supplier']['company_name']}} </i>
                <span style='font-weight:600'>confirmed product available</span> and
            @endforeach
            .
            <p>We will soon send you delivery date after we send to delivery partner.</p>
            <p>Please check your mail usually.</p>
         
        <p>Thank you for your trusting shopping at <a href='http://localhost:8080'>VinhTrang</a></p>
         <br>
         <div class="border border-danger">
             <p>Your order <b>#{{$madh}}</b> ({{$orderDate}}):</p>
             <table class="table mx-auto" align="center" border="0" cellpadding="0" cellspacing="0" width="600">
                 <colgroup>
                    <col style="width:150px" />
                    <col  />
                    <col  />
                    <col style="width:80px" />
                    <col />
                    <col style="width:80px" />
                    <col  />
                </colgroup>
                 <thead>
                     <tr>
                         <th></th>
                         <th>Product</th>
                         <th>Shop</th>
                         <td>Price</td>
                         <td>Quantity</td>
                         <td>Total</td>
                         <th>Receiver</th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($products as $prod)
                     <tr>
                     <td><img src="{{strpos($prod['product']['pictures'][0]['src'],'//') ? 'http'.$prod['product']['pictures'][0]['src']
                     : $prod['imgLink'].'/colors/'.$prod['product']['pictures'][0]['color_id']
                        .'/type/'.$prod['product']['pictures'][0]['type'].'/'.$prod['product']['pictures'][0]['src']}}"
                         alt="{{strpos($prod['product']['pictures'][0]['src'],'//') ? 'http'.$prod['product']['pictures'][0]['src']
                         : $prod['imgLink'].'/colors/'.$prod['id']
                            .'/type/'.$prod['product']['pictures'][0]['type'].'/'.$prod['product']['pictures'][0]['src']}}"
                         width="120" height="120"></td>
                    <td scope="row">{!!$prod['product_name']!!}</td>
                     <td>{{$prod['product']['supplier']['company_name']}}</td>
                     <td>${{$prod['price']}} USD</td>
                     <td>{{$prod['quantity']}} </td>
                     <td>${{$prod['quantity'] * $prod['price']}} USD</td>
                     <td><p>{{$receiver}} - {{$number}}<br/>
                     {{$address}}
                     </p></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <p style='font-weight:2em'><b>Total Amount</b>: ${{$products[0]['total']}} USD</p>
         
        Thank You,
        <br/>
        <i>{{ env('MAIL_FROM_NAME') }}</i>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>