
<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>

<?php
    // checking if user is loggesIn
    if (!isset($_SESSION['users_id'])) {
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="UTF-8">

    <title>Dashboard</title>
    
    <link rel="stylesheet" href="css\style-dashboard.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1./js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Font+Name">

    <link rel="" type="text/css" href="index.php">
    <link rel="" type="text/css" href="login.php">
    <link rel="" type="text/css" href="Dashboard.php">
    
</head>

<body>

<!----------------------Sidebar Section------------------>

<div class="sideBar">
    <header>My App</header>
    <ul>
        <li><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="Dashboard.php"><i class="fa fa-qrcode"></i>Dashboard</a></li>
        <li><a href="Purchase.php"><i class="fa fa-link"></i>Purchase</a></li>
        <li><a href="Modify-Asset.php"><i class="fa fa-link"></i>Modify Asset</a></li>
        <li><a href="Disposal.php"><i class="fa fa-link"></i>Disposal</a></li>
        <li><a href="Purchase-Return.php"><i class="fa fa-link"></i>Purchase Return</a></li>
        <li><a href="Asset-Reports.php"><i class="fas fa-stream"></i>Asset Reports</a></li>
        <li><a href="Services.php"><i class="fa fa-sliders-h"></i>Services</a></li>
        <!--<li><a href="#"><i class="far fa-envelope"></i>Contact-Us</a></li>
        <li><a href="#"><i class="fas fa-calender-week"></i>Events</a></li>
        <li><a href="#"><i class="far fa-quastion-circle"></i>About Us</a></li> -->
    </ul>   
</div>



<!----------------------Navbar Section------------------>

<section id="nav-bar">  
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#"><img src="img\logo.png" class="logo-img"></a>

     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fa fa-bars"></i>
  </button>


    
            

 <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Welcome <?php echo $_SESSION['last_name']; ?> ! <div id="timer"></div> </a>
    </li>
    </ul>

    <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i><b>Logout</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
        
  </div> 

<!--Search Bar-->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav in" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                     <input type="text" class="form-control" placeholder="Search..."></input>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

       
         
</nav>
</section>


<!----------------------Form Section------------------>

<section id="form">

   <form name="aspnetForm" method="post" action="A_Ast_Opn_Bal.aspx" onsubmit="javascript:return WebForm_OnSubmit();" id="aspnetForm" enctype="multipart/form-data">
<div>
<input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="">
<input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="">
<input type="hidden" name="__LASTFOCUS" id="__LASTFOCUS" value="">
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKMTg3NzA3OTE2Mg9kFgJmD2QWAgIBD2QWBgIBDw8WAh4EVGV4dAUrU291dGhlcm4gUHJvdmluY2lhbCBkZXBhcnRtZW50IG9mIGVkdWNhdGlvbmRkAgMPDxYCHwAFMCBXZWxjb21lIFNPVEhFUk4gUFJPVklOQ0lBTCBFRFVDQVRJT04gREVQQVJUTUVOVGRkAgUPZBYOAgEPDxYCHwAFAzEyNmRkAgMPDxYCHwAFAzAwN2RkAgkPEA8WBh4NRGF0YVRleHRGaWVsZAULRGVzY3JpcHRpb24eDkRhdGFWYWx1ZUZpZWxkBQ1Mb2NhdGlvbl9Db2RlHgtfIURhdGFCb3VuZGdkEBVuEy0tU2VsZWN0IExvY2F0aW9uLS0dQWt1cmVzc2EgWm9uYWwgQ1JDIChBa3VyZXNzYSkeQWt1cmVzc2EgWm9uYWwgQ1JDIChNYWxpbWJhZGEpEEFsb3lzaXVzIENvbGxlZ2UZQW1hcmFzb29yaXlhIFRlYWNoaW5nIFNjaA5BbmFuZGEgQ29sbGVnZRRBcmZhIENlbnRyYWwgQ29sbGVnZRpCYWxhcGl0aXlhIFRlYWNoaW5nIENlbnRyZRdCYWxhcGl0aXlhIFRlYWNoaW5nIFNjaBlCYXRlbXVsbGEgQ2VudHJhbCBDb2xsZWdlGUNocmlzdGNodXJjaCBCb3lzIENvbGxhZ2UaQ2hyaXN0Y2h1cmNoIEdpcmxzIENvbGxhZ2UYRGFtcGVsbGEgVGVhY2hpbmcgQ2VudHJlGkRlYmFyYXdld2EgQ2VudHJhbCBDb2xsZWdlGERlbml5YXlhIENlbnRyYWwgQ29sbGVnZRhEZW5peWF5YSBUZWFjaGluZyBDZW50cmUSRGVuaXlheWEgWm9uYWwgQ1JDGkRldmludXdhcmEgQ2VudHJhbCBDb2xsZWdlGURld2FuYW5kYSBDZW50cmFsIENvbGxlZ2UVRGV3YXBhdGhpcmFqYSBDb2xsZWdlGkRleXlhbmRhcmEgQ2VudHJhbCBDb2xsZWdlGkRleXlhbmRhcmEgVGVhY2hpbmcgQ2VudHJlG0RoYXJtYXNob2thIENlbnRyYWwgQ29sbGVnZRlEaWNrd2VsbGEgVGVhY2hpbmcgQ2VudHJlGURpY2t3ZWxsYSBWaWppdGhhIENvbGxlZ2UURWR1Y2F0aW9uIERlcGFydG1lbnQYRWxwaXRpeWEgVGVhY2hpbmcgQ2VudHJlE0VscGl0aXlhIFpvbmFsIENSQyAbR2FsbGUgWm9uYWwgQ1JDIChBa21lZW1hbmEpGEdhbGxlIFpvbmFsIENSQyAoQ2xvc2VkKRZHYW1pbmkgQ2VudHJhbCBDb2xsZWdlGEdldGFtYW5uYSBWaWpheWEgQ29sbGVnZRpHb2RhcGl0aXlhIENlbnRyYWwgQ29sbGVnZRFIYWttYW5hIFpvbmFsIENSQxtIYW1iYW50aG90YSBUZWFjaGluZyBDZW50cmUVSGFtYmFudGhvdGEgWm9uYWwgQ1JDGEh1bmdhbWEgVmlqYXlhYmEgQ29sbGVnZRtLYXJhbmRlbml5YSBDZW50cmFsIENvbGxlZ2UZS2F0aGFsdXdhIENlbnRyYWwgQ29sbGVnZRhLYXR1d2FuYSBDZW50cmFsIENvbGxlZ2UbS2VlcnRoaSBBYmV3aWNrcmFtYSBDb2xsZWdlGEtvdGFwb2xhIENlbnRyYWwgQ29sbGVnZR1MdW51Z2Ftd2VoZXJhIFRlYWNoaW5nIENlbnRyZQ1NYWdlZGFyYSBNLlYuGE1haGFuYWdhIENlbnRyYWwgQ29sbGVnZQ9NYWhpbmRhIENvbGxlZ2UaTWFoaW5kYSBSYWphcGFrc2hhIENvbGxlZ2UYTWFsaGFydXMgU3VsbGl5YSBDb2xsZWdlGU1hbmF2aWxhIFVwYW5hbmRhIENvbGxlZ2UXTWF0aGFyYSBDZW50cmFsIENvbGxlZ2URTWF0aGFyYSBab25hbCBDUkMfTWVlcGF3YWxhIEFtYXJhc29vcml5YSBDb2xsZWdlIA9NaW5oYXRoIENvbGxlZ2UUTmFnb2RhIFJveWFsIENvbGxlZ2UbTmFyYW5kZW5peWEgQ2VudHJhbCBDb2xsZWdlFk5lbHV3YSBDZW50cmFsIENvbGxlZ2UZUGFuYW5nYWxhIFRlYWNoaW5nIENlbnRyZRBQaXRhYmVkZGFyYSBNLlYuDlJhaHVsYSBDb2xsZWdlFlJld2F0aGEgQ2VucmFsIENvbGxlZ2UQUmljaG1vbmQgQ29sbGVnZRNSaXBhbiBHaXJscyBDb2xsZWdlF1J1aHVudSBWaWpheWFiYSBDb2xsZWdlGlNhbmdhbWl0aHRoYSBHaXJscyBDb2xsZWdlEVNlcnZhdGl1cyBDb2xsZWdlElNpZGRoYXJ0aGEgQ29sbGVnZRxTaW5nYXBvb3IgRnJpZW5kc2hpcCBDb2xsZWdlElNpcmlkaGFtbWEgQ29sbGVnZRtTb29yaXlhd2V3YSBDZW50cmFsIENvbGxlZ2UYU291dGhlcm4gUHJvdmluY2UgUElDVEVDGFNvdXRobGFuZHMgR2lybHMgQ29sbGVnZQ9TdCBNYXJ5IENvbGxlZ2UPU3VqYXRoYSBDb2xsZWdlGVN1bWFuZ2FsYSBDZW50cmFsIENvbGxlZ2UXU3VtYW5nYWxhIEdpcmxzIENvbGxlZ2UVVGFuZ2FsbGUgQm95cyBDb2xsZWdlFlRhbmdhbGxlIEdpcmxzIENvbGxlZ2UYVGFuZ2FsbGUgVGVhY2hpbmcgQ2VudHJlElRhbmdhbGxlIFpvbmFsIENSQxxUaGVsaWpqYXdpbGEgQ2VudHJhbCBDb2xsZWdlFFRoZXJhcHV0aHRoYSBDb2xsZWdlGVRoaWhhZ29kYSBDZW50cmFsIENvbGxlZ2UTVGhvbWFzIEJveXMgQ29sbGVnZRRUaG9tYXMgR2lybHMgQ29sbGVnZRZUaG9tYXMgVGVhY2hpbmcgQ2VudHJlDlRzdWNoaSBDb2xsZWdlGlVkdWdhbWEgWm9uYWwgQ1JDIChDbG9zZWQpGVVuYXdhdHVuYSBUZWFjaGluZyBDZW50cmUYVXJ1Ym9ra2EgQ2VudHJhbCBDb2xsZWdlFlZpZHlhbG9rYSBCb3lzIENvbGxlZ2UZVmlkeWFyYWphIENlbnRyYWwgQ29sbGVnZQ9WaWhhcmFnYWxhIE0uVi4aV2FsYXNtdWxsYSBDZW50cmFsIENvbGxlZ2UUV2FsYXNtdWxsYSBab25hbCBDUkMaV2FuZHVyYW1iYSBDZW50cmFsIENvbGxlZ2UeV2VlcmFrZXRpeWEgUmFqYXBha3NoYSBDb2xsZWdlG1dlZXJha2V0aXlhIFRlYWNoaW5nIENlbnRyZQ5aYWhpcmEgQ29sbGVnZQ5aYWhpcmEgQ29sbGVnZQxaRU8gQWt1cmVzc2EPWkVPIEFtYmFsYW5nb2RhDFpFTyBEZW5peWF5YQxaRU8gRWxwaXRpeWEJWkVPIEdhbGxlC1pFTyBIYWttYW5hD1pFTyBIYW1iYW50aG90YQtaRU8gTWF0aGFyYQxaRU8gVGFuZ2FsbGULWkVPIFVkdWdhbWEOWkVPIFdhbGFzbXVsbGEVbgEwCU1BUy9DUkMvMQlNQVMvQ1JDLzIMR0dTL05TLzYvQUNDDUdHUy9UVEMvMS9BVFMMR0VTL05TLzEvQUNDDU1NUy9OUy8xMy9BQ0MNR0FTL1RUQy8xL0JUQw1HQVMvVFRDLzIvQlRTDUdHUy9OUy8xNC9CQ0MNR0dTL05TLzE2L0NCQw1HR1MvTlMvMTcvQ0dDDU1BUy9UVEMvMS9EVEMMSEhTL05TLzYvRENDDE1EUy9OUy8zL0RDQw1NRFMvVFRDLzEvRFRDCU1EUy9DUkMvMQ1NTVMvTlMvMTAvRENDDEdBUy9OUy8xL0RDQwxHQVMvTlMvNS9EUEMMTUhTL05TLzEvRENDDU1IUy9UVEMvMS9EVEMMR0FTL05TLzIvRFJDDU1NUy9UVEMvMi9EVEMMTU1TL05TLzgvVkNDBFNQRUQNR0VTL1RUQy8xL0FUQwlHRVMvQ1JDLzEJR0dTL0NSQy8xCUdHUy9DUkMvMgxHRVMvTlMvMy9HQ0MMSFRTL05TLzQvR1ZDDE1BUy9OUy8xL0dDQwlNSFMvQ1JDLzENSEhTL1RUQy8xL0hUQwlISFMvQ1JDLzEMSEhTL05TLzQvSFZDDEdFUy9OUy8yL0tDQw1HR1MvTlMvMTMvS0NDDEhXUy9OUy80L0tDQwxNRFMvTlMvMS9LQUMMTURTL05TLzIvS0NDDUhIUy9UVEMvMi9MVEMMR1VTL1BTLzEvTU1WDEhUUy9OUy8zL01DQwxHR1MvTlMvMS9NQ0MMTU1TL05TLzcvTVJDDEdHUy9OUy85L01TQw1HR1MvTlMvMTAvTVVDDE1NUy9OUy8zL01NQwlNTVMvQ1JDLzENR0dTL05TLzExL01BQwxNTVMvTlMvOS9NQ0MMR1VTL05TLzMvTlJDDE1IUy9OUy8yL05DQwxHVVMvTlMvMS9OQ0MNR1VTL1RUQy8xL1BUQwxNRFMvUFMvMS9QTVYMTU1TL05TLzEvUkNDDEdBUy9OUy8zL1JDQwxHR1MvTlMvMi9SQ0MMR0dTL05TLzMvUkdTDEhUUy9OUy81L1JWQwxHR1MvTlMvNC9TR0MMTU1TL05TLzYvU1NDDU1NUy9OUy8xMS9TQ0MMSFdTL05TLzMvU0ZDDUdHUy9OUy8xMi9TQ0MMSEhTL05TLzcvU1dDBlBJQ1RFQwxHR1MvTlMvNS9TREMMSEhTL05TLzEvU01DDE1NUy9OUy8yL1NHQwxHQVMvTlMvNC9TQ0MNTU1TL05TLzEyL1NHQwxIVFMvTlMvMS9UQkMMSFRTL05TLzIvVEdDDUhUUy9UVEMvMS9UQ0MJSFRTL0NSQy8xDE1BUy9OUy8yL1RDQwxISFMvTlMvNS9UQ0MMTUhTL05TLzMvVENDDE1NUy9OUy80L1RCQwxNTVMvTlMvNS9UR0MNTU1TL1RUQy8xL1RUQwxISFMvTlMvMy9TVUMJR1VTL0NSQy8xDUdHUy9UVEMvMi9VVEMMTURTL05TLzQvVUNDDEdHUy9OUy83L1ZCQwxHVVMvTlMvMi9WQ0MMSEhTL1BTLzEvVk1WDEhXUy9OUy8xL1dDQwlIV1MvQ1JDLzENR0dTL05TLzE1L1dDQwxIV1MvTlMvMi9XUkMNSFdTL1RUQy8xL1dUQwxHR1MvTlMvOC9aQ0MMSEhTL05TLzIvWkNDA01BUwNHQVMDTURTA0dFUwNHR1MDTUhTA0hIUwNNTVMDSFRTA0dVUwNIV1MUKwNuZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dkZAILDxAPFgYfAQUETmFtZR8CBQ1TdXBwbGllcl9Db2RlHwNnZBAVJxMtLVNlbGVjdCBTdXBwbGllci0tGkF0aHVsYSBFbmdpbmVlcmluZyBwdnQgTHRkGENleWxvbiBFbGVjdHJpY2l0eSBCb2FyZBVDaGF0aHVyYSBDb25zdHJ1Y3Rpb24PRFcgQ29uc3RydWN0aW9uF0VkaXJpbWFubmEgQ29uc3RydWN0aW9uG0VkdWNhdGlvbiBEZXBhcnRtZW50IFNocm9mZhBFSEwgQ29uc3RydWN0aW9uE0dvZGFnZSBDb25zdHJ1Y3Rpb24TSGV3YWdlIENvbnN0cnVjdGlvbhRLdW1hcmFnZSBFbnRlcnByaXNlcxJMYWtzaGl0aGEgQnVpbGRlcnMbTWV0cm8gQ29tcHV0ZXIgVGVjaG5vbG9naWVzIE5hbmRhbmEgRW5naW5lZXJpbmcgQ29uc3RydWN0aW9uJ05hdGlvbmFsIEJ1aWxkaW5nIFJlc2VhcmNoIE9yZ2FuaXphdGlvbh5OaXNoYW50aGEgVGhpbWlyYSBDb25zdHJ1Y3Rpb24PT3BlbmluZyBCYWxhbmNlD09wZW5pbmcgQmFsYW5jZRZQYXRobWF0aGlsYWthIEJ1aWxkZXJzElBpdW1pIENvbnN0cnVjdGlvbhRQcmFzYWRpIENvbnN0cnVjdGlvbhZQcml5YW50aGEgQ29uc3RydWN0aW9uE1B1YnVkdSBDb25zdHJ1Y3Rpb24gUmFqaXRoYSBCdWlsZGVycyBhbmQgRWxlY3RyaWNhbHMXUmFuYXRodW5nYSBDb25zdHJ1Y3Rpb24QUmFuZGltYSBIb2xkaW5ncxRSYW53ZWxpIENvbnN0cnVjdGlvbhJTYW1hbiBDb25zdHJ1Y3Rpb24RU2lyaXBhbGEgQnVpbGRlcnMSU2l0aHVtaW5hIEFnZW5jaWVzFlNpdGh1bWluYSBDb25zdHJ1Y3Rpb24RU05KSyBDb25zdHJ1Y3Rpb24VU3VzYW50aGEgQ29uc3RydWN0aW9uE1RhbmFrYSBDb25zdHJ1Y3Rpb24PVE4gQ29uc3RydWN0aW9uElVkYXlhIENvbnN0cnVjdGlvbhdXZWxpd2l0aXlhIENvbnN0cnVjdGlvbhZXaWRhbmFyYWNoY2hpIEJ1aWxkZXJzFFlhc2luZHUgQ29uc3RydWN0aW9uFScBMAJBRQNDRUICQ0MCRFcCRUMGU2hyb2ZmA0VITAZHb2RhZ2UCSEMCS0UCTEIFTWV0cm8HTmFuZGFuYQROQlJPA05UQwNPcG4EWDAwWAJQQgNQVUMDUFJDAlBDA1BCQwNSQkUDUlRDAlJIAlJDBVNhbWFuAlNCAlNBA1NUQwRTTkpLAlNDBlRhbmFrYQJUTgVVZGF5YQJXQwJXQgJZQxQrAydnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2dnZ2cWAWZkAg0PEGRkFgBkAg8PEGRkFgBkAhEPEGRkFgBkZNiCllR/wB0NXuy17n19hWRqVpTy">
</div>

<script type="text/javascript">
//<![CDATA[
var theForm = document.forms['aspnetForm'];
if (!theForm) {
    theForm = document.aspnetForm;
}
function __doPostBack(eventTarget, eventArgument) {
    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
        theForm.__EVENTTARGET.value = eventTarget;
        theForm.__EVENTARGUMENT.value = eventArgument;
        theForm.submit();
    }
}
//]]>
</script>


