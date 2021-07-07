<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/styles-subOfzDashboard.css" />

<link rel="" type="text/css" href="index.php">
<link rel="" type="text/css" href="Services.php">

    <title>SUB OFFICE ASSET MANAGEMENT</title>
</head>

<body id="body">
    <div class="container">
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <a class="active_link" href="Upload.php">File Upload</a>
          <a class="active_link" href="Download.php">File Download</a>
          <a href="#">Dashboard</a>
        </div>
        <div class="navbar__right">
          <a href="#">
            <i class="fa fa-search" aria-hidden="true"></i>
          </a>
          <a href="#">
            <i class="fa fa-clock-o" aria-hidden="true"></i>
          </a>
          <a href="#">
            <img width="30" src="img/avatar.svg" alt="" />
            <!-- <i class="fa fa-user-circle-o" aria-hidden="true"></i> -->
          </a>
        </div>
      </nav>

      <main>
        <div class="main__container">
          <!-- MAIN TITLE STARTS HERE -->

          <div class="main__title">
            <img src="img/hello.svg" alt="" />
            <div class="main__greeting">
              <h1>SUB OFFICE ASSET MANAGEMENT</h1>
              <p>Welcome to your admin Dashboard</p>
            </div>
          </div>

          <!-- MAIN TITLE ENDS HERE -->

          <!-- MAIN CARDS STARTS HERE -->
          <div class="main__cards">
            <div class="card">
              <i
                class="fa fa-user-o fa-2x text-lightblue"
                aria-hidden="true"
              ></i>
              <div class="card_inner">
                <p class="text-primary-p">Number of Subscribers</p>
                <span class="font-bold text-title">12</span>
              </div>
            </div>

            <div class="card">
              <i class="fa fa-calendar fa-2x text-red" aria-hidden="true"></i>
              <div class="card_inner">
                <p class="text-primary-p">Event Calendar</p>
                <span class="font-bold text-title">TBD</span>
              </div>
            </div>

            <div class="card">
              <i
                class="fa fa-user-o fa-2x text-lightblue"
                aria-hidden="true"
              ></i>
              <div class="card_inner">
                <p class="text-primary-p">Accounts & Payments</p>
                <span class="font-bold text-title"><a href="Account.php" target="_blank">Login</a></span>
              </div>
            </div>

            <div class="card">
              <i
                class="fa fa-user-o fa-2x text-lightblue"
                aria-hidden="true"
              ></i>
              <div class="card_inner">
                <p class="text-primary-p">Internal Audit Branch</p>
                <span class="font-bold text-title"><a href="Audit.php" target="_blank">Login</a></span>
              </div>
            </div>
          </div>
          <!-- MAIN CARDS ENDS HERE -->

          <!-- CHARTS STARTS HERE -->
          <div class="charts">
            <div class="charts__left">
              <div class="charts__left__title">
                <div>
                  <h1>Daily Reports - 2021</h1>
                  <p>Provincial Department of Education, Southern Province</p>
                </div>
                <i class="fa fa-usd" aria-hidden="true"></i>
              </div>
              <div id="apex1"></div>
            </div>

            <div class="charts__right">
              <div class="charts__right__title">
                <div>
                  <h1>Stats Reports - 2020yr</h1>
                  <p>Provincial Department of Education, Southern Province</p><br>
                  <h3>Total Asset : 28,873,218,281.83</h3>
                </div>
                <i class="fa fa-usd" aria-hidden="true"></i>
              </div>

              <div class="charts__right__cards">
                <div class="card1">
                  <h1>Purchase - 2020</h1>
                  <p>19,185,346.14</p>
                </div>

                <div class="card2">
                  <h1>Other Head - 2020</h1>
                  <p>0.00</p>
                </div>

                <div class="card3">
                  <h2>Donation & Other - 2020</h2>
                  <p>3,244,784.90</p>
                </div>

                <div class="card4">
                  <h1>Withdrawals - 2020</h1>
                  <p>3,472,965.77</p>
                </div>
              </div>
            </div>
          </div>
          <!-- CHARTS ENDS HERE -->
        </div>
      </main>

      <div id="sidebar">
        <div class="sidebar__title">
          <div class="sidebar__img">
            <img src="img/logo.png" alt="logo" />
            <h1> Sub Ofz Menubar</h1>
          </div>
          <i
            onclick="closeSidebar()"
            class="fa fa-times"
            id="sidebarIcon"
            aria-hidden="true"
          ></i>
        </div>

        <div class="sidebar__menu">
          <div class="sidebar__link active_menu_link">
            <i class="fa fa-home"></i>
            <a href="#">Dashboard</a>
          </div>
          <h2>MNG</h2>
          <div class="sidebar__link">
            <i class="fa fa-user-secret" aria-hidden="true"></i>
            <a href="#">Admin Management</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-wrench"></i>
            <a href="https://forms.gle/UEM9fpLtj7uWt3qN7">Accountant Sign Up</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-wrench"></i>
            <a href="https://forms.gle/9wMV6SHytp2T7qAp8">Amgt Officer Sign Up</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-files-o"></i>
            <a href="Upload.php">Form Submission</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-building-o"></i>
            <a href="Upload.php">Format Update</a>
          </div>
          <h2>COMMUNITY</h2>
          <div class="sidebar__link">
            <i class="fa fa-question"></i>
            <a href="https://forms.gle/rRjoGYC6KU1xRnfB8">Requests</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-handshake-o"></i>
            <a href="index.php">Contact Us</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-files-o"></i>
            <a href="Coming-Soon.php">Special News</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-calendar-check-o"></i>
            <a href="Coming-Soon.php">Chat Room</a>
          </div>
          <h2>MAIN</h2>
          <div class="sidebar__link">
            <i class="fa fa-money"></i>
            <a href="Services.php">Services</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-briefcase"></i>
            <a href="index.php">Home</a>
          </div>
          <div class="sidebar__logout">
            <i class="fa fa-power-off"></i>
            <a href="#">Log out</a>
          </div>
        </div>
      </div>
    </div>

<!-- SCRIPTS GOES HERE -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="subOfzDashboard.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-S89ZT85TDL"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-S89ZT85TDL');
</script>

  </body>
</html>
