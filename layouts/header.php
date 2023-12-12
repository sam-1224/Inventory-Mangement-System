<?php $user = current_user(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title><?php if (!empty($page_title))
            echo remove_junk($page_title);
          elseif (!empty($user))
            echo ucfirst($user['name']);
          else echo "Inventory Management System"; ?>
  </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" />
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
  <link rel="stylesheet" href="libs/css/main.css" />
  <script src="https://kit.fontawesome.com/2c810d45c3.js" crossorigin="anonymous"></script>
</head>

<body style="background-image: url(./libs/images/bgimg.jpg);background-repeat:no-repeat;background-size:cover;height:100%;background-position:center;">
  <?php if ($session->isUserLoggedIn(true)) : ?>
    <header id="header">
      <style>
        button {
          border: none;
          padding: 5px 5px;
          font-size: 45px;
          position: relative;
          background: transparent;
          color: #46C6F5;
          text-transform: uppercase;
          /* border: 3px solid #ffa500; */
          cursor: pointer;
          transition: all 0.7s;
          overflow: hidden;
          /* border-radius: 150px; */
        }

        button:hover {
          color: white;
        }

        span {
          transition: all 0.7s;
          z-index: -1;
        }

        button .first {
          content: "";
          position: absolute;
          right: 100%;
          top: 0;
          width: 25%;
          height: 100%;
          background: #012E5E;
        }

        button:hover .first {
          top: 0;
          right: 0;
        }

        button .second {
          content: "";
          position: absolute;
          left: 25%;
          top: -100%;
          height: 100%;
          width: 25%;
          background: #012E5E;
        }

        button:hover .second {
          top: 0;
          left: 50%;
        }

        button .third {
          content: "";
          position: absolute;
          left: 50%;
          height: 100%;
          top: 100%;
          width: 25%;
          background: #012E5E;
        }

        button:hover .third {
          top: 0;
          left: 25%;
        }

        button .fourth {
          content: "";
          position: absolute;
          left: 100%;
          top: 0;
          height: 100%;
          width: 25%;
          background: #012E5E;
        }

        button:hover .fourth {
          top: 0;
          left: 0;
        }
      </style>
      <div class="logo pull-left"> <button id="toggleSidebarButton"><i class="fa-solid fa-gear"></i>
          <span class="first"></span>
          <span class="second"></span>
          <span class="third"></span>
          <span class="fourth"></span>
        </button></div>
      <div class="header-content">
        <div class="header-date pull-left">
          <strong><?php echo date("F j, Y, g:i a"); ?></strong>
        </div>
        <div class="pull-right clearfix">
          <ul class="info-menu list-inline list-unstyled">
            <li class="profile">
              <a href="#" data-toggle="dropdown" class="toggle" aria-expanded="false">
                <img src="uploads/users/<?php echo $user['image']; ?>" alt="user-image" class="img-circle img-inline">
                <span><?php echo remove_junk(ucfirst($user['name'])); ?> <i class="caret"></i></span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a href="profile.php?id=<?php echo (int)$user['id']; ?>">
                    <i class="glyphicon glyphicon-user"></i>
                    Profile
                  </a>
                </li>
                <li>
                  <a href="edit_account.php" title="edit account">
                    <i class="glyphicon glyphicon-cog"></i>
                    Settings
                  </a>
                </li>
                <li class="last">
                  <a href="logout.php">
                    <i class="glyphicon glyphicon-off"></i>
                    Logout
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </header>
    <div id="sidebarContainer" style="display: none;">
      <div class="sidebar">
        <?php if ($user['user_level'] === '1') : ?>
          <!-- admin menu -->
          <?php include_once('admin_menu.php'); ?>

        <?php elseif ($user['user_level'] === '2') : ?>
          <!-- Special user -->
          <?php include_once('special_menu.php'); ?>

        <?php elseif ($user['user_level'] === '3') : ?>
          <!-- User menu -->
          <?php include_once('user_menu.php'); ?>

        <?php endif; ?>

      </div>
    </div>
    <script>
      // Get references to the button and sidebar container elements
      const toggleButton = document.getElementById('toggleSidebarButton');
      const sidebarContainer = document.getElementById('sidebarContainer');

      // Add a click event listener to the button
      toggleButton.addEventListener('click', function() {
        // Toggle the display style of the sidebar container
        if (sidebarContainer.style.display === 'none') {
          sidebarContainer.style.display = 'block';
        } else {
          sidebarContainer.style.display = 'none';
        }
      });
    </script>

  <?php endif; ?>

  <div class="page">
    <div class="container-fluid">