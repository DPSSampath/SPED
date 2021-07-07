<!DOCTYPE html>
<html lang="en">
<head>
<title>Imprest and Allocation</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
	<meta charset="UTF-8">

	<!--<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap.min.css">
</head>
 <body>
<section>
 		<div class="container my-3 py-5 text-center">
 			<div class="row mb-5">
 				<div class="col">
 					<h1><b>IMPREST & ALLOCATION</b></h1>
 					<p class="mt-3"><b>ACCOUNTS & PAYMENT BRANCH - SOUTHERN PROVINCE EDUCATION DEPARTMENT</p></b>
 				</div>
 			</div>
</section>

 	<div class="container">	
 			<table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Year/Month</th>
                <th>Description</th>
                <th>End date</th>
                <th>Update Format</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>01</td>
                <td>2021.01.01</td>
                <td>2021 January-December</td>
                <td>Allocation Distribution - 2021</td>
                <td></td>
                <td><a href="https://docs.google.com/spreadsheets/d/18Po59ImHGcuCG-UEp9c0H_4bOFgtVETVhH_VcDG-Zmc/edit?usp=sharing" target="_blank">Update Format</a></td>
            </tr>
            <tr>
                <td>02</td>
                <td>2021.02.01</td>
                <td>2021 - January</td>
                <td>Cash Cross Details</td>
                <td>2021.02.15</td>
                <td><a href="https://docs.google.com/spreadsheets/d/1iLcCThRgD4p53VcUtv5Kg9fKRyUzpBBrkT-MUH-rGSU/edit?usp=sharing" target="_blank">Update Format</a></td>
            </tr>
            <tr>
                <td>03</td>
                <td>2021.03.01</td>
                <td>2021 - February</td>
                <td>Cash Cross Details</td>
                <td>2021.03.15</td>
                <td><a href="https://docs.google.com/spreadsheets/d/1r09yXaeXO44CKxZc6Trj3gwz8DeN742oP67P3dwoM_c/edit?usp=sharing" target="_blank">Update Format</a></td>
            </tr>
            <tr>
                <td>04</td>
                <td>2021.03.01</td>
                <td>2021 - January</td>
                <td>Recurrent & Capital Imprest Request</td>
                <td>2021.03.15</td>
                <td><a href="https://docs.google.com/spreadsheets/d/1ZZusQRck8fOZMr6x87ax8kNPGKgQGXIig9n27lFeET8/edit?usp=sharing" target="_blank">Update Format</a></td>
            </tr>
            <tr>
                <td>05</td>
                <td>2021.04.01</td>
                <td>2021 - March</td>
                <td>Cash Cross Details</td>
                <td>2021.04.15</td>
                <td><a href="https://docs.google.com/spreadsheets/d/1XO_EM3NZXJlI4spuGq0KgR80DVLBuHJPexm_HGkw87Q/edit?usp=sharing" target="_blank">Update Format</a></td>
            </tr>
                <td>06</td>
                <td>2021.05.01</td>
                <td>2021 - April</td>
                <td>Cash Cross Details</td>
                <td>2021.05.15</td>
                <td><a href="https://docs.google.com/spreadsheets/d/1ozYgntwOp-PrIfRuohVp0DElshtwhQul8FAwNfbP8dI/edit?usp=sharing" target="_blank">Update Format</a></td>
            </tr>
            </tr>
                <td>07</td>
                <td>2021.06.01</td>
                <td>2021 - May</td>
                <td>Cash Cross Details</td>
                <td>2021.06.30</td>
                <td><a href="https://docs.google.com/spreadsheets/d/1KiR1SepYWDYjrGDmstVU0Embs-L8ek12JqH-tBZokRc/edit?usp=sharing" target="_blank">Update Format</a></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Year/Month</th>
                <th>Description</th>
                <th>End date</th>
                <th>Update Format</th>
            </tr>
        </tfoot>
    </table>
</div>	

<!--<script src="js/table.js"></script>-->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap.min.js"></script>

<script>
	$(document).ready(function() {
    var table = $('#example').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );
</script>

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

	