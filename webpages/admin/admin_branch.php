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
  <title>Employee Accounts - Inventory</title>
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
  <script src="../../dist/components/modal.js"></script>
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
  <a class="item" href="admin_inventory.php">Inventory</a>
  <a class="item" href="admin_emp.php">Employee</a>
  <a class="item" >Branches</a>
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
        <a class="item" href="admin_emp.php">Employee</a>
        <a class="active item">Branches</a>
        <div class="right item">
          <a class="ui inverted orange button" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <br><br>
  <div class="ui container">

      <div class="content">
        <form class="ui green form segment" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <div class="ui two column grid">

            <div class="column">
              <div class="field">
                <label>Branch ID</label>
                <input name="branch_id" type="text" required>
              </div>  
            </div>

            <div class="column">
              <div class="field">
                <label>Address</label>
                <input name="address" type="text" required>
              </div>
            </div>

          </div>  
          <br>  

          <div class="ui two column grid">

            <div class="column">
              <div class="field">
                <label>Contact Number</label>
                <input type="text" name="contact_number" required>
              </div>  
            </div>

            <div class="column">
              <div class="field">
                <label>Status</label>
                <select name="status" required>
                  <option value="" selected="selected"></option>
                  <option name="ACTIVE">ACTIVE</option>
                  <option name="INACTIVE">INACTIVE</option>
                  <option name="UNDER RENOVATION">UNDER RENOVATION</option>
                </select>  
              </div>  
            </div>

          </div>
          <br>
          <div>
            <button class="ui green button">
              <i class="check icon"></i>
                 Add Branch
            </button>

            <?php

              if (isset($_POST['branch_id']) && isset($_POST['address']) && isset($_POST['contact_number']) && isset($_POST['status'])) {
                    $id = $_POST['branch_id'];
                    $add = $_POST['address'];
                    $cn = $_POST['contact_number'];
                    $stat = $_POST['status'];

                    $query = "SELECT branch_id FROM branch WHERE branch_id = '".mysql_real_escape_string($id)."'";
                    if ($query_run = mysql_query($query)){
                      $query_num_rows = mysql_num_rows($query_run);
                      if ($query_num_rows > 0) {
                       ?> <center> <?php echo "Invalid Branch ID."; ?> </center>
                       <?php
                      } 
                      else {
                        $pdo = Database::connect();
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = "INSERT INTO branch (branch_id, branch_address, branch_contact_number, status) values(?, ?, ?, ?)";
                        $q = $pdo->prepare($sql);
                        $q->execute(array($id, $add, $cn, $stat));
                        Database::disconnect();
                      }
                    }
              }
            ?>

          </div>
        </form>
      </div>

    <br>
    <table class="ui green selectable table">
      <thead>
        <th>Branch ID</th>
        <th>Address</th>
        <th>Contact Number</th>  
        <th>Number of Employees</th>
        <th>Status</th>
        <th>Action</th>
      </thead>

      <tbody>

      <?php
        $pdo = Database::connect();
        $sql = 'SELECT * FROM branch ORDER BY branch_id';
        foreach ($pdo->query($sql) as $row) {
              echo '<tr>';
              echo '<td>'. $row['branch_id'] . '</td>';
              echo '<td>'. $row['branch_address'] . '</td>';
              echo '<td>'. $row['branch_contact_number'] . '</td>';
              echo '<td>'. $row['number_of_employees'] . '</td>';
              echo '<td>'. $row['status'] . '</td>';
              echo '<td>';
              echo '<a href="update_branch.php?id='.$row['branch_id'].'"><button class="ui small orange button"><i class="archive icon"></i>Update</button></a>';
              echo '</td>';
              echo '</tr>';
        }
        Database::disconnect();
      ?>

      </tbody> 

    </table>
  </div>  
<br>
</body>
</html>

<script>
//Multiple Modals
// all first 3 modals will be called and showed but 'BORED MODAL' won't. Only when you click on the last button
// .united is a custom class and you can use anything.
$('.small.modal').modal({

});
// attach events
// haven't attached events over button of modal 3
$('#modal1').modal('attach events', '#call-modals');

// Individual events - unecessary but i does it.
$('center .button').on('click', function(){
  // using the attribute data-modal to identify for what modal the button references
  modal = $(this).attr('data-modal');
  // creating the individual event attached to click over button
  $('#'+modal+'.modal').modal(
    'show'
  );
});
</script>

<?php

} else{
  include 'admin_login.php';
}

?>