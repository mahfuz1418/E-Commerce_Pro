
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <style>
        .clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: 18cm;  
  height: 28cm; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png);
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: center;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

    </style>
  </head>
  <body>
    <header class="clearfix">
      <h1>INVOICE 3-2-1</h1>
      <div id="project">
        <div><span>Product</span> {{ $order->product_title }}</div>
        <div><span>Name</span> {{ $order->name }}</div>
        <div><span>EMAIL</span> <a href="">{{ $order->email }}</a></div>
        <div><span>ADDRESS</span> {{ $order->address }}</div>
        <div><span>DATE</span> {{ $date }}</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th >PRODUCT TITLE</th>
            <th>IMAGE</th>
            <th>QUANTITY</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service">{{ $order->product_title }}</td>
            <td ><img style="width: 50px" src="product/{{ $order->image }}" alt=""></td>
            <td class="unit">{{ $order->quantity }}</td>
            <td class="qty">{{ $order->price }}</td>
          </tr>
          <tr>
            <td colspan="2">Delevery Status: {{ $order->delevery_status }}</td>
            <td>Payment Status: {{ $order->payment_status }}</td>
            <td>Total: {{ $order->price }}</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>Dear Customer:</div>
        <div class="notice">Thank you dear customer for trust our product</div>
      </div>
    </main>
  </body>
</html>