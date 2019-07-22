


// Render the PayPal button
paypal.Button.render({
// Set your environment
env: 'sandbox', // sandbox | production

// Specify the style of the button
style: {
  layout: 'vertical',  // horizontal | vertical
  size:   'medium',    // medium | large | responsive
  shape:  'rect',      // pill | rect
  color:  'gold'       // gold | blue | silver | white | black
},

// Specify allowed and disallowed funding sources
//
// Options:
// - paypal.FUNDING.CARD
// - paypal.FUNDING.CREDIT
// - paypal.FUNDING.ELV
funding: {
  allowed: [
    paypal.FUNDING.CARD,
    paypal.FUNDING.CREDIT
  ],
  disallowed: []
},

// Enable Pay Now checkout flow (optional)
commit: true,

// PayPal Client IDs - replace with your own

client: {
  sandbox: 'AXxOLn6CqvCZlFblZhgVfRQlRnv2EVz4pTUY-Al2DcmtFb7fBj1BU24gOApX6kE7OEpEYIkHTqbxRzqG',
  production: '<insert production client id>'
},

payment: function (data, actions) {
  return actions.payment.create({
    payment: {
      transactions: [
        {
          amount: {
            total: tickets*price,
            currency: 'GBP'
          }
        }
      ]
    }
  });
},

onAuthorize: function (data, actions) {
  return actions.payment.execute()
    .then(function () {

    var uid = <?php echo 'test'; ?>;
      var movid = <?php echo $i; ?>;
      var movname = <?php echo $string = '"'.substr($array[0]['name'],0,255).'"' ?>;
      var movtime = document.getElementById('formTime').value;
      var movdate = document.getElementById('formDate').value;
      var totalPrice = tickets * price;

      var http = new XMLHttpRequest();
    var url = 'scripts/saveOrderDetails.php';
    var params = '=uid='+uid+'&movid='+movid+'&movname='+movname+'&movtime='+movtime+'&movdate='+movdate+'&movtickets='+tickets+'&price='+price+'&totalprice='+totalPrice;
    http.open('POST', url, true);

    //Send the proper header information along with the request
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    http.onreadystatechange = function() {//Call a function when the state changes.
        if(http.readyState == 4 && http.status == 200) {
            alert(http.responseText);
        }
    }
    http.send(params);


      window.alert('Thank you!\nPayment Complete!');
    });
}
}, '#paypal-button-container');