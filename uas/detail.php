		<?php
		error_reporting(E_ERROR | E_PARSE);
		include "./ringkas.php";
		
		// scan nama file korpus
		$dir_corpus = "./corpus";
		$files 		= scandir($dir_corpus);
		$files		= array_slice($files, 2);
		//print_rfiles);
		
		// hasil
		if(isset($_GET["id"]) && isset($_GET["compression"])) {
			$id	 = $_GET["id"];
			$compression = $_GET["compression"];
			$output 	 = ringkas($id, $compression);
			$title 		 = substr($id, 0, -4);
		}

		?>

<div class="row">
    <div class="col-md-8">
        <?php
            $berita = mysql_query("SELECT * FROM berita WHERE id = '$id' ");
            $hasil = mysql_fetch_object($berita);
        ?>
        <br/>
        <h2><?= $hasil->judul; ?></h2>
        
        <img src="admin/img/<?= $hasil->gambar; ?>" height="100" with="100" align="center" class="img-thumbnail" />
        <p align="justify"><?php echo !empty($output['original'])? nl2br($output['original']) : "";?></p>
        <hr/>
    </div>

    <div class="col-md-4">
        <br/><br/>
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
          <hr/>
        <br/>
          <div class="sidebar-module">
            <h4>Share</h4>
            <ol class="list-unstyled">
              <li><a href="https://www.instagram.com/?hl=id" class="btn btn-primary" role="button">Instagram</a></li><br/>
              <li><a href="https://twitter.com/login?lang=id" class="btn btn-primary" role="button">Twitter</a></li><br/>
              <li><a href="https://web.facebook.com/" class="btn btn-primary" role="button">Facebook</a></li><br/>
            </ol>
          </div>
    </div>
</div>
<?php include 'contoh.php'; ?>