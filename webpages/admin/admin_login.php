<!DOCTYPE html>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properities -->
  <title>Login - 3 Coins Advertising Solutions</title>
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
  <link rel="stylesheet" type="text/css" href="../../dist/components/message.css">
  
  <style type="text/css">
    a{
      color:orange;
    }

    a:hover {
    color: orange;
    }

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
  <script src="../../dist/components/transition.js"></script>
  <script src="../../dist/components/form.js"></script>


</head>
<body>

  <!-- Wide Menu bar -->
  <div class="ui inverted vertical center aligned segment">

    <div class="ui container">
      <div class="ui large secondary inverted pointing menu">
        <a class="toc item">
          <i class="sidebar icon"></i>
        </a>
        <a class="brand"><img src="../assets/images/logo3.png" class="image"></a>
      </div>
    </div>
  </div>

  <br><br><br><br>
    <!--login form-->
  <div class="ui three column grid">

    <div class="column"></div>

    <div class="column"> 
    <br>
      <center><h1>Login</h1></center><br>

      <form class="ui large form" action="<?php echo $current_file; ?>" method="POST">
        <div class="ui stacked segment">

          <div class="field">
            <input type="text" name="uname" placeholder="Username" required>
          </div>

          <div class="field">
            <input type="password" name="pword" placeholder="Password" required>
          </div>

          <div >
            <input class="ui fluid large black submit button" type="submit" name="submit" value="Login" />
          </div>
        </div>
        <?php
        if (isset($_POST['uname']) && isset($_POST['pword'])) {
          $username = $_POST['uname'];
          $password = $_POST['pword'];

          $password_hash = sha1($password);
            
            $query = "SELECT `admin_id` FROM `admin_login` WHERE `username` = '".mysql_real_escape_string($username)."' AND `password` = '".mysql_real_escape_string($password_hash)."'";
            if ($query_run = mysql_query($query)){
              $query_num_rows = mysql_num_rows($query_run);
              if ($query_num_rows == 0) {
               ?> <center> <?php echo "Invalid username/password combination."; ?> </center>
               <?php
              } else if ($query_num_rows == 1) {
                $user_id = mysql_result($query_run, 0, 'admin_id');
                $_SESSION['user_id'] = $user_id;
                header('Location: index.php');
              }
            }
        }
        ?>
        <br>
     </form> 
    </div> 
  </div>    

<br></br>
</body>
</html>