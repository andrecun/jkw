<?php if (($userku=="") && ($pswdku=="") && ($levelku=="")) { echo "<meta http-equiv=refresh content='0;url=../index.php'>"; die(); } ?>

<br />
<table class="tablebg1" width="100%" cellspacing="0" cellpadding="4" align="center">
	<tr>
		<td>
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="60"><img src="/images/error.png" border="0" alt="Error"></td>
					<td><font size="3"><b>Error</b></font></td>
				</tr>
			</table>
			<table class="tablebg2" width="100%" cellspacing="0" cellpadding="4" align="center">
				<tr>
					<td>
						<table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
							<tr>
								<td align="center">
									<br><font color="red" size="5"><?php echo"$bhs_error_kode"; ?></font><br><br>
								</td>
							</tr>
						</table>					
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>