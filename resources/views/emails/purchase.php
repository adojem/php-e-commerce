<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Title</title>
</head>
<body>
   <div style="width:600px; padding:15px; maring:0 auto; ">

      <div style="text-align:center; width:200px; margin:0 auto">
         <img src="https://dbqq2ditazz67.cloudfront.net/logos/sm-dark-yellow.png" with="80" height="80" alt="logo">
      </div>

      <h1 style="color:#d23600">Hello <?= user()->fullname ?>,</h1>
      <p style="color:#0b97c4">Your order confirmation details: <span>#<?= $data['order_no'] ?></span></p>
      
      <table cellspacing="5" cellpadding="5" border="0" width="600" style="border:1px solid #0a0a0a">
         <tr style="background-color:#000; color:#fff">
            <th style="text-align:left">Product Name</th>
            <th>Unit Price</th>
            <th>Quantity</th>
            <th>Total</th>
         </tr>
         <?php foreach ($data['product'] as $item): ?>
            <tr>
               <td width="400"><?= $item['name'] ?></td>
               <td width="100">$<?= $item['price'] ?></td>
               <td width="50"><?= $item['quantity'] ?></td>
               <td width="50">$<?= $item['total'] ?></td>
            </tr>
         <?php endforeach; ?>
      </table>

      <h2>Total Amount: $<?= $data['total'] ?></h2>

      <p>We hope to see you again.</p>

      <h3>Acme Store.</h3>
   </div>
</body>
</html>
