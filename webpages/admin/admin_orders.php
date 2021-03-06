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
  <a class="item" href="index.php">Home</a>
  <a class="item" href="admin_sales.php">Sales</a>
  <a class="item" href="admin_inventory.php">Inventory</a>
  <a class="item" >Orders</a>
  <a class="item" href="admin_emp.php">Employee</a>
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
        <a class="item" href="admin_sales.php">Sales</a>
        <a class="item" href="admin_inventory.php">Inventory</a>
        <a class="active item" >Orders</a>
        <a class="item" href="admin_emp.php">Employee</a>
        <div class="right item">
          <a class="ui inverted orange button" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>  

  <div class="ui container">
    <br><br>
    <table class="ui orange selectable table">
      <thead>
        <th>Date</th>
        <th>Client Name</th>
        <th>Transaction Name</th>
        <th>Measurement (WxH)</th>
        <th>QTY</th>  
        <th>Artist</th>
        <th></th>
      </thead>  

      <tbody>
        <tr>
          <td>1/1/2015</td>
          <td>Kenshin Himura</td>
          <td>HappyBirthdayTarp</td>
          <td>5ftx5ft</td>
          <td>2</td>
          <td>Bart Simpson</th>
          <td>
            <button class="ui orange button">View Order</button>
            <button class="ui red button">Archive Order</button>
          </td>
        <tr>
        <tr>
          <td>1/1/2015</td>
          <td>Kenshin Himura</td>
          <td>HappyBirthdayTarp</td>
          <td>5ftx5ft</td>
          <td>2</td>
          <td>None</td>
          <td>
            <button class="ui orange button">View Order</button>
            <button class="ui red button">Archive Order</button>
          </td>
        <tr>
        <tr>
          <td>1/1/2015</td>
          <td>Kenshin Himura</td>
          <td>HappyBirthdayTarp</td>
          <td>5ftx5ft</td>
          <td>2</td>
          <td>None</td>
          <td>
            <button class="ui orange button">View Order</button>
            <button class="ui red button">Archive Order</button>
          </td>
        <tr>
        <tr>
          <td>1/1/2015</td>
          <td>Kenshin Himura</td>
          <td>HappyBirthdayTarp</td>
          <td>5ftx5ft</td>
          <td>2</td>
          <td>Bart Simpson</th>
          <td>
            <button class="ui orange button">View Order</button>
            <button class="ui red button">Archive Order</button>
          </td>
        <tr>
        <tr>
          <td>1/1/2015</td>
          <td>Kenshin Himura</td>
          <td>HappyBirthdayTarp</td>
          <td>5ftx5ft</td>
          <td>2</td>
          <td>None</td>
          <td>
            <button class="ui orange button">View Order</button>
            <button class="ui red button">Archive Order</button>
          </td>
        <tr>
        <tr>
          <td>1/1/2015</td>
          <td>Kenshin Himura</td>
          <td>HappyBirthdayTarp</td>
          <td>5ftx5ft</td>
          <td>2</td>
          <td>None</td>
          <td>
            <button class="ui orange button">View Order</button>
            <button class="ui red button">Archive Order</button>
          </td>
        <tr>
        <tr>
          <td>1/1/2015</td>
          <td>Kenshin Himura</td>
          <td>HappyBirthdayTarp</td>
          <td>5ftx5ft</td>
          <td>2</td>
          <td>Bart Simpson</th>
          <td>
            <button class="ui orange button">View Order</button>
            <button class="ui red button">Archive Order</button>
          </td>
        <tr>  
      </tbody>  
    </table>  
  </div>  

</body>
</html>  

<?php

} else{
  include 'admin_login.php';
}

?>