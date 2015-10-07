<?php
require '../required/core.php';
require '../required/connect.php';
include '../required/database.php';

    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

      $pdo = Database::connect();
      $sql = "SELECT * FROM employee WHERE employee_id='$id'";
          foreach ($pdo->query($sql) as $row) {
            $eid = $row['employee_id'];
            $bid = $row['branch_id'];
            $name = $row['employee_name'];
            $gender = $row['gender'];
            $add = $row['employee_address'];
            $cn = $row['employee_contact_number'];
            $eadd = $row['employee_email_address'];
            $stat = $row['status'];
            $pos = $row['position'];
          }
          Database::disconnect();

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
        <h2><?php echo $eid;?></h2>
        <form class="ui green form segment" method="post" action="update_emp.php?id=<?php echo $id?>">
          <div class="ui two column grid">
            <div class="column">
              <div class="field">
                <label>Branch ID</label>
                <select name="branch_id" required>
                <option name="<?php echo $bid?>" selected="selected"><?php echo $bid?></option>

                <?php
                  $pdo = Database::connect();
                  $sql = 'SELECT * FROM branch WHERE status="ACTIVE" AND branch_id !="' . $bid .'"';
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
                <input name="name" type="text" value="<?php echo $name?>" required>
              </div>
            </div>
          </div>  
          <br>  

          <div class="ui three column grid">
            <div class="column">
              <div class="field">
                <label>Gender</label>
                <select name="gender" required>
                  <option name="<?php echo $gender?>" selected="selected"><?php echo $gender?></option>
                  <?php
                    if ($gender == "MALE") {
                      echo '<option name="FEMALE">FEMALE</option>';
                    }
                    else {
                      echo '<option name="MALE">MALE</option>';
                    }
                  ?>
                </select>  
              </div>  
            </div>
            <div class="column">
              <div class="field">
                <label>Address</label>
                <input name="address" type="text" value="<?php echo $add?>" required>
              </div>
            </div>
            <div class="column">
              <div class="field">
                <label>Contact Number</label>
                <input name="cont_num" type="text" value="<?php echo $cn?>" required>
              </div>
            </div>
          </div>  
          <br> 

          <div class="ui three column grid">
            <div class="column">
              <div class="field">
                <label>Email Address</label>
                <input name="e_add" type="text" value="<?php echo $eadd?>" required>
              </div>  
            </div>
            <div class="column">
              <div class="field">
                <label>Status</label>
                <select name="stat"  required>
                  <option name="<?php echo $stat?>" selected="selected"><?php echo $stat?></option>
                  <?php
                    if ($stat == "PROBATION") {
                      echo '<option name="ACTIVE">ACTIVE</option>';
                    }
                    else {
                      echo '<option name="PROBATION">PROBATION</option>';
                    }
                  ?>
                </select>  
              </div>  
            </div>
            <div class="column">
              <div class="field">
                <label>Position</label>
                <select name="pos" required>
                  <option name="<?php echo $pos?>" selected="selected"><?php echo $pos?></option>
                  <?php
                    if ($pos == "MANAGER") {
                      echo '<option name="GRAPHIC ARTIST">GRAPHIC ARTIST</option>';
                      echo '<option name="SALES REPRESENTATIVE">SALES REPRESENTATIVE</option>';
                      echo '<option name="PRINTER/INSTALLER">PRINTER/INSTALLER</option>';
                    }
                    elseif ($pos == "GRAPHIC ARTIST") {
                      echo '<option name="MANAGER">MANAGER</option>';
                      echo '<option name="SALES REPRESENTATIVE">SALES REPRESENTATIVE</option>';
                      echo '<option name="PRINTER/INSTALLER">PRINTER/INSTALLER</option>';
                    }
                    elseif ($pos == "SALES REPRESENTATIVE") {
                      echo '<option name="MANAGER">MANAGER</option>';
                      echo '<option name="GRAPHIC ARTIST">GRAPHIC ARTIST</option>';
                      echo '<option name="PRINTER/INSTALLER">PRINTER/INSTALLER</option>';
                    }
                    else {
                      echo '<option name="MANAGER">MANAGER</option>';
                      echo '<option name="GRAPHIC ARTIST">GRAPHIC ARTIST</option>';
                      echo '<option name="SALES REPRESENTATIVE">SALES REPRESENTATIVE</option>';
                    }
                  ?>
                </select>  
              </div>  
            </div>
          </div>
          <br>

          <div>
            <button class="ui orange button">
              <i class="check icon"></i>
                 Update Employee
            </button>
            <?php
              if (isset($_POST['branch_id']) && isset($_POST['name']) && isset($_POST['gender'])
              && isset($_POST['address']) && isset($_POST['cont_num'])
              && isset($_POST['e_add']) && isset($_POST['stat']) && isset($_POST['pos'])) {
                    $branch_id = $_POST['branch_id'];
                    $employee_name = $_POST['name'];
                    $gen = $_POST['gender'];
                    $employee_address = $_POST['address'];
                    $employee_contact_number = $_POST['cont_num'];
                    $employee_email_address = $_POST['e_add'];
                    $status = $_POST['stat'];
                    $position = $_POST['pos'];
                    $pdo = Database::connect();

                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "UPDATE employee SET branch_id = ?, employee_name = ?, gender = ?,
                    employee_address = ?, employee_contact_number = ?, employee_email_address = ?,
                    status = ?, position = ? WHERE employee_id = $id";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($branch_id, $employee_name, $gen, $employee_address, $employee_contact_number, 
                      $employee_email_address, $status, $position));
                    Database::disconnect();
                header("Location:admin_emp.php");
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