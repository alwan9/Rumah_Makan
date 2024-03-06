<?php
include "componets/header.php";
include "componets/navbar_dashboard.php";
include "logic/koneksi.php";
include "logic/create.php";
include "logic/delete.php";
include "logic/variabel.php";
if (isset($_GET['op'])) {
    $op = $_GET['op'];
}

if ($op == 'delete') {
    $id = $_GET['id'];
    $sql3 = "DELETE FROM makanan WHERE id_makanan = '$id'";
    $q3 = mysqli_query($koneksi, $sql3);
    if ($q3) {
        $pesan = "berhasil dihapus";
        header("Location:http://localhost/restoran/index.php");
    }
}





?>

<style>
    .container {
        height: 300px;
        width: 300px;
        border-radius: 10px;
        box-shadow: 4px 4px 30px rgba(0, 0, 0, .2);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        padding: 10px;
        gap: 5px;

    }

    .header {
        flex: 1;
        width: 100%;
        border: 2px dashed royalblue;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .header svg {
        height: 100px;
    }

    .header p {
        text-align: center;
        color: white;
    }

    .footer {
        background-color: rgba(0, 110, 255, 0.075);
        width: 100%;
        height: 40px;
        padding: 8px;
        border-radius: 10px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: flex-end;
        color: white;
        border: none;
    }

    .footer svg {
        height: 130%;
        fill: royalblue;
        background-color: rgba(70, 66, 66, 0.103);
        border-radius: 50%;
        padding: 2px;
        cursor: pointer;
        box-shadow: 0 2px 30px rgba(0, 0, 0, 0.205);
    }

    .footer p {
        flex: 1;
        text-align: center;
    }

    #file {
        display: none;
    }
</style>




