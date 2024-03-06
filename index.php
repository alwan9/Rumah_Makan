<?php
include "componets/header.php";
include "componets/navbar.php";
?>
<script>
alert($pesan);
</script>

<header class="w-screen h-screen grid grid-cols-2 items-center">
    <img class="z-0 h-screen" src="assets/header.png" alt="">

    <div class="text-zinc-300">

        <h1 class="text-7xl font-bold">Warung Lezat <br> <span class="bg-gradasi1">Barokah</span></h1>
        <p class="text-4xl mt-[3%] font-medium w-[80%]">Selamat datang di toko kami, silahkan pilih menu yang di
            inginkna
        </p>
        <a href="#Products">
            <button
                class="px-10 py-3 text-zinc-200 font-bold bg-orange-600 hover:bg-orange-800 duration-300 rounded-2xl mt-[5%]">
                Lihat Produk >
            </button>
        </a>
    </div>
</header>


<!--  -->
<div class=" grid grid-cols-2 items-center my-5">
    <div class="px-36  text-3xl text-zinc-50 font-light">
        <span class="font-medium"> "Warung Lezat Barokah"</span>
        merupakan
        <span class="font-medium">destinasi makan modern dengan sentuhan tradisional yang menawarkan berbagai
            hidangan sehat.</span> Dengan visi untuk memberikan pengalaman kuliner <span class="font-medium"> yang lezat
            dan penuh berkah, </span> warung ini
        menghadirkan menu makanan yang diolah <span class="font-medium">dengan bahan-bahan segar dan berkualitas
            tinggi.</span>
    </div>
    <img class=" " src="assets/asset1.png" alt="">
</div>

<!--  -->
<div class="px-[10%] bg-zinc-900 py-[7%] relative ">
    <h1 class="text-6xl text-zinc-50 font-bold text-center">With <span class="bg-gradasi1"> Healthy</span></h1>
    <div class="grid grid-cols-3 items-center gap-5 px-[10%] mt-[10%]">
        <img class="px-[25%]" src="assets/heath1.png" alt="">
        <img class="px-[25%]" src="assets/heath3.png" alt="">
        <img class="px-[25%]" src="assets/heath2.png" alt="">
    </div>
</div>



<!--  -->
<div id="Products" class="py-[7%] ">
    <h1 class="text-6xl text-zinc-50 font-bold text-center mb-24">Semua Menu</h1>
    <div class="px-[10%] grid grid-cols-4  gap-5">
        <?php
        include "logic/koneksi.php";
        include "logic/create.php";
        include "logic/delete.php";
        include "logic/variabel.php";


        $sql2 = "SELECT * FROM makanan ORDER BY id_makanan DESC";
        $q2 = mysqli_query($koneksi, $sql2);
        while ($data = mysqli_fetch_array($q2)) {
            $id = $data['id_makanan'];
            $nama = $data['nama'];
            $harga = number_format($data['harga'], 0, ',', '.');
            // $harga = $data['harga'];
            $stok = $data['stok'];
            $des = $data['deskripsi'];
            $img = $data['img'];
            $tanggal = $data['tanggal'];
        ?>


        <a href="#">
            <div
                class="pb-[25%] h-[450px] border-orange-400 bg-zinc-800 hover:bg-zinc-900 duration-300 border-[1.5px] rounded-md px-3 py-3 relative">
                <img class=" w-[100%] h-[300px] rounded-sm " src="assets/product/<?= $img ?>" alt="">
                <h2 class="w-[80%] font-bold text-2xl mt-7"><?= $nama ?></h2>
                <h3 class="text-orange-500 font-bold text-2xl mt-7 absolute right-5 ">Rp.<?= $harga ?></h3>
            </div>
        </a>

        <?php } ?>
    </div>

</div>


<!--  -->
<div id="Contact" class="px-[10%] py-[7%] bg-zinc-900 rounded-t-3xl ">
    <div class="grid grid-cols-1 items-center mr-5 gap-3">
        <img class="h-[50px]" src="assets/logo.png" alt="">
        <div class="font-bold text-2xl bg-gradasi1">Fresh</div>
    </div>

    <p class="text-zinc-500 text-center text-4xl">Warung Lezat Barokah tidak hanya menyediakan hidangan sehat,
        tetapi juga memberikan
        nilai tambah dengan

        memberikan perhatian khusus pada kebersihan, pelayanan ramah, dan harga yang terjangkau.
        <br><br><br><br><br>
        Dengan semangat memberikan kebaikan melalui makanan, Warung Lezat Barokah menjadi pilihan yang sempurna bagi

        mereka yang menghargai kesehatan tanpa mengorbankan kenikmatan kuliner.
    </p>
</div>


<?= include "componets/footer.php" ?>