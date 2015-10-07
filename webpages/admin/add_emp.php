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

  <!-- Wide Menu bar -->
  <div class="ui inverted vertical center aligned segment">
    <div class="ui container">
      <div class="ui large secondary inverted pointing menu">
        <a class="brand"><img src="../assets/images/logo3.png" class="image"></a>
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
          
          <div class="ui three column grid">
            <div class="column">
              <div class="field">
                <label>Employee ID</label>
                <input name="emp_id" type="text" required>
              </div>
            </div>
            <div class="column">
              <div class="field">
                <label>Branch ID</label>
                <select name="branch_id" required>
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
                <label>Name</label>
                <input name="name" type="text" required>
              </div>
            </div>
          </div>  
          <br>  

          <div class="ui three column grid">
            <div class="column">
              <div class="field">
                <label>Gender</label>
                <select name="gender" required>
                  <option value="" selected="selected"></option>
                  <option name="MALE">MALE</option>
                  <option name="FEMALE">FEMALE</option>
                </select>  
              </div>  
            </div>
            <div class="column">
              <div class="field">
                <label>Address</label>
                <input name="address" type="text" required>
              </div>
            </div>
            <div class="column">
              <div class="field">
                <label>Contact Number</label>
                <input name="cont_num" type="text" required>
              </div>
            </div>
          </div>  
          <br> 

          <div class="ui three column grid">
            <div class="column">
              <div class="field">
                <label>Email Address</label>
                <input name="e_add" type="text" required>
              </div>  
            </div>
            <div class="column">
              <div class="field">
                <label>Status</label>
                <select name="stat" required>
                  <option value="" selected="selected"></option>
                  <option name="ACTIVE">ACTIVE</option>
                  <option name="INACTIVE">INACTIVE</option>
                  <option name="UNDER PROBATION">UNDER PROBATION</option>
                </select>  
              </div>  
            </div>
            <div class="column">
              <div class="field">
                <label>Position</label>
                <select name="pos" required>
                  <option value="" selected="selected"></option>
                  <option name="MANAGER">MANAGER</option>
                  <option name="GRAPHIC ARTIST">GRAPHIC ARTIST</option>
                  <option name="SALES REPRESENTATIVE">SALES REPRESENTATIVE</option>
                  <option name="PRINTER/INSTALLER">PRINTER/INSTALLER</option>
                </select>  
              </div>  
            </div>
          </div>
          <br>

          <div>
            <button class="ui green button">
              <i class="check icon"></i>
                 Add Employee
            </button>
            <?php

              if (isset($_POST['emp_id']) && isset($_POST['branch_id'])
              && isset($_POST['name']) && isset($_POST['gender'])
              && isset($_POST['address']) && isset($_POST['cont_num'])
              && isset($_POST['e_add']) && isset($_POST['stat']) && isset($_POST['pos'])) {
                    $eid = $_POST['emp_id'];
                    $bid = $_POST['branch_id'];
                    $name = $_POST['name'];
                    $gender = $_POST['gender'];
                    $add = $_POST['address'];
                    $cn = $_POST['cont_num'];
                    $eadd = $_POST['e_add'];
                    $stat = $_POST['stat'];
                    $pos = $_POST['pos'];

                    $query = "SELECT employee_id FROM employee WHERE employee_id = '".mysql_real_escape_string($eid)."'";
                    if ($query_run = mysql_query($query)){
                      $query_num_rows = mysql_num_rows($query_run);
                      if ($query_num_rows > 0) {
                       ?> <center> <?php echo "Invalid Employee ID."; ?> </center>
                       <?php
                      } 
                      else {
                        $pdo = Database::connect();
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $sql = "INSERT INTO employee (employee_id, branch_id, employee_name, gender,
                        employee_address, employee_contact_number, employee_email_address,
                        status, position) values(?, ?, ?, ?, ?, ?, ?, ?, ?)";
                        $q = $pdo->prepare($sql);
                        $q->execute(array($eid, $bid, $name, $gender, $add, $cn, $eadd, $stat, $pos));
                        Database::disconnect();
                        header("Location:admin_emp.php");
                      }
                    }
              }
            ?>
          </div>
        </form>
            <a href="admin_emp.php"><button class="ui black button">
                 Back
            </button></a>
      </div>

    <br>
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