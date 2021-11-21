
<!DOCTYPE html>
<html>
<head>
	<title>POST – QUALIFICATION EVALUATION REPORT</title>
	<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
 <style>
	body{
		font-size: 14px;
	}
	h1, h2, h3, h4, h5, h6, li, blockquote, p, th, td {
		font-family: Helvetica, Arial, Verdana, sans-serif;
	}
	table{ 
		border-spacing: -1px;
		width: 100%;
	 }
	 .third_table{
		width: 50%;
		margin-top: 20px;
	 }
	 .border-bottom{
		border-bottom: 1px solid #000000!important;
	 }
	 table.main-table {
		border: 1px solid #000000;
		background-color: #ffffff;
		text-align: left;
		border-collapse: collapse;
	}

	table.main-table td,		
	table.main-table th {
		border: 1px solid #020202;
		padding: 3px 2px;
	}

	table.main-table tbody td {
		font-size: 14px;
		padding-left: 10px;
	}
	.empty{
		width: 5%!important;
	}
	.empty1{
		width: 1%!important;
	}
	
	.empty2{
		width: 2%!important;
	}
	.col2{
		width: 2%!important;
	}
	.col18{
		width: 18%!important;
	}
	.col20{
		width: 20%!important;
	}
	.col25{
		width: 25%!important;
	}
	.col40{
		width: 40%!important;
	}
	.col50{
		width: 50%!important;
	}
	.col60{
		width: 60%!important;
	}
	.findings{
		display: inline;
	}
	.findings:last-child{
		margin-left: 10px;
	}
	.findings-container{
		margin-top: 20px;
	}
	.col50{
		width: 50%!important;
	}
	table.second_table{
		margin-top: 20px;
	}
	.pad-top{
		padding-top: 10px;
	}
	.pad{
		padding-left: 10px;
		padding-right: 5px;
	}
	.table2{
		margin-bottom: 20px;
	}
	.text-right{
		float: right;
	}
	
</style>
<table class="table1">
	<tr>
		<td class="col25">Name of Procuring Entity:</td>
		<td class="col20">Project Reference Number: </td>
		<td class="border-bottom col20">
		<?php 
			if(strlen($projects_id)) {
				echo $projects_id;
			}
		?>
		</td>
	</tr>
	<tr>
		<td class="col25">Local Government Unit of Manticao</td>
		<td class="col20">Name of the Project:</td>
		<td class="border-bottom col20">
		<?php 
			if(strlen($projects_description)) {
				echo $projects_description;
			}
		?>
		</td>
	</tr>
	<tr>
		<td class="col25">Manticao, Misamis Oriental</td>
		<td class="col20">Location of the Project: </td>
		<td class="border-bottom col20">
			<?php 
				if(strlen($project_location)) {
					echo $project_location;
				}
			?>
		</td>
	</tr>
</table>

<p style="height: 5px;">Standard Form Number:</p>
<p>Revised on: May 24, 2004</p>

<h4 style="text-align: center; padding: 5px; border:1px solid black;width:100%;">POST – QUALIFICATION EVALUATION REPORT</h4>
<table class="table2">
	<tr>
		<td class="empty1"></td>
		<td class="col2">1.</td>
		<td class="col25">Name and address of Bidder:</td>
		<td class="border-bottom col40">
		<?php 
			if(strlen($bidder_name)) {
				echo $bidder_name;
			}
		?>
		</td>
		<td class="empty1"></td>
		
	</tr>
	<tr>
		<td class="empty1"></td>
		<td class="col2"></td>
		<td class="col25"></td>
		<td class="border-bottom col40">
		<?php 
			if(strlen($address)) {
				echo $address;
			}
		?>
		</td>
		<td class="empty1"></td>
	</tr>
	<tr>
		<td class="empty1"></td>
		<td class="col2">2.</td>
		<td class="col25">Rank in the List of Bids:</td>
		<td class="border-bottom col40">
			<?php 
				if(strlen($rank)) {
					echo $rank;
				}
			?>
		</td>
		<td class="empty1"></td>
	</tr>
	<tr>
		<td class="empty1"></td>
		<td class="col2">3.</td>
		<td class="col25">Bid price:</td>
		<td class="border-bottom col40">
			<?php 
				if(strlen($bid_price)) {
					echo number_format($bid_price);
				}
			?>
		</td>
		<td class="empty1"></td>
	</tr>
	<tr>
		<td class="empty1"></td>
		<td class="col2">4.</td>
		<td class="col25">Period of Post–Qualification:</td>
		<td class="border-bottom col40"></td>
		<td class="empty1"></td>
	</tr>
	<tr>
		<td class="empty1"></td>
		<td class="col2">5.</td>
		<td class="col25">Result of Post-Qualification:</td>
		<td class="pad-top border-bottom col40"></td>
		<td class="empty1"></td>
	</tr>
