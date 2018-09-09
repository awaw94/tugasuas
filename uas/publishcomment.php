<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$nmdb = 'berita';
$con = mysql_connect($host, $user, $pass);
if(!$con)
die("Tidak dapat melakukan koneksi ke server MySQL");
mysql_select_db("berita", $con);
?>
<?php
function getcomment($art_id){
$commentquery = mysql_query("SELECT * FROM comment WHERE art_id='$art_id'
ORDER BY id DESC") or die(mysql_error());
$commentNum = mysql_num_rows($commentquery);
echo "<h4>" . "Tinggalkan Komentar Anda" . "</h4>";
echo "<b>" . $commentNum . " terimakasih sudah komentar..." .
"</b>" . "<br />" . "<br />";
echo "<hr>";
while($row = mysql_fetch_array($commentquery))
 {
 echo "<b>" . $row['nama'] . "</b>" . " " . " | " . " " . "<i>" .
$row['date'] . "</i>" . "<br />" . "<br />" . $row['komentar'] . "<br />";
 echo "<hr>";
 }
}
?>