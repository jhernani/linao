<?php
require '../required/core.php';
require '../required/connect.php';
include '../required/database.php';

    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }

        if ( !empty($_POST)) {
        $id = $_POST['id'];
        
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE employee SET status = ? WHERE employee_id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array("ACTIVE", $id));
        Database::disconnect();
        header("Location: view_emp_archive.php");
    }

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
  <center><div class="ui container">
      <br>
        <form action="unarchive_emp.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id;?>"/>
            <h2>Are you sure to make this employee's status active?</h2>
            <a href="view_emp_archive.php"><button class="ui red button">
             Yes
            </button></a>
<?php

?>
      </form><br>
  </div></center>
              <center>
              <a href="view_emp_archive.php"><button class="ui black button">
               Back
              </button></a></center>
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