<?php
require '../required/core.php';
require '../required/connect.php';
include '../required/database.php';

if (loggedin()) {

?>
<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properities -->
  <title>Admin - Home</title>
  <link rel="stylesheet" type="text/css" href="../../dist/components/reset.css">
  <link rel="stylesheet" type="text/css" href="../../dist/components/site.css">

  <link rel="stylesheet" type="text/css" href="../../dist/components/container.css">
  <link rel="stylesheet" type="text/css" href="../../dist/components/grid.css">
  <link rel="stylesheet" type="text/css" href="../../dist/components/header.css">
  <link rel="stylesheet" type="text/css" href="../../dist/components/image.css">
  <link rel="stylesheet" type="text/css" href="../../dist/components/menu.css">

  <link rel="stylesheet" type="text/css" href="../../dist/components/divider.css">
  <link rel="stylesheet" type="text/css" href="../../dist/components/dropdown.css">
  <link rel="stylesheet" type="text/css" href="../../dist/components/segment.css">
  <link rel="stylesheet" type="text/css" href="../../dist/components/button.css">
  <link rel="stylesheet" type="text/css" href="../../dist/components/list.css">
  <link rel="stylesheet" type="text/css" href="../../dist/components/icon.css">
  <link rel="stylesheet" type="text/css" href="../../dist/components/sidebar.css">
  <link rel="stylesheet" type="text/css" href="../../dist/components/transition.css">
  <link rel="stylesheet" type="text/css" href="../../dist/components/table.css">


  <style type="text/css">

    .hidden.menu {
      display: none;
    }

    .masthead.segment {
      min-height: 700px;
      padding: 1em 0em;
    }
    .masthead .logo.item img {
      margin-right: 1em;
    }
    .masthead .ui.menu .ui.button {
      margin-left: 0.5em;
    }
    .masthead h1.ui.header {
      margin-top: 3em;
      margin-bottom: 0em;
      font-size: 4em;
      font-weight: normal;
    }
    .masthead h2 {
      font-size: 1.7em;
      font-weight: normal;
    }

    .ui.vertical.stripe {
      padding: 8em 0em;
    }
    .ui.vertical.stripe h3 {
      font-size: 2em;
    }
    .ui.vertical.stripe .button + h3,
    .ui.vertical.stripe p + h3 {
      margin-top: 3em;
    }
    .ui.vertical.stripe .floated.image {
      clear: both;
    }
    .ui.vertical.stripe p {
      font-size: 1.33em;
    }
    .ui.vertical.stripe .horizontal.divider {
      margin: 3em 0em;
    }

    .quote.stripe.segment {
      padding: 0em;
    }
    .quote.stripe.segment .grid .column {
      padding-top: 5em;
      padding-bottom: 5em;
    }

    .footer.segment {
      padding: 5em 0em;
    }

    .secondary.pointing.menu .toc.item {
      display: none;
    }

    @media only screen and (max-width: 700px) {
      .ui.fixed.menu {
        display: none !important;
      }
      .secondary.pointing.menu .item,
      .secondary.pointing.menu .menu {
        display: none;
      }
      .secondary.pointing.menu .toc.item {
        display: block;
      }
      .masthead.segment {
        min-height: 350px;
      }
      .masthead h1.ui.header {
        font-size: 2em;
        margin-top: 1.5em;
      }
      .masthead h2 {
        margin-top: 0.5em;
        font-size: 1.5em;
      }
    }


  </style>

  <script src="../assets/library/jquery.min.js"></script>
  <script src="../../dist/components/visibility.js"></script>
  <script src="../../dist/components/sidebar.js"></script>
  <script src="../../dist/components/transition.js"></script>

  <script>
  $(document)
    .ready(function() {

      // create sidebar and attach to menu open
      $('.ui.sidebar')
        .sidebar('attach events', '.toc.item');

    })
  ;
  </script>
</head>
<body>

<!-- Sidebar Menu -->
<div class="ui vertical inverted sidebar menu">
  <a class="item" >Home</a>
  <a class="item" href="admin_sales.php">Sales</a>
  <a class="item" href="admin_inventory.php">Inventory</a>
  <a class="item" href="admin_emp.php">Employees</a>
  <a class="item" href="admin_branch.php">Branches</a>
</div>


  <!-- Wide Menu bar -->
  <div class="ui inverted vertical center aligned segment">

    <div class="ui container">
      <div class="ui large secondary inverted pointing menu">
        <a class="toc item">
          <i class="sidebar icon"></i>
        </a>
        <a class="brand"><img src="../assets/images/logo3.png" class="image"></a>
        <a class="active item" >Home</a>
        <a class="item" href="admin_sales.php">Sales</a>
        <a class="item" href="admin_inventory.php">Inventory</a>
        <a class="item" href="admin_emp.php">Employees</a>
        <a class="item" href="admin_branch.php">Branches</a>
        <div class="right item">
          <a class="ui inverted orange button" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>  

  <br><br>
  <div class="ui container">
    <h1>Welcome Admin!</h1>
    <center><h2><i class="money icon"></i>Yesterday's Profit</h2></center>
    <br>

    <div class="ui one column grid">
       <div class="column">
          <table class="ui blue selectable table">
            <thead>
              <th><i class="shop icon"></i>Tarpaulin</th>
              <th><i class="add to cart icon"></i>Square Feet</th>
              <th><i class="ruble icon"></i>Total</th>
            </thead> 

            <tbody>
              <tr>
                <td>10 oz</td>
                <td>10 sq ft</td>
                <td>PHP5000</td>
              </tr>  

              <tr>
                <td>13 oz (Black out)</td>
                <td>10 sq ft</td>
                <td>PHP5000</td>
              </tr>

              <tr>
                <td>18 oz (Black out)</td>
                <td>10 sq ft</td>
                <td>PHP5000</td>
              </tr>
            </tbody> 
          </table>    
        </div>
    </div>  
      <div class="ui two column grid">

          <div class="column">
            <table class="ui green selectable table">
              <thead>
                <th><i class="shop icon"></i>Digital Printing</th>
                <th><i class="add to cart icon"></i>Qty</th>
                <th><i class="ruble icon"></i>Total</th>
              </thead>

              <tbody>
                <tr>
                  <td>Calling Cards</td>
                  <td>100 pcs</td>
                  <td>PHP5000</td>
                </tr>

                <tr>
                  <td>Mug</td>
                  <td>100 pcs</td>
                  <td>PHP5000</td>
                </tr>

                <tr>
                  <td>Bond Paper(Colored)</td>
                  <td>100 pcs</td>
                  <td>PHP5000</td>
                </tr>

                <tr>
                  <td>Bond Paper(Black)</td>
                  <td>100 pcs</td>
                  <td>PHP5000</td>
                </tr>

                <tr>
                  <td>Photo Sticker</td>
                  <td>100 pcs</td>
                  <td>PHP5000</td>
                </tr>

                <tr>
                  <td>Photopaper</td>
                  <td>100 pcs</td>
                  <td>PHP5000</td>
                </tr>

                <tr>
                  <td>Photopaper (130gsm)</td>
                  <td>100 pcs</td>
                  <td>PHP5000</td>
                </tr>

                <tr>
                  <td>Photopaper (230gsm)</td>
                  <td>100 pcs</td>
                  <td>PHP5000</td>
                </tr>

                <tr>
                  <td>Ordinary Card Paper</td>
                  <td>100 pcs</td>
                  <td>PHP5000</td>
                </tr>

                <tr>
                  <td>Baller Band</td>
                  <td>100 pcs</td>
                  <td>PHP5000</td>
                </tr>

                <tr>
                  <td>PVC ID</td>
                  <td>100 pcs</td>
                  <td>PHP5000</td>
                </tr>

                <tr>
                  <td>Keychains</td>
                  <td>100 pcs</td>
                  <td>PHP5000</td>
                </tr>
              </tbody>  
            </table>  
          </div>

        <div class="column">
          <table class="ui green selectable table">
            <thead>
              <th><i class="shop icon"></i>Sticker</th>
              <th><i class="add to cart icon"></i>Square Feet</th>
              <th><i class="ruble icon"></i>Total</th>
            </thead> 

            <tbody>
              <tr>
                <td>Vinyl (gen) (glossy)</td>
                <td>10 sq ft</td>
                <td>PHP5000</td>
              </tr> 

              <tr>
                <td>Vinyl (gen) (clear)</td>
                <td>10 sq ft</td>
                <td>PHP5000</td>
              </tr>  

              <tr>
                <td>Vinyl (mactac) (glossy)</td>
                <td>10 sq ft</td>
                <td>PHP5000</td>
              </tr>

              <tr>
                <td>Vinyl (mactac) (matte)</td>
                <td>10 sq ft</td>
                <td>PHP5000</td>
              </tr>

              <tr>
                <td>Vinyl (3M) (glossy)</td>
                <td>10 sq ft</td>
                <td>PHP5000</td>
              </tr>

              <tr>
                <td>Vinyl (3M ordinary) (glossy)</td>
                <td>10 sq ft</td>
                <td>PHP5000</td>
              </tr>

              <tr>
                <td>Reflectorized (3M)</td>
                <td>10 sq ft</td>
                <td>PHP5000</td>
              </tr>

              <tr>
                <td>Reflectorized (MX)</td>
                <td>10 sq ft</td>
                <td>PHP5000</td>
              </tr>

              <tr>
                <td>Perforated/Frosted</td>
                <td>10 sq ft</td>
                <td>PHP5000</td>
              </tr>

              <tr>
                <td>Vehicle Sticker</td>
                <td>10 sq ft</td>
                <td>PHP5000</td>
              </tr>

              <tr>
                <td>Cintra/Foam Mount</td>
                <td>10 sq ft</td>
                <td>PHP5000</td>
              </tr>


              <tr>
                <td>Vinyl Sticker W/ Cut</td>
                <td>10 sq ft</td>
                <td>PHP5000</td>
              </tr>
            </tbody> 
          </table>
        </div>
      </div>

      <div class="ui two column grid">
       <div class="column">
          <table class="ui orange selectable table">
            <thead>
              <th><i class="shop icon"></i>T-Shirt</th>
              <th><i class="add to cart icon"></i>QTY</th>
              <th><i class="ruble icon"></i>Total</th>
            </thead> 

            <tbody>
              <tr>
                <td>Grandsler</td>
                <td>100</td>
                <td>PHP5000</td>
              </tr>  

              <tr>
                <td>Brown</td>
                <td>100</td>
                <td>PHP5000</td>
              </tr>

              <tr>
                <td>Lifeline</td>
                <td>100</td>
                <td>PHP5000</td>
              </tr>

              <tr>
                <td>Innocence</td>
                <td>100</td>
                <td>PHP5000</td>
              </tr>

              <tr>
                <td>Swearte</td>
                <td>100</td>
                <td>PHP5000</td>
              </tr>

              <tr>
                <td>Judge</td>
                <td>100</td>
                <td>PHP5000</td>
              </tr>

              <tr>
                <td>Tshirt Heat Press A4 Size</td>
                <td>100</td>
                <td>PHP5000</td>
              </tr>
            </tbody> 
          </table>    
        </div>

          <div class="column">
            <table class="ui orange selectable table">
              <thead>
                <th><i class="shop icon"></i>Signage</th>
                <th><i class="add to cart icon"></i>Square Feet</th>
                <th><i class="ruble icon"></i>Total</th>
              </thead>

              <tbody>
                <tr>
                  <td>Lighted Signage (GI)</td>
                  <td>10 sq ft</td>
                  <td>Total</td>
                </tr> 

                <tr>
                  <td>Lighted Signage (aluminum)</td>
                  <td>10 sq ft</td>
                  <td>Total</td>
                </tr> 

                <tr>
                  <td>Non-Lighted Signage</td>
                  <td>10 sq ft</td>
                  <td>Total</td>
                </tr>

                <tr>
                  <td>Lamination</td>
                  <td>10 sq ft</td>
                  <td>Total</td>
                </tr>

                <tr>
                  <td>Acrylic Buildup</td>
                  <td>10 sq ft</td>
                  <td>Total</td>
                </tr>

                <tr>
                  <td>Brass and Stainless</td>
                  <td>10 sq ft</td>
                  <td>Total</td>
                </tr>

                <tr>
                  <td>LED</td>
                  <td>10 sq ft</td>
                  <td>Total</td>
                </tr>

                <tr>
                  <td>Neon Lights</td>
                  <td>10 sq ft</td>
                  <td>Total</td>
                </tr>
              </tbody>  
            </table>  
          </div>  
        </div> 
      </div>
      <br><br>
</body>

</html>

<?php

} else{
  include 'admin_login.php';
}

?>