<header class="text-zinc-50  pt-[30%]">
    <div class="text-7xl font-bold pl-[5%]">
        <h1>
            Daftar Menu
            <br>
            Makanan
        </h1>
    </div>

    <!-- 


    <div>
        <form class="flex items-center gap-3 absolute right-0 px-[5%] mt-[10%] " action="" method="get">
            <div class="flex items-center">
                <input class=" w-80 py-2 px-5 rounded-lg text-zinc-800" placeholder="Masukan Produk barang..."
                    name="barang" type="text">
                <button class="ml-2 bg-orange-700 hover:bg-orange-900 duration-300 rounded-md px-2 py-2" type="submit"
                    name="keyword">cari</button>
            </div>
            <button class="tbh-prdk1 px-5 py-2 ">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path>
                    </svg> Tambah Produk
                </span>
            </button>
        </form>
    </div> -->
    <table class="table table-light mx-[5%]  w-[90%] border-[1px] border-opacity-35 border-white rounded-xl pt-16 bg-zinc-950 bg-opacity-70 mt-[15%]">


        <thead class="thead-light bg-zinc-800 h-[70px] border-[1px] border-white mt-36">
            <tr class="my-10 text-center h-[70px]">
                <th>No</th>
                <th>Nama</th>
                <th>Stok</th>
                <th>Harga</th>
                <th class="w-[40%]">Keterangan</th>
                <th>Tanggal</th>
                <th>Opsi</th>

            </tr>
        </thead>

        <?php
        $sql2 = "SELECT * FROM makanan ORDER BY id_makanan DESC";
        $q2 = mysqli_query($koneksi, $sql2);
        while ($data = mysqli_fetch_array($q2)) {
            $id = $data['id_makanan'];
            $nama = $data['nama'];
            $harga = $data['harga'];
            $stok = $data['stok'];
            $des = $data['deskripsi'];
            $img = $data['img'];
            $tanggal = $data['tanggal'];
        ?>
            <tbody>
                <tr class="text-center h-[100px]">
                    <td><?= $no++ ?></td>
                    <td class="text-left"><?= $nama ?></td>
                    <td><?= $harga ?></td>
                    <td><?= $stok ?></td>
                    <td class="text-left"><?= $des ?></td>
                    <td><?= $tanggal ?></td>
                    <!-- <td class="text-left">Steak Daging Sapi - Small</td>
                <td>52</td>
                <td>12.000</td>
                <td class="text-left">Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores fugiat
                    temporibus illo numquam,
                    non, rerum aliquid illum vel cum ex inventore laboriosam laudantium saepe minus eum, tempore sed
                    ratione reprehenderit?</td> -->
                    <td>
                        <a href="dashboard.php?op=delete&id=<?= $id ?>">
                            <button onclick="notifHapus()" class="px-4 py-2 bg-red-600 rounded-xl hover:bg-red-800 duration-300">
                                hapus</button>
                        </a>
                    </td>
                </tr>
            </tbody>
        <?php
        }
        ?>

    </table>






    <!-- input produk -->
    <form class="px-[10%] w-[100%] mt-[10%] pb-[20%] rounded-t-[90px] relative bg-zinc-900" action="" method="post">

        <h1 class="text-6xl font-bold pt-[7%]">Tambah Produk <br> Restoran</h1>
        <!-- nama -->
        <br><br>
        <label class="text-2xl" for="nama">Nama Produk</label><br>
        <div class="textInputWrapper h-[70px]">
            <input name="nama" id="nama" placeholder="Nama Produk" type="text" class="textInput text-xl">
        </div>
        <!-- stok -->
        <br><br>
        <label class="text-2xl" for="stok">Stok Produk</label><br>
        <div class="textInputWrapper h-[70px]">
            <input name="stok" id="stok" placeholder="stok Produk" type="text" class="textInput text-xl">
        </div>
        <!-- harga -->
        <br><br>
        <label class="text-2xl" for="harga">Harga Produk</label><br>
        <div class="textInputWrapper h-[70px]">
            <input name="harga" id="harga" placeholder="harga Produk" type="text" class="textInput text-xl">
        </div>
        <!-- deskripsi -->
        <br><br>
        <label class="text-2xl" for="deskripsi">Deskripsi Produk</label><br>
        <div class="textInputWrapper  h-[70px]">
            <textarea name="deskripsi" id="deskripsi" cols="30" class="textInput text-xl" rows="10"></textarea>
        </div>
        <!-- image -->
        <br><br>
        <div class="container text-zinc-50 bg-zinc-700">
            <label for="file" class="header">
                <svg xmlns="http://www.w3.org/2000/svg" width="7em" height="7em" viewBox="0 0 1024 1024">
                    <path fill="currentColor" d="M763.024 259.968C718.4 141.536 622.465 66.527 477.553 66.527c-184.384 0-313.392 136.912-324.479 315.536C64.177 410.495.002 501.183.002 603.903c0 125.744 98.848 231.968 215.823 231.968h92.448c17.664 0 32-14.336 32-32c0-17.68-14.336-32-32-32h-92.448c-82.304 0-152.832-76.912-152.832-167.968c0-80.464 56.416-153.056 127.184-165.216l29.04-5.008l-2.576-29.328l-.24-.368c0-155.872 102.576-273.44 261.152-273.44c127.104 0 198.513 62.624 231.537 169.44l6.847 22.032l23.056.496c118.88 2.496 223.104 98.945 223.104 218.77c0 109.055-72.273 230.591-181.696 230.591h-73.12c-17.664 0-32 14.336-32 32c0 17.68 14.336 32 32 32l72.88-.095c160-4.224 243.344-157.071 243.344-294.495c0-147.712-115.76-265.744-260.48-281.312zM535.985 514.941c-.176-.192-.241-.352-.354-.512l-8.095-8.464c-4.432-4.688-10.336-7.008-16.24-6.976c-5.905-.048-11.777 2.288-16.289 6.975l-8.095 8.464c-.16.16-.193.353-.336.513L371.072 642.685c-8.944 9.344-8.944 24.464 0 33.84l8.064 5.471c8.945 9.344 23.44 6.32 32.368-3.024l68.113-75.935v322.432c0 17.664 14.336 32 32 32s32-14.336 32-32V603.34l70.368 77.631c8.944 9.344 23.408 12.369 32.336 3.025l8.064-5.472c8.945-9.376 8.945-24.496 0-33.84z" />
                </svg>
                <p class="mt-10">Browse File to upload!</p>
            </label>
            <label for="file" class="footer">
                <svg fill="#ffff" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M15.331 6H8.5v20h15V14.154h-8.169z"></path>
                        <path d="M18.153 6h-.009v5.342H23.5v-.002z"></path>
                    </g>
                </svg>
                <p>Pilih file</p>
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M5.16565 10.1534C5.07629 8.99181 5.99473 8 7.15975 8H16.8402C18.0053 8 18.9237 8.9918 18.8344 10.1534L18.142 19.1534C18.0619 20.1954 17.193 21 16.1479 21H7.85206C6.80699 21 5.93811 20.1954 5.85795 19.1534L5.16565 10.1534Z" stroke="#000000" stroke-width="2"></path>
                        <path d="M19.5 5H4.5" stroke="#000000" stroke-width="2" stroke-linecap="round"></path>
                        <path d="M10 3C10 2.44772 10.4477 2 11 2H13C13.5523 2 14 2.44772 14 3V5H10V3Z" stroke="#000000" stroke-width="2"></path>
                    </g>
                </svg>
            </label>
            <input id="file" name="image" type="file">
        </div>
        <!-- <label class="text-2xl" for="image">Image</label><br> -->
        <!-- <input name="image" type="file" id="image"> -->
        <br><br>
        <button type="submit" name="submit" class="tbh-prdk1 right-48 absolute ">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path>
                </svg> Tambah Produk
            </span>
        </button>
    </form>
</header>



<?php
include "./componets/footer.php";
?>