<!DOCTYPE html>
<html lang="en">
<head>
<title>INSTRUCTION LETTER</title>
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
 					<h1><b>INSTRUCTION LETTER</b></h1>
 					<p class="mt-3"><b>SOUTHERN PROVINCE EDUCATION DEPARTMENT ASSET MANAGEMENT SYSTEM</p></b>
 				</div>
 			</div>
</section>

 	<div class="container">	
 			<table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Year</th>
                <th>Code</th>
                <th>Description</th>
                <th>Download</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>01</td>
                <td>2021.02.03</td>
                <td>2021</td>
                <td>01 - 2021</td>
                <td>Accounting for Non-financial Assets. (Line Ministry)</td>
                <td><a href="/ins/Instruction Letter - 01-2021.pdf" download="Instruction Letter - 01-2021.pdf">Download</a></td>
            </tr>
                <td>02</td>
                <td>2021.03.01</td>
                <td>2021</td>
                <td>02 - 2021</td>
                <td>Assessing Fixed Assets. (Provincial Councils)</td>
                <td><a href="/ins/Instruction Letter - 02-2021.pdf" download="Instruction Letter - 02-2021.pdf">Download</a></td>
            </tr>
                <td>03</td>
                <td>2021.07.26</td>
                <td>2021</td>
                <td>Null</td>
                <td>Completion of Fixed Assets Ledger.</td>
                <td><a href="/ins/Completion of Fixed Assets Ledger.pdf" download="Completion of Fixed Assets Ledger.pdf">Download</a></td>
            </tr>
            
        </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Year</th>
                <th>Code</th>
                <th>Description</th>
                <th>Download</th>
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

	