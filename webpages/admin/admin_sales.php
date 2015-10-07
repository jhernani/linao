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
  <title>Admin - Sales</title>
  <link rel="stylesheet" type="text/css" href="../../dist/components/reset.css">
  <link rel="stylesheet" type="text/css" href="../../dist/components/site.css">
  <link rel="stylesheet" type="text/css" href="../../dist/components/accordion.css">
  <link rel="stylesheet" type="text/css" href="../../dist/components/container.css">
  <link rel="stylesheet" type="text/css" href="../../dist/components/grid.css">
  <link rel="stylesheet" type="text/css" href="../../dist/components/header.css">
  <link rel="stylesheet" type="text/css" href="../../dist/components/image.css">
  <link rel="stylesheet" type="text/css" href="../../dist/components/menu.css">
  <link rel="stylesheet" type="text/css" href="../../dist/components/form.css">
  <link rel="stylesheet" type="text/css" href="../../dist/components/divider.css">
  <link rel="stylesheet" type="text/css" href="../../dist/components/dropdown.css">
  <link rel="stylesheet" type="text/css" href="../../dist/components/segment.css">
  <link rel="stylesheet" type="text/css" href="../../dist/components/button.css">
  <link rel="stylesheet" type="text/css" href="../../dist/components/list.css">
  <link rel="stylesheet" type="text/css" href="../../dist/components/icon.css">
  <link rel="stylesheet" type="text/css" href="../../dist/components/sidebar.css">
  <link rel="stylesheet" type="text/css" href="../../dist/components/transition.css">
  <link rel="stylesheet" type="text/css" href="../../dist/components/table.css">
  <link rel="stylesheet" type="text/css" href="../../dist/components/modal.css">

	
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
  <script src="../../dist/components/accordion.js"></script>
  <script src="../../dist/components/sidebar.js"></script>
  <script src="../../dist/components/transition.js"></script>
  <script src="../../dist/components/dropdown.js"></script>
  <script src="../../dist/main.js"></script>  

  <script>
  $(document)
    .ready(function() {

      // create sidebar and attach to menu open
      $('.ui.sidebar')
        .sidebar('attach events', '.toc.item')
      ;
    });
  </script>
</head>
<body>

