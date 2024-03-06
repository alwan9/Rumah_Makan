<?php
include "componets/header.php";
include "componets/navbar.php";
include "logic/koneksi.php";
include "logic/variabel.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql4 = "SELECT * FROM users WHERE username='$username' password='$password' ";
    $q4 = mysqli_query($koneksi, $sql4);
    if ($q4) {
        echo "berhasil login";
    }
}

?>

<style>
.form__group {
    position: relative;
    padding: 20px 0 0;
    width: 100%;
    /* max-width: 380px; */
}

.form__field {
    font-family: inherit;
    /* width: 100%; */
    border: none;
    border-bottom: 2px solid #9b9b9b;
    outline: 0;
    font-size: 17px;
    color: #fff;
    padding: 7px 0;
    background: transparent;
    transition: border-color 0.2s;
}

.form__field::placeholder {
    color: transparent;
}

.form__field:placeholder-shown~.form__label {
    font-size: 17px;
    cursor: text;
    top: 20px;
}

.form__label {
    position: absolute;
    top: 0;
    display: block;
    transition: 0.2s;
    font-size: 17px;
    color: #9b9b9b;
    pointer-events: none;
}

.form__field:focus {
    padding-bottom: 6px;
    font-weight: 700;
    border-width: 3px;
    border-image: linear-gradient(to right, #054d14, #00ff26);
    border-image-slice: 1;
}

.form__field:focus~.form__label {
    position: absolute;
    top: 0;
    display: block;
    transition: 0.2s;
    font-size: 17px;
    color: #00ff26;
    font-weight: 700;
}

/* reset input */
.form__field:required,
.form__field:invalid {
    box-shadow: none;
}

button {
    padding: 15px 60px;
    background: transparent;
    border: 2px solid #054d14;
    font-size: 15px;
    font-weight: bold;
    color: #ffffff;
    border-radius: 6px;
    cursor: pointer;
    position: relative;
    display: flex;
    overflow: hidden;
    transition: all 0.5s;
    text-transform: uppercase;
}

button span {
    transition: all 0.5s;
    z-index: -1;
}

button::after,
button::before {
    content: "";
    position: absolute;
    width: 0;
    height: 100%;
    background: #00ff26;
    top: 0;
    transform: skewX(35deg);
    transition: all 0.5s;
    z-index: -1;
}

button::after {
    left: -20px;
}

button::before {
    right: -20px;
}

button:hover::after {
    width: 50%;
    left: 0;
}

button:hover::before {
    width: 50%;
    right: 0;
}
</style>

<div
    class="grid grid-cols-2 h-[96%] rounded-xl border-orange-400 border-[1px] my-[2%] items-center bg-zinc-900 bg-opacity-40 w-[96%] mx-[2%]">
    <img class="w-[100%] px-[20%]" src="assets/login.png" alt="">




    <form class="py-[20%] text-zinc-900" action="dashboard.php" method="post">
        <h1 class="text-zinc-50 font-semibold text-5xl">Login Akun</h1>
        <!-- username -->
        <br><br><br>
        <div class="form__group field">
            <input type="input" autocomplete="off" class="form__field w-[80%]" placeholder="username" name="username"
                required="">
            <label for="username" class="form__label text-zinc-50"> Name</label>
        </div>
        <!-- password -->
        <br><br><br>
        <div class="form__group field">
            <input type="input" autocomplete="off" class="form__field w-[80%]" placeholder="password" name="password"
                required="">
            <label for="password" class="form__label text-zinc-50"> password</label>
        </div>

        <br><br><br>
        <button class="button" type="login" name="login">login</button>
    </form>
</div>