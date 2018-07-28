<?php

if (!isset($_SESSION['login'])) {
    header('Location: index.php');
}
 
$config = include('protected/config.php'); 
?>
<html style="color:white !important;">
	<head>
		<link href="css/main.css" rel="stylesheet" type="text/css"/>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
		<title><?php echo $config['page_title'];?></title>
	</head>
	<body style="overflow:hidden; color:white !important;">
		<div class="container main_container">
			<h3><b><?php echo $config['heading_text'];?><br></b></h3>

			<?php 
			    $si_prefix = array( 'B', 'KB', 'MB', 'GB', 'TB', 'EB', 'ZB', 'YB' );
			    $base = 1024;

			    $bytes = disk_free_space("uploads/");
			    $class = min((int)log($bytes , $base) , count($si_prefix) - 1);
			    echo "Free space: ";
			    echo sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $si_prefix[$class] . ' / ';

			    $bytes = disk_total_space("uploads/");
			    $class = min((int)log($bytes , $base) , count($si_prefix) - 1);
			    echo sprintf('%1.2f' , $bytes / pow($base,$class)) . ' ' . $si_prefix[$class] . '<br />';
			?>
			<br>
			<?php if(empty($config['allowed_ips']) || in_array($_SERVER['REMOTE_ADDR'], $config['allowed_ips'])){?>
					<?php
					$ignore = Array("index.php", "js", "css", ".", "..", "gallery.php", "img", "upload.php", ".well-known", "cgi-bin", "server");
					$files1 = scandir("uploads/");
					?>
				<br>
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			        <thead style="background-color:white !important;">
			            <tr style="color:black !important;">
			                <th>FileName</th>
			                <th>Size (Bytes)</th>
			                <th>Date</th>
			                <th>Type</th>
			            </tr>
			        </thead>
			 
			        <tbody>
			        	<?php foreach($files1 as $file){
			        		if(!in_array($file, $ignore)){?>
			            <tr>
			                <td><a target="_blank" href="<?php echo $config['output_url'];?><?php echo($file);?>"><?php echo($file);?></a></td>
			                <td style="color:black !important;"><?php echo filesize('uploads/' . $file);?></td>
			                <td style="color:black !important;"><?php echo date ("d M Y H:i", filemtime('uploads/' . $file))?></td>
			                <td style="color:black !important;"><?php echo pathinfo($file, PATHINFO_EXTENSION);?></td>
			            </tr>
			            <?php } }?>
			        </tbody>
			    </table>
			<?php }?>
		</div>
		<script src="//code.jquery.com/jquery-1.11.3.min.js" type="text/javascript"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" type="text/javascript"></script>
		<script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js" type="text/javascript"></script>
		<script src="https://cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
		<script src="js/main.js" type="text/javascript"></script>
	</body>
</html>