</table>
<!-- ------------------------------------main------------------------------------------ -->
<table class="main-table">
		<tr>
			<th class="col50" colspan="2"> Requirements</th>
			<th class="col25">Parties consulted</th>
			<th class="col25">Findings</th>
		</tr>
	<tr >
		<td colspan="2">Eligibility Envelope</td>
		<td></td>
		<td></td>
	</tr>
		<tr>
			<td class="empty"></td>
			<td>DTI Business Name Registration of SEC</td>
			<td>
				<?php 
					if(strlen($cons1)) {
						echo $cons1;
					}
				?>
			</td>
			<td>
				<?php 
					if(strlen($docs1)) {
						$findings = $docs1;
						if($findings == 1){
							echo 'Passed';
						}
						else{
							echo 'failed';
						}
					}
					
				?>
			</td>
		</tr>
		<tr >
			<td class="empty"></td>
			<td>Business Permit</td>
			<td>
				<?php 
					if(strlen($cons2)) {
						echo $cons2;
					}
				?>
			</td>
			<td>
				<?php 
					if(strlen($docs2)) {
						$findings = $docs2;
						if($findings == 1){
							echo 'Passed';
						}
						else{
							echo 'failed';
						}
					}
					
				?>
			</td>
		</tr>
		<tr >
			<td class="empty"></td>
			<td>Tax Identification</td>
			<td>
				<?php 
					if(strlen($cons3)) {
						echo $cons3;
					}
				?>
			</td>
			<td>
				<?php 
					if(strlen($docs3)) {
						$findings = $docs3;
						if($findings == 1){
							echo 'Passed';
						}
						else{
							echo 'failed';
						}
					}
					
				?>
			</td>
		</tr>
		<tr >
			<td class="empty"></td>
			<td>Statement of Non-Blacklisted </td>
			<td>
				<?php 
					if(strlen($cons4)) {
						echo $cons4;
					}
				?>
			</td>
			<td>
				<?php 
					if(strlen($docs4)) {
						$findings = $docs4;
						if($findings == 1){
							echo 'Passed';
						}
						else{
							echo 'failed';
						}
					}
					
				?>
			</td>
		</tr>
		<tr >
			<td class="empty"></td>
			<td>Certification of No-Relationship</td>
			<td>
				<?php 
					if(strlen($cons5)) {
						echo $cons5;
					}
				?>
			</td>
			<td>
				<?php 
					if(strlen($docs5)) {
						$findings = $docs5;
						if($findings == 1){
							echo 'Passed';
						}
						else{
							echo 'failed';
						}
					}
					
				?>
			</td>
		</tr>
		<tr >
			<td class="empty"></td>
			<td>Valid joint venture agreement</td>
			<td>
				<?php 
					if(strlen($cons6)) {
						echo $cons6;
					}
				?>
			</td>
			<td>
				<?php 
					if(strlen($docs6)) {
						$findings = $docs6;
						if($findings == 1){
							echo 'Passed';
						}
						else{
							echo 'failed';
						}
					}
					
				?>
			</td>
		</tr>
		<tr >
			<td class="empty"></td>
			<td>Authorizing BAC to verify statements</td>
			<td>
				<?php 
					if(strlen($cons7)) {
						echo $cons7;
					}
				?>
			</td>
			<td>
				<?php 
					if(strlen($docs7)) {
						$findings = $docs7;
						if($findings == 1){
							echo 'Passed';
						}
						else{
							echo 'failed';
						}
					}
					
				?>
			</td>
		</tr>
		<tr >
			<td class="empty"></td>
			<td>On-going and awarded contracts</td>
			<td>
				<?php 
					if(strlen($cons8)) {
						echo $cons8;
					}
				?>
			</td>
			<td>
				<?php 
					if(strlen($docs8)) {
						$findings = $docs8;
						if($findings == 1){
							echo 'Passed';
						}
						else{
							echo 'failed';
						}
					}
					
				?>
			</td>
		</tr>
		<tr >
			<td class="empty"></td>
			<td>Completed similar contracts</td>
			<td>
				<?php 
					if(strlen($cons9)) {
						echo $cons9;
					}
				?>
			</td>
			<td>
				<?php 
					if(strlen($docs9)) {
						$findings = $docs9;
						if($findings == 1){
							echo 'Passed';
						}
						else{
							echo 'failed';
						}
					}
					
				?>
			</td>
		</tr>
		<tr >
			<td class="empty"></td>
			<td>Copies of end-user’s acceptance letters for completed contracts</td>
			<td>
				<?php 
					if(strlen($cons10)) {
						echo $cons10;
					}
				?>
			</td>
			<td>
				<?php 
					if(strlen($docs10)) {
						$findings = $docs10;
						if($findings == 1){
							echo 'Passed';
						}
						else{
							echo 'failed';
						}
					}
					
				?>
			</td>
		</tr>
		<tr >
			<td class="empty"></td>
			<td>Specification of whether or not the prospective bidder is a manufacturer, supplier or distributor</td>
			<td>
				<?php 
					if(strlen($cons11)) {
						echo $cons11;
					}
				?>
			</td>
			<td>
				<?php 
					if(strlen($docs11)) {
						$findings = $docs11;
						if($findings == 1){
							echo 'Passed';
						}
						else{
							echo 'failed';
						}
					}
					
				?>
			</td>
		</tr>
		<tr >
			<td class="empty"></td>
			<td>Audited Financial statements</td>
			<td>
				<?php 
					if(strlen($cons12)) {
						echo $cons12;
					}
				?>
			</td>
			<td>
				<?php 
					if(strlen($docs12)) {
						$findings = $docs12;
						if($findings == 1){
							echo 'Passed';
						}
						else{
							echo 'failed';
						}
					}
					
				?>
			</td>
		</tr>
		<tr >
			<td class="empty"></td>
			<td>NFCC or credit line or cash deposit certificate</td>
			<td>
				<?php 
					if(strlen($cons13)) {
						echo $cons13;
					}
				?>
			</td>
			<td>
				<?php 
					if(strlen($docs13)) {
						$findings = $docs13;
						if($findings == 1){
							echo 'Passed';
						}
						else{
							echo 'failed';
						}
					}
					
				?>
			</td>
		</tr>
	<tr >
		<td colspan="2">Technical Envelope</td>
		<td></td>
		<td></td>
	</tr>
		<tr >
			<td class="empty"></td>
			<td>Bid security</td>
			<td>
				<?php 
					if(strlen($cons14)) {
						echo $cons14;
					}
				?>
			</td>
			<td>
				<?php 
					if(strlen($docs14)) {
						$findings = $docs14;
						if($findings == 1){
							echo 'Passed';
						}
						else{
							echo 'failed';
						}
					}
					
				?>
			</td>
		</tr>
		<tr >
			<td class="empty"></td>
			<td>Authority of signatory</td>
			<td>
				<?php 
					if(strlen($cons15)) {
						echo $cons15;
					}
				?>
			</td>
			<td>
				<?php 
					if(strlen($docs15)) {
						$findings = $docs15;
						if($findings == 1){
							echo 'Passed';
						}
						else{
							echo 'failed';
						}
					}
					
				?>
			</td>
		</tr>
		<tr >
			<td class="empty"></td>
			<td>Production/Delivery Schedule</td>
			<td>
				<?php 
					if(strlen($cons16)) {
						echo $cons16;
					}
				?>
			</td>
			<td>
				<?php 
					if(strlen($docs16)) {
						$findings = $docs16;
						if($findings == 1){
							echo 'Passed';
						}
						else{
							echo 'failed';
						}
					}
					
				?>
			</td>
		</tr>	
		<tr >
			<td class="empty"></td>
			<td>Manpower Requirements</td>
			<td>
				<?php 
					if(strlen($cons17)) {
						echo $cons17;
					}
				?>
			</td>
			<td>
				<?php 
					if(strlen($docs17)) {
						$findings = $docs17;
						if($findings == 1){
							echo 'Passed';
						}
						else{
							echo 'failed';
						}
					}
					
				?>
			</td>
		</tr>	
		<tr >
			<td class="empty"></td>
			<td>After-sales service/parts, if applicable</td>
			<td>
				<?php 
					if(strlen($cons18)) {
						echo $cons18;
					}
				?>
			</td>
			<td>
				<?php 
					if(strlen($docs18)) {
						$findings = $docs18;
						if($findings == 1){
							echo 'Passed';
						}
						else{
							echo 'failed';
						}
					}
					
				?>
			</td>
		</tr>	
		<tr >
			<td class="empty"></td>
			<td>Technical Specifications</td>
			<td>
				<?php 
					if(strlen($cons19)) {
						echo $cons19;
					}
				?>
			</td>
			<td>
				<?php 
					if(strlen($docs19)) {
						$findings = $docs19;
						if($findings == 1){
							echo 'Passed';
						}
						else{
							echo 'failed';
						}
					}
					
				?>
			</td>
		</tr>	
		<tr >
			<td class="empty"></td>
			<td>Commitment to extend a credit line or cash deposit equivalent to 10% of the ABC</td>
			<td>
				<?php 
					if(strlen($cons20)) {
						echo $cons20;
					}
				?>
			</td>
			<td>
				<?php 
					if(strlen($docs20)) {
						$findings = $docs20;
						if($findings == 1){
							echo 'Passed';
						}
						else{
							echo 'failed';
						}
					}
					
				?>
			</td>
		</tr>	
		<tr >
			<td class="empty"></td>
			<td>Certification of compliance with labor laws</td>
			<td>
				<?php 
					if(strlen($cons21)) {
						echo $cons21;
					}
				?>
			</td>
			<td>
				<?php 
					if(strlen($docs21)) {
						$findings = $docs21;
						if($findings == 1){
							echo 'Passed';
						}
						else{
							echo 'failed';
						}
					}
					
				?>
			</td>
		</tr>
	<tr >
		<td colspan="2">Financial Envelope</td>
		<td></td>
		<td></td>
	</tr>
		<tr >
			<td class="empty"></td>
			<td>Bid Prices in Bill of Quantities</td>
			<td>
				<?php 
					if(strlen($cons22)) {
						echo $cons22;
					}
				?>
			</td>
			<td>
				<?php 
					if(strlen($docs22)) {
						$findings = $docs22;
						if($findings == 1){
							echo 'Passed';
						}
						else{
							echo 'failed';
						}
					}
				?>
			</td>
		</tr>
		<tr >
			<td class="empty"></td>
			<td>Recurring and Maintenance Costs</td>
			<td>
				<?php 
					if(strlen($cons23)) {
						echo $cons23;
					}
				?>
			</td>
			<td>
				<?php 
					if(strlen($docs23)) {
						$findings = $docs23;
						if($findings == 1){
							echo 'Passed';
						}
						else{
							echo 'failed';
						}
					}
					
				?>
			</td>
		</tr>
