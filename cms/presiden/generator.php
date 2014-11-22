<script type="text/javascript">
function onoff(a){
  var e=document.getElementById('kolom');
  if(a=="on"){
    e.style.visibility="visible"
    e.style.display="block"
  } else {
    e.style.visibility="hidden"
    e.style.display="none"
  }
  return true;
}
</script>
<table class="tablebg1" width="750" cellspacing="0" cellpadding="4" align="center">
   <tr>
      <td>
         <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
               <td width="60"><img src="/images/home.png" border="0" alt="Home" /></td>
               <td><font size="3"><b>Generate Static</b></font></td>
            </tr>
         </table>
         <table class="tablebg2" width="100%" cellspacing="0" cellpadding="4">
            <tr>
               <td>
                  <table width="96%" border="0" cellspacing="0" cellpadding="0" align="center">
                     <tr>
                        <td>

<form name="generator" action="/cgi-bin/generate-static.pl" method="post">
	Aksi:<br>
	<input type=radio name=aksi value=generate onclick="return onoff('on')">Generate<br>
	<input type=radio name=aksi value=sinkron onclick="return onoff('off')">Syncronize<br>
	<input type=radio name=aksi value=status checked onclick="return onoff('off')">Cek Status<br><br>
	<div id="kolom" style="display:none">
	Kolom:<br>
	<b>Situs Presiden</b><br>
	<input type=checkbox name=kolom value=topik>Topik<br>
	<input type=checkbox name=kolom value=fokus>Berita<br>
	<input type=checkbox name=kolom value=indexonly>Fokus Aktual/Mutiara Kata<br>
	<input type=checkbox name=kolom value=pers>Pers<br>
	<input type=checkbox name=kolom value=pidato>Pidato<br>
	<input type=checkbox name=kolom value=wawancara>Wawancara dan Kolom<br>
	<input type=checkbox name=kolom value=kliping>Kliping<br>
	<input type=checkbox name=kolom value=perspektif>Perspektif<br>
	<input type=checkbox name=kolom value=sudutistana>Sudut Istana<br>
	<input type=checkbox name=kolom value=km0>Km0<br>
	<input type=checkbox name=kolom value=galeri>Album Foto<br>
	<input type=checkbox name=kolom value=beritafoto>Berita Foto<br>
	<input type=checkbox name=kolom value=sms>SMS<br>
	<input type=checkbox name=kolom value=pobox>PO BOX<br>
	<input type=checkbox name=kolom value=kotakpesan>Kotak Pesan<br>
	<input type=checkbox name=kolom value=uu>Perundang-undangan<br>
	<input type=checkbox name=kolom value=english>English Version (Pidato/Pers/Wawancara)<br>
	<input type=checkbox name=kolom value=kibar>Kibar<br>
	<input type=checkbox name=kolom value=buku>Buku-Selalu Ada Pilihan<br>
        
	<input type=checkbox name=kolom value=ibunegara><b>Situs Ibunegara</b><br>
	<input type=checkbox name=kolom value=istana><b>Situs Istana</b><br>
	Bulan (yyyydd): <input type=text name=tanggal value="<?php echo date("Ym"); ?>"><br>
	</div>
	<input type=submit name=borang value="Kirim"><br>
	</td>
                     </tr>
                  </table>
               </td>
            </tr>
         </table>
      </td>
   </tr>
</table>

</form>