<!-- Sidebar Menu -->
<div class="ui vertical inverted sidebar menu">
  <a class="item" href="index.php">Home</a>
  <a class="item" >Sales</a>
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
        <a class="item" href="index.php">Home</a>
        <a class="active item" >Sales</a>
        <a class="item" href="admin_inventory.php">Inventory</a>
        <a class="item" href="admin_emp.php">Employees</a>
        <a class="item" href="admin_branch.php">Branches</a>
        <div class="right item">
          <a class="ui inverted orange button" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <br>
  <div class="ui container">
    <br>
    <div class="ui accordion">

      <div class="title">
        <a class="ui green button">
        <i class="dropdown icon"></i>
        Add New Transactions
        </a>
      </div>

      <div class="content">
        <form class="ui green form segment">
          <div class="ui two column grid">

            <div class="column">

              <div class="field">
                <label>Transaction Number</label>
                <input name="trans_no" type="text" required>
              </div>  
            </div>

            <div class="column">
              <div class="field">
                <label>Transaction Name</label>
                <input name="client name" type="text" required>
              </div>
            </div>

          </div>  
          <br>  

          <div class="ui five column grid">
            
            <div class="column">
              <div class="field">
                <label>Item Type</label>
                <select name="item_type" required>
                  <option>...</option>
                  <option name="tarp1">Tarpaulin (10 oz)</option>
                  <option name="tarp2">Tarpaulin (13 oz)</option>
                  <option name="tarp3">Tarpaulin (18 oz)</option>
                  <option name="tarp">Vinyl (gen/glossy)</option>
                  <option name="tarp">Vinyl (gen/clear)</option>
                  <option name="tarp">Vinyl (mactac/glossy)</option>
                  <option name="tarp">Vinyl (mactac/matte)</option>
                  <option name="tarp">Vinyl (3M/glossy)</option>
                  <option name="tarp">Vinyl (3M ordinary/glossy)</option>
                  <option name="tarp">Reflectorized (3M)</option>
                  <option name="tarp">Reflectorized (MX)</option>
                  <option name="tarp">Perforated/Frosted</option>
                  <option name="tarp">Vehicle Sticker</option>
                  <option name="tarp">Cintra/Foam Mount</option>
                  <option name="tarp">Vinyl Sticker w/ Cut</option>
                  <option name="tarp">Calling Card</option>
                  <option name="tarp">Mug</option>
                  <option name="tarp">Bond Paper (Colored)</option>
                  <option name="tarp">Bond Paper (Black)</option>
                  <option name="tarp">Photo Sticker</option>
                  <option name="tarp">Photo Paper</option>
                  <option name="tarp">Photo Paper(130GSM)</option>
                  <option name="tarp">Photo Paper(230GSM)</option>
                  <option name="tarp">Ordinary Paper(130GSM)</option>
                  <option name="tarp">Baller Band</option>
                  <option name="tarp">PVC ID</option>
                  <option name="tarp">Keychain</option>
                  <option name="tarp">Lighted Signage (GI)</option>
                  <option name="tarp">Lighted Signage (Aluminum)</option>
                  <option name="tarp">Non-Lighted Signage</option>
                  <option name="tarp">Lamination</option>
                  <option name="tarp">Acrylic Buildup</option>
                  <option name="tarp">Brass & Stainless</option>
                  <option name="tarp">LED</option>
                  <option name="tarp">Neon Lights</option>
                  <option name="tarp">Grandsler(TSHIRT)</option>
                  <option name="tarp">Brown(TSHIRT)</option>
                  <option name="tarp">Lifeline(TSHIRT)</option>
                  <option name="tarp">Innocence(TSHIRT)</option>
                  <option name="tarp">Swearte(TSHIRT)</option>
                  <option name="tarp">Judge(TSHIRT)</option>
                  <option name="tarp">Tshirt Heat</option>
                </select>  
              </div>  
            </div>

            <div class="column">
              <div class="field">
                <label>QTY</label>
                <input type="text" name="item_qty" required>
              </div>  
            </div> 

            <div class="column">
              <div class="field">
                <label>Measurement Width</label>
                <input type="text" name="width" required>
              </div>  
            </div>

            <div class="column">
              <div class="field">
                <label>Measurement Height</label>
                <input type="text" name="height" required>
              </div>  
            </div> 

            <div class="column">
              <div class="field">
                <label>Other Charges</label>
                <input type="text" name="other_charges" required>
              </div>  
            </div>

            <div class="column">
              <div class="field">
                <label>Due Date</label>
                <input type="text" name="due_date" required>
                <!--jquery-->
              </div>  
            </div>

            <div class="column">
              <div class="field">
                <label>Status</label>
                <select name="emp_charge" required>
                  <option>...</option>
                  <option name="emp1">Order in Progres</option>
                  <option name="emp1">Ready for Claiming</option>
                  <option name="emp1">Transaction Closed</option>
                </select>  
              </div>  
            </div>

            <div class="column">
              <div class="field">
                <label>Employee in Charge of Sale</label>
                <select name="emp_charge" required>
                  <option>...</option>
                  <option name="emp1">Leonardo DiCaprio</option>
                  <option name="emp1">Natalie Portman</option>
                  <option name="emp1">Han Solo</option>
                  <option name="emp1">Bart Simpson</option>
                  <option name="emp1">Meg Griffin</option>
                  <option name="emp1">Nemo</option>
                </select>  
              </div>  
            </div>

          </div>
          <br>
          <div>
            <button class="ui green button">
              <i class="check icon"></i>
                 Submit
            </button>
          </div>
        </form>
      </div>  

      <div class="active title">
        <a class="ui blue button">
        <i class="dropdown icon"></i>
        View Sale Transactions
        </a>
      </div>
      <div class="active content">
        <div class="right aligned">
          10 of 200
          <button class="ui blue button">
          <i class="angle left icon"></i>
        </button>
        <button class="ui blue button">
          <i class="angle right icon"></i>
        </button>
        </div>
		<table class="ui blue selectable table">
			<thead>
        <th>Date</th>
				<th>Transaction No.</th>
        <th>Employee in Charge</th>
				<th>Client Name</th>
        <th>Transaction Name</th>
				<th>Item Type</th>
				<th>Qty</th>
				<th>Measurement (WxH)</th>
				<th>Other Charges</th>
        <th>Status</th>
				<th>Total</th>
			</thead>
			
			<tbody>
				<tr>
          <td>6/19/2015</td>
					<td>1</td>
          <td>Leonardo DiCaprio</td>
					<td>Kenshin Himura</td>
          <td>Birthday Tarp</td>
					<td>Tarpaulin</td>
					<td>1</td>
					<td>10ftx10ft</td>
					<td>None</td>
          <td>In-Progress</td>
					<td>500</td>
				</tr>
				
				<tr>
          <td>6/19/2015</td>
					<td>1</td>
          <td>Leonardo DiCaprio</td>
					<td>Kenshin Himura</td>
          <td>Birthday Tarp</td>
					<td>Tarpaulin</td>
					<td>1</td>
					<td>10ftx10ft</td>
					<td>None</td>
          <td>In-Progress</td>
					<td>500</td>
				</tr>
				
				<tr>
          <td>6/19/2015</td>
					<td>1</td>
          <td>Leonardo DiCaprio</td>
					<td>Kenshin Himura</td>
          <td>Birthday Tarp</td>
					<td>Tarpaulin</td>
					<td>1</td>
					<td>10ftx10ft</td>
					<td>None</td>
          <td>In-Progress</td>
					<td>500</td>
				</tr>
				
				<tr>
          <td>6/19/2015</td>
					<td>1</td>
          <td>Leonardo DiCaprio</td>
					<td>Kenshin Himura</td>
          <td>Birthday Tarp</td>
					<td>Tarpaulin</td>
					<td>1</td>
					<td>10ftx10ft</td>
					<td>None</td>
          <td>In-Progress</td>
					<td>500</td>
				</tr>
				
				<tr>
          <td>6/19/2015</td>
					<td>1</td>
          <td>Leonardo DiCaprio</td>
					<td>Kenshin Himura</td>
          <td>Birthday Tarp</td>
					<td>Tarpaulin</td>
					<td>1</td>
					<td>10ftx10ft</td>
					<td>None</td>
          <td>In-Progress</td>
					<td>500</td>
				</tr>
				
				<tr>
          <td>6/19/2015</td>
					<td>1</td>
          <td>Leonardo DiCaprio</td>
					<td>Kenshin Himura</td>
          <td>Birthday Tarp</td>
					<td>Tarpaulin</td>
					<td>1</td>
					<td>10ftx10ft</td>
					<td>None</td>
          <td>Closed</td>
					<td>500</td>
				</tr>
			</tbody>
		</table>
    <br>
    </div>  
  </div>
</div>

</div>    
</body>
</html>

<?php

} else{
  include 'admin_login.php';
}

?>