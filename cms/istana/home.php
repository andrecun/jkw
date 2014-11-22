<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<?php include("../istana/home.nav.php"); ?>

<br />
<table class="tablebg1" width="750" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/home.png" border="0" alt="Home" /></td>
					<td><font size="3"><b>Home</b></font></td>
				</tr>
			</table>
			<table class="tablebg2" width="100%" cellspacing="0" cellpadding="4">
				<tr>
					<td>
						<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
							<tr>
								<td>
								<?php if ($bhs=="eng") { ?>
									<p>&nbsp;</p>
									<p><font size="2" color="#800000"><b>Welcome to CMS!</b></font></p>
									<p>You currently logged in by username : <b><?php echo"$userku"; ?></b></p>
									<p>Please choose the menus above to process update content.</p>
									<p>&nbsp;</p>									
								<?php } else { ?>
									<p>&nbsp;</p>
									<p><font size="2" color="#800000"><b>Selamat Datang di CMS!</b></font></p>
									<p>Anda login dengan username : <b><?php echo"$userku"; ?></b></p>
									<p>Silahkan pilih menu-menu di atas untuk melakukan proses update content.</p>
									<p>&nbsp;</p>
								<?php } ?>	
								</td>
							</tr>
						</table>					
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>