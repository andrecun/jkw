<?php 
require_once "lib/application.php";
include('template/meta.php');
?>

<body>
    <div id="mainbody">
    <div class="container presidenRI-container">
        <?php include('template/header.php'); ?>

        <div class="row presidenRI-contentDetail">
        	<div class="col-md-8 contentLeft">
        		<p class="title">Syarat &amp; Kondisi</p>
        		<div class="contentBerita">

        			
                       <div id="row" style="font-family: sans-serif">

                            <?php
                            $data="<strong>Situs Web Presiden Republik Indonesia</strong>

Dengan menggunakan situs web ini, maka anda telah mengerti dan menyetujui seluruh syarat dan kondisi yang berlaku dalam penggunaan Situs Presiden Republik Indonesia sebagaimana tercantum di bawah ini:
<ol>
    <li>Informasi yang diperoleh atau di-download oleh pengguna akan dipergunakan oleh sang pengguna secara bertanggung-jawab. Pengutipan atas sebagian atau seluruh isi situs web ini diijinkan dengan menyebutkan sumber-sumber secara lengkap.
    </li>
    <li>Situs web ini dimaksudkan semata-mata untuk keperluan komunikasi publik, serta mendukung penyampaian informasi Presiden Republik Indonesia Ir. H. Joko Widodo kepada Bangsa Indonesia dan Masyarakat Dunia. Tidak ada satu bagian pun dalam situs web ini yang bertujuan promosi atau merekomendasikan suatu kegiatan dari lembaga atau perorangan lain, kecuali jika kegiatan tersebut berhubungan dengan pelaksanaan tugas Presiden Republik Indonesia dan Ibu Negara.
    </li>
    <li>Setiap isi situs web ini dikelola dan diperbaharui oleh Biro Pers, Media dan Informasi, Sekretariat Presiden. Untuk itu, Biro Pers, Media dan Informasi, Sekretariat Presiden adalah satu-satunya lembaga yang memiliki hak penuh untuk menambah, mengubah dan mengurangi materi web site sewaktu-waktu sesuai dengan kebutuhan.
    </li>
    <li>Biro Pers, Media dan Informasi, Sekretariat Presiden tidak bertanggung-jawab atas materi situs web lembaga-lembaga lain yang di-link oleh Situs Presiden Republik Indonesia Ir. H. Joko Widodo. Link tersebut hanya disediakan untuk mempermudah pengguna memperoleh tambahan informasi dari lembaga-lembaga lain yang punya kaitan dengan Presiden Republik Indonesia Ir. H. Joko Widodo dalam hal pikiran, visi, pandangan, tugas, wewenang dan tindakannya. Demikian pula, jika situs web lembaga atau individu lain menyediakan link kepada situs web ini, tidak dapat diartikan bahwa Presiden Republik Indonesia secara resmi mendukung atau menyetujui kegiatan-kegiatan yang dilakukan oleh lembaga atau perorangan tersebut.
    </li>
    <li>Banyak materi yang disampaikan dalam situs ini ada dalam format .pdf, yang hanya dapat dibaca dengan menggunakan software Acrobat Reader. Software ini dapat di-download ke komputer pengguna secara gratis melalui alamat http://www.adobe.com/products/acrobat/readstep.html. Pengguna dianjurkan untuk men-download software tersebut terlebih dahulu. Situs ini tidak berkewajiban untuk menyediakan materi yang harus dibaca menggunakan Acrobat Reader tersebut dalam format lain. Nama Acrobat dan logo Acrobat adalah merek dagang dari Adobe Systems Incorporated.
    </li>
</ol>
Jika anda ingin menyampaikan pertanyaan, kritik, saran dan masukan lainnya agar menghubungi:
<strong>Biro Pers, Media dan Informasi, Sekretariat Presiden</strong>
Jl. Veteran No.16, Jakarta";
                             
                            ?>
                            <p style="text-align: justify"><?=  nl2br($data)?></p> 
                       </div>

        		</div>
        	</div>
        	<div class="col-md-4 contentRight">
        		<div class="presidenRI-box arsip">
                    <div class="boxHeader">
                        ARSIP
                    </div>
                    <img class="img-responsive" src="<?php echo $url_rewrite;?>assets/img/merahputih.png" class="img-responsive">

                    <div class="boxContent">
                        <div id="datepicker"></div>
                    </div>
                </div>

                 <?php
                include "view/right_menu.php";
                ?>
        	</div>
        </div>


        <?php include('template/javascript.php'); ?>
        <?php include('template/footer.php'); ?>
    </div>
    </div>
</body>
</html>
