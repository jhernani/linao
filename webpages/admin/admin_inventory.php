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
  <title>Admin - Inventory</title>
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
  <link rel="stylesheet" type="text/css" href="../../dist/components/modal.min.css">

  
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
  <script src="../../dist/components/modal.js"></script>
  <script src="../../dist/components/modal.min.js"></script>
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
  <a class="item" href="admin_sales.php">Sales</a>
  <a class="item" >Inventory</a>
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
        <a class="item" href="admin_sales.php">Sales</a>
        <a class="active item" >Inventory</a>
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
    <div class="ui styled fluid accordion">

      <div class="title">
        <a class="ui green button">
        <i class="dropdown icon"></i>
        Add New Inventory Item
        </a>
      </div>

      <div class="content">
        <form class="ui green form segment" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <div class="ui three column grid">

            <div class="column">
              <div class="field">
                <label>Branch ID</label>
                <select name="b_id" required>
                <option value="" selected="selected"></option>

                <?php
                  $pdo = Database::connect();
                  $sql = 'SELECT * FROM branch WHERE status="ACTIVE"';
                  foreach ($pdo->query($sql) as $row) {
                      echo '<option name="'. $row['branch_id'] .'">'. $row['branch_id'] .'</option>';
                        echo '<td>'. $row['branch_id'] . '</td>';
                  }
                  Database::disconnect();
                ?>

                </select>  
              </div>  
            </div>

            <div class="column">
              <div class="field">
                <label>Item Name</label>
                <input name="name" type="text" required>
              </div>
            </div>

            <div class="column">
              <div class="field">
                <label>Description</label>
                <input name="desc" type="text" required>
              </div>
            </div>   

          </div>  
          <br>  

          <div class="ui four column grid">

            <div class="column">
              <div class="field">
                <label>Category</label>
                <select name="cat" required>
                  <option value="" selected="selected"></option>
                  <option name="TARPAULIN">TARPAULIN</option>
                  <option name="STICKER">STICKER</option>
                  <option name="SIGNAGE">SIGNAGE</option>
                  <option name="BANNER">BANNER</option>
                  <option name="DIGITAL PRINTING">DIGITAL PRINTING</option>
                  <option name="T-SHIRT">T-SHIRT</option>
                </select>  
              </div>  
            </div>

            <div class="column">
              <div class="field">
                <label>Quantity</label>
                <input name="qty" type="number" required>
              </div>  
            </div> 

            <div class="column">
              <div class="field">
                <label>Price</label>
                <input name="price" type="number" step="any" required>
              </div>  
            </div>

            <div class="column">
              <div class="field">
                <label>Status</label>
                <select name="stat" required>
                  <option value="" selected="selected"></option>
                  <option name="AVAILABLE">AVAILABLE</option>
                  <option name="UNAVAILABLE">UNAVAILABLE</option>
                  <option name="OUT OF STOCK">OUT OF STOCK</option>
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

            <?php

              if (isset($_POST['b_id']) && isset($_POST['name']) && isset($_POST['desc']) 
              && isset($_POST['cat']) && isset($_POST['qty']) && isset($_POST['price']) && isset($_POST['stat'])) {
                    $b_id = $_POST['b_id'];
                    $name = $_POST['name'];
                    $desc = $_POST['desc'];
                    $cat = $_POST['cat'];
                    $qty = $_POST['qty'];
                    $price = $_POST['price'];
                    $stat = $_POST['stat'];

                        $query_num_rows = mysql_num_rows($query_run);
                        $pdo = Database::connect();
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = "INSERT INTO inventory (branch_id, item_name, item_description, item_category,
                        quantity, price, status) values(?, ?, ?, ?, ?, ?, ?)";
                        $q = $pdo->prepare($sql);
                        $q->execute(array($b_id, $name, $desc, $cat, $qty, $price, $stat));
                        Database::disconnect();
                        header("Location:admin_inventory.php");
              }
            ?>

          </div>
        </form>
      </div>

      <div>
      <div class="active title">
        <a class="ui orange button">
        <i class="dropdown icon"></i>
        View Item Information
        </a>
      </div>

      <div class="content">
        <table class="ui orange selectable table">
          
          <thead>
            <th>Item ID</th>
            <th>Branch ID</th>
            <th>Item Name</th>
            <th>Description</th>
            <th>Category</th>
            <th>Quantity</th>  
            <th>Price</th>
            <th>Status</th>
            <th></th>
            <th></th>
          </thead> 

          <tbody>

      <?php
        $pdo = Database::connect();
        $sql = 'SELECT * FROM inventory WHERE status = "AVAILABLE" ORDER BY branch_id';
        foreach ($pdo->query($sql) as $row) {
              echo '<tr>';
              echo '<td>'. $row['item_id'] . '</td>';
              echo '<td>'. $row['branch_id'] . '</td>';
              echo '<td>'. $row['item_name'] . '</td>';
              echo '<td>'. $row['item_description'] . '</td>';
              echo '<td>'. $row['item_category'] . '</td>';
              echo '<td>'. $row['quantity'] . '</td>';
              echo '<td>'. number_format($row['price'],2) . '</td>';
              echo '<td>'. $row['status'] . '</td>';
              echo '<td>';
              echo '<a href="update_branch.php?id='.$row['branch_id'].'"><button class="ui yellow button">
                    <i class="configure icon"></i>
                    Edit
                    </button></a>';
              echo '</td>';
              echo '<td>';
              echo '<a href="update_branch.php?id='.$row['branch_id'].'"><button class="ui red button">
                    <i class="archive icon"></i>
                    Archive
                    </button></a>';
              echo '</td>';
              echo '</tr>';
        }
        Database::disconnect();
      ?>
          </tbody>  
        </table>  
      </div>    
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