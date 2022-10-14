class infoProduk {
    public function cetak(Produk $produk) {
        $str = "{$produk -> judul} | {$produk -> getLabels()}  (Rp . {$produk -> harga}) | ";
        return $str;
    }
}

public function cetak(Produk $produk) {
echo "komik : " . $produk3->getLabels();
echo "<br>";
echo "game : " . $produk4->getLabels();
echo "<br>";
$infoProduk1 = new infoProduk();
echo $infoProduk1 -> cetak($produk3);
echo $infoProduk1-> cetak($produk3);



?>