<script src="/WebResource.axd?d=8uuCjCvra4VkHvgtBbWAxEJx543EDTr0VI0tuggqCufyZfPM75mEWAlkDt-Rn4_ZKU4VgoSDnWDdSSVfe-hC_XEXkCM1&amp;t=636284831271971599" type="text/javascript"></script>


<script src="/WebResource.axd?d=L2y4jEMiOg1MP1axg-zzOxZ9OOgnio8CM_BWvZ_FzBZ_Vx1WkBl96_xvhCBA9qPBY_DV7DIFz4Uw5r1cM7XZFStZGnA1&amp;t=636284831271971599" type="text/javascript"></script>
<script type="text/javascript">
//<![CDATA[
function WebForm_OnSubmit() {
if (typeof(ValidatorOnSubmit) == "function" && ValidatorOnSubmit() == false) return false;
return true;
}
//]]>
</script>


<div>
    <input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="41E896D7">
    <input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="/wEWoQECmYfjiAYC+4eX4AgCx4GBngYC2oC8xQUCx4C8xQUClJfU1AMC3ZO4hwQClJfYpAYCzebSiQYCnK+J8Q0CtayJ8Q0C89qT/gcC1vDpuAQC9/Ctxw4C1KHd8A4Cx5T7sgcCmpzP5w8CqKDJqQMC2oDQtgcC+ZTIfwKUl8SsBwLZmLG1BgKanIfWBQLfofm3AwKPzYjICALJoO2SBQKanJ/rAQLJsquSAQLJk8DMDgLIma3dBALImcWQBgLJmcWQBgKUl7iMDwLukd/EAQKanNesBwLagIDwCwKu0sW4BQLFmYDwCwLukYtdApSX5IECApu7zIkPAseU+5cBAtSrl+sKApqc3/0CApGMzu0CAvC3/s8JAseU66UDApSXoPkBArXyl5MLAqTi4qsLAuLs34kLAui4iaELAtqAjKoFAoPsr+kKApqcj40LAo/NxIMLApqck7MBApSXjP4KAuLJwJgFAqq49dEFApqc844HApSX5PMNApSXqNUNAoC6y9cKAu6R9+cIAoC6k6AHAqrr9Z4EApmnsdMBAt6C7PcNAuLcmIcDAoOGxbsOAqvo66YEAqXTwbcEAtWwjaIDAraj8rYLApSXzIkCAqKm4cYCAqL+lOkMAvO78oYJAqTQ1pIMAsWZkPgIApqcj4kDAseUt9YLApqc370CAuXn9PYFArajstkNAuSMiMYIAt3V0YYMAsiZ7ZoLAoLYw28Cmpyf/Q0C//6R6QYClJfQ2wYCz4+9qAgCx5TPugoCxZmE1ggC9eKX0gsC8sqz1g8Cj7ukmwYClJfQ1AICx5TDswEC+ZjYdQLzmNh1AvmYzHUC85jIdQLzmPB1AvmYvHYC5Ji8dgL5mKh2AuSYjHYC85iIdgLkmLB2ApKd1PwGAoLy/pIKAs3ywowKAq+997gEAs/yyowKAs7ymowKAsnyyowKAoet39oGAou08LkDArKMsJoDAvryyowKAvfywowKAvby9owKApyc+5kDAoaGnZcNAoCQsmkCz5TRpgoCp7/u6gkCgLK58wwC4vL2jAoC+ZTVpgoC+ZTZpgoC4vLKjAoC+ZSZpQoCjcHc+AcC+5TRpgoC/PKejAoC/PLKjAoCpKjLrQgC//L2jAoC//LyjAoC+pTRpgoC58vg0AwC//LKjAoC/YPtlQ4C/vLmjAoC9ce+0g4C+/LKjAoC+/L2jAoC5fLKjAoCiKbwkgIChbTD9g8CnpOfYgLc3uCnBALc3tSnBALc3tinBALc3synBAK0w7i7DQKA4sljkqYPlKXWPXgyQ41dD2oSn/fURvU=">