</table>
<!--------------------------------------end main------------------------------------------ -->

<div class="findings-container">
	<p class="findings">Findings: </p>

	<?php
	if($findings_result == true)
	{
		echo '<p class="findings">(<span> x </span>) Responsive</p>
			<p class="findings">(<span> </span>) Non-Responsive</p>';
	}
	else{
		echo '<p class="findings">(<span> </span>) Responsive</p>
			<p class="findings">(<span> x </span>) Non-Responsive</p>';
	}
		
	?>
</div>
	<table class="second_table">
		<tr>
			<td colspan="4" class="col50">Prepared by:</td>
			<td colspan="2" class="col50">Submitted by:</td>
		</tr>
		<tr>
			<td class="border-bottom col25">
				<?php 
					if(strlen($head_twg_name)) {
						echo $head_twg_name;
					}
				?>
			</td>
			<td class="pad">Date:</td>
			<td class="border-bottom col18"></td>
			<td class="empty2"></td>
			<td class="border-bottom col25">
			<?php 
				if(strlen($head_bac_name)) {
					echo $head_bac_name;
				}
			?>
			</td>
			<td class="pad">Date:</td>
			<td class="border-bottom col18"></td>
		</tr>
		<tr >
			<td  colspan="4" class="pad-top col50">Head – BAC TWG</td>
			<td  colspan="3" class="pad-top col50">Head – BAC Secretariat</td>
		</tr>
	</table>

	<table class="third_table">

		<tr>
			<td class="pad-top col18">Noted by: </td>
			<td colspan="3" class="pad-top border-bottom col25"></td>
		</tr>
		<tr >
			<td class="pad-top col25"></td>
			<td colspan="3" class="pad-top col25">End User/Requisitioning Office</td>
		</tr>
		<tr >
			<td class="pad-top col18"></td>
			<td class="pad-top col2">Date:</td>
			<td colspan="2" class="pad-top border-bottom col18"></td>
		</tr>
	</table>
</body>
</html>