</div>
                         


                <span id="ctl00_Label2" style="color:#0033CC;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PROVINCIAL DEPARTMENT OF EDUCATION, SOUTHERN PROVINCE...</span>
       
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;

<h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Purchase Return!</h1>   <div id="timer"></div>
    </div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

        

<section id="footer">
    <!--<img src="img\Footer.png" class="footer-img">-->
<!--<div class="container">
    <div class="row">
        <div class="col-md-2 footer-box">
            <img src="img\logo.png">-->
            <!--<p><b>Provincial Department of Education</b><br><b>Southern Province</b></p>
        </div>
        <div class="col-md-4 footer-box">
            <p><b>CONTACT US</b></p>
            <p><i class ="fa fa-map-marker"></i> Upper Dickson Road, Galle, Sri Lanka.</p>
            <p><i class ="fa fa-envelope-o"></i> sped.assetsmanagement@gmail.com</p>
            <p><i class ="fa fa-phone"></i> +94712174821</p>
        </div>
        <div class="col-md-4 footer-box">
            <p><b>SUBSCRIBE NEWSLETTER</b></p>
            <input type="email" class="form-control" placeholder="Your Email">
            <button type="button" class="btn btn-primary">Subscribe</button>
        </div>  
    </div>  
</div> --> <!-------container-------->
    <div>
        <hr>
        <p class="copyright">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All rights received...&nbsp;&amp;&nbsp;Website Crafted by - DPS Sampath ©</p>
    </div>
</section>

<script src="js/timer.js"></script>
    
</body>
</html>
<?php mysqli_close($connection); ?>