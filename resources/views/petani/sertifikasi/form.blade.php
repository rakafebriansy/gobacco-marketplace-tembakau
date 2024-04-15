<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="../dist/output.css">
    <style>
        .tab {
            display: none;
        }
        .step.active > div{
            background-color: #9EB384;
        }
        .dropbtn {
            cursor: pointer;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {background-color: #ddd;}

        .show {display:block;}
        #kirimBtn {
            display: none;
        }
    </style>
</head>

<body>
    <!-- step 1 -->
    <form action="/petani/buat" method="post" enctype="multipart/form-data">
        @csrf
        <section class="font-poppins">
            <div class="bg-light-primary h-screen">
                <div class=" bg-light-secondary w-full z-10 justify-center flex flex-col items-center h-[20%]">
                    <ol class="flex items-center w-[60%]">
                        <li
                            class=" step flex w-full items-center  after:content-[''] after:w-full after:h-1 after:border-b after:border-light-primary after:border-4 after:inline-block ">
                            <div
                                class="flex items-center justify-center w-10 border-2 border-light-primary h-10 rounded-full lg:h-12 lg:w-12  shrink-0">
                                <h1 class="text-light-primary text-2xl font-semibold">1</h1>
                            </div>
                        </li>
                        <li
                            class="step flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-light-primary after:border-4 after:inline-block ">
                            <div
                                class="flex items-center justify-center border-2 border-light-primary w-10 h-10 bg-light-secondary rounded-full lg:h-12 lg:w-12  shrink-0">
                                <h1 class="text-light-primary text-2xl font-semibold">2</h1>
                            </div>
                        </li>
                        <li class="step flex items-center">
                            <div
                                class="flex items-center justify-center border-2 border-light-primary w-10 h-10 bg-light-secondary rounded-full lg:h-12 lg:w-12  shrink-0">
                                <h1 class="text-light-primary text-2xl font-semibold">3</h1>
                            </div>
                        </li>
                    </ol>
                </div>
                <div class="w-screen h-[80%]  bg-light-primary flex flex-col justify-start items-center">
                    <div class="w-full h-[75%] mt-5">
                        <h3 class="mb-10 text-3xl text-center font-bold leading-none text-light-secondary">Form Pengajuan
                            Sertifikasi</h3>
                        <div class="tab grid grid-flow-col grid-cols-9 gap-y-4 h-[70%]">
                            <div class="col-span-1"></div>
                            <div class="col-span-3">
                                <div class="">
                                    <label for="nama_petani" class="text-base font-medium text-light-secondary block mb-2 ">Nama
                                        Petani</label>
                                    <input type="text" value="{{ $petani->nama_petani }}" name="nama_petani" id="nama_petani"
                                        class="shadow-sm bg-light-fill bg-opacity-50 text-light-secondary rounded-lg block w-full p-2.5 focus:outline-slate-400"
                                        required="">
                                </div>
                                <div class="">
                                    <label for="alamat_petani" class="text-base font-medium text-light-secondary block mb-2">Alamat
                                    </label>
                                    <input type="text" value="{{ $petani->alamat_petani }}" name="alamat_petani" id="alamat"
                                        class="shadow-sm bg-light-fill bg-opacity-50 text-light-secondary rounded-lg block w-full p-2.5 focus:outline-slate-400"
                                        required="">
                                </div>
                                <div class=""">
                                    <label for=" email" class="text-base font-medium text-light-secondary block mb-2">
                                    Email</label>
                                    <input type="email" value="{{ $petani->email_petani }}" name="email_petani" id="email"
                                        class="shadow-sm bg-light-fill bg-opacity-50 text-light-secondary rounded-lg block w-full p-2.5 focus:outline-slate-400"
                                        required="">
                                </div>
                            </div>
                            <div class="col-span-1"></div>
                            <div class="col-span-3 flex flex-col justify-between items-end">
                                <div class="w-full">
                                    <div class=" ">
                                        <label for="no-hp"
                                            class="text-base font-medium text-light-secondary block mb-2">Nomor
                                            Telepon</label>
                                        <input type="text" value="{{ $petani->telp_petani }}" name="telp_petani" id="telp_petani"
                                            class="shadow-sm bg-light-fill bg-opacity-50 text-light-secondary rounded-lg block w-full p-2.5 focus:outline-slate-400"
                                            required="">
                                    </div>
    
                                    <div class=""">
                                        <label for=" ktp" class="text-base font-medium text-light-secondary block mb-2">No
                                        KTP</label>
                                        <input type="number" value="{{ $petani->noktp_petani }}" name="noktp_petani" id="noktp_petani"
                                            class="shadow-sm bg-light-fill bg-opacity-50 text-light-secondary rounded-lg block w-full p-2.5 focus:outline-slate-400"
                                            required="">
                                    </div>
                                </div>
    
                            </div>
    
    
                        </div>
                        <div class="tab grid grid-flow-col grid-cols-9 gap-y-4 h-[70%]">
                            <div class="col-span-1"></div>
                            <div class="col-span-3 ">
                                <div class="">
                                    <label for="nama" class="text-base font-medium text-light-secondary block mb-2 ">Produk
                                        Tembakau</label>
                                    <input type="text" name="" id=""
                                        class="shadow-sm bg-light-fill w-full  bg-opacity-50 text-light-secondary rounded-lg block p-2.5 focus:outline-slate-400">
                                </div>
                                <div class="">
                                    <label for="no-hp" class="text-base font-medium text-light-secondary block mb-2">Jenis
                                        Tembakau</label>
                                    <input type="text" name="id_jenis_tembakau" id="id_jenis_tembakau"
                                        class="shadow-sm bg-light-fill w-full bg-opacity-50 text-light-secondary rounded-lg block p-2.5 focus:outline-slate-400">
                                </div>
                                <label class="text-base font-medium text-light-secondary block mb-2 cursor-pointer w-[60%]">
                                    <p>Foto Tembakau</p>
                                    <div
                                        class="w-full bg-light-fill h-[10rem] bg-opacity-50 text-light-secondary rounded-lg p-2.5 box-border focus:outline-slate-400 grid grid-cols-3">
                                        <div class="col-span-1"></div>
                                        <div class="flex items-center">

                                            <img class="col-span-1" id="foto-tembakau" src="../images/foto tembakau.svg" alt="" class=" w-20">
                                        </div>
                                        <input type="file" name="gmb_tembakau" id="gmb_tembakau"
                                            class=" invisible col-span-1 shadow-sm h-[80%] w-full bg-light-fill bg-opacity-50 text-light-secondary rounded-lg p-2.5 box-border focus:outline-slate-400">
                                    </div>
                                </label>
                            </div>
                            <div class="col-span-1"></div>
                            <div class="col-span-3">
                                <label class="text-base font-medium text-light-secondary block mb-2">Berkas Surat Izin Usaha
                                    <div
                                        class="w-full bg-light-fill bg-opacity-50 text-light-secondary rounded-lg flex justify-center items-center h-[8.5rem] focus:outline-slate-400">
                                        <div class="flex flex-col justify-center items-center gap-4">
                                            <h2 class="font-semibold text-light-button ">Unggah file surat
                                                izin
                                                usaha
                                            </h2>
                                            <div
                                                class="w-20 h-8 bg-light-button rounded-full text-center pt-1 relative">
                                                <label for="surat_izin_usaha"
                                                    class="text-base font-medium text-light-primary block cursor-pointer ">Unggah</label>
                                                <input type="file" name="surat_izin_usaha" id="surat_izin_usaha"
                                                    class=" invisible shadow-sm h-[80%] w-full bg-light-fill bg-opacity-50 text-light-secondary rounded-lg p-2.5 box-border focus:outline-slate-400">
                                            </div>
                                        </div>
                                    </div>
                                </label>
                                <label class="text-base font-medium text-light-secondary block mb-2">Berkas Lain
                                    <div
                                        class="w-full bg-light-fill bg-opacity-50 text-light-secondary rounded-lg flex justify-center items-center h-[8.5rem] focus:outline-slate-400">
                                        <div class="flex flex-col justify-center items-center gap-4">
                                            <h2 class="font-semibold text-light-button ">Unggah file surat
                                                pendukung
                                            </h2>
                                            <div
                                                class="w-20 h-8 bg-light-button rounded-full text-center pt-1 relative">
                                                <label for="berkas_lain"
                                                    class="text-base font-medium text-light-primary block cursor-pointer ">Unggah</label>
                                                <input type="file" name="berkas_lain" id="berkas_lain"
                                                    class=" invisible shadow-sm h-[80%] w-full bg-light-fill bg-opacity-50 text-light-secondary rounded-lg p-2.5 box-border focus:outline-slate-400">
                                            </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
    
                        </div>
                        <div class="tab grid grid-flow-col grid-cols-9 gap-y-4 h-[70%]">
                            <div class="col-span-1"></div>
                            <div class="col-span-3">
                                <div class="row-span-1">
                                    <label for="nama" class="text-base font-medium text-light-secondary block mb-2 ">Pilih
                                    Pengujian Sertifikasi</label>
                                    <input type="hidden"id="idPengujian" name="id_pengujian" id="nama">
                                    <div class="dropdown w-full">
                                        <div onclick="myFunction()" class="dropbtn shadow-sm py-[1.4rem] bg-light-fill w-full  bg-opacity-50 text-light-secondary rounded-lg block focus:outline-slate-400"></div>
                                        <div id="myDropdown" class="dropdown-content cursor-pointer">
                                            @foreach ($jenis_pengujians as $jenis_pengujian)
                                                <p data-harga="{{ $jenis_pengujian->harga_uji }}" data-id="{{ $jenis_pengujian->id_pengujian }}" class="jenisPengujian">{{ $jenis_pengujian->jenis_pengujian }}</p>
                                            @endforeach
                                          </div>
                                    </div>
                                </div>
                                <div class="row-span-1">
                                    <label for="no-hp" class="text-base font-medium text-light-secondary block mb-2">Harga
                                        Sertifikasi</label>
                                    <input id="hargaPengujian" type="number" name="no-hp" id="no-hp"
                                        class="shadow-sm bg-light-fill w-full bg-opacity-50 text-light-secondary rounded-lg block p-2.5 focus:outline-slate-400">
                                </div>
                                <div class="row-span-2">
                                    <label for="alamat" class="text-base font-medium text-light-secondary block mb-2">Tanggal Penyerahan Sampel</label>
                                    <input type="date" name="tgl_serahsampel" id="tgl_serahsampel"
                                        class="shadow-sm bg-light-fill w-full bg-opacity-50 text-light-secondary rounded-lg block p-2.5 focus:outline-slate-400">
                                </div>
    
                            </div>
                            <div class="col-span-1"></div>
                            <div class="col-span-3">
                                <label class="text-base font-medium text-light-secondary block mb-2">Bukti Pembayaran
                                    <div
                                        class="w-full bg-light-fill bg-opacity-50 text-light-secondary rounded-lg flex justify-center items-center h-[8.5rem] focus:outline-slate-400">
                                        <div class="flex flex-col justify-center items-center gap-4">
                                            <h2 class="font-semibold text-light-button ">Unggah file surat
                                                izin usaha
                                            </h2>
                                            <div
                                                class="w-20 h-8 bg-light-button rounded-full text-center pt-1 relative">
                                                <label for="bukti_tf"
                                                    class="text-base font-medium text-light-primary block cursor-pointer ">Unggah</label>
                                                <input type="file" name="bukti_tf" id="bukti_tf"
                                                    class=" invisible shadow-sm h-[80%] w-full bg-light-fill bg-opacity-50 text-light-secondary rounded-lg p-2.5 box-border focus:outline-slate-400">
                                            </div>
                                        </div>
                                    </div>
                                </label>
                                <div class="mt-2">
                                    <label for="alamat"
                                        class="text-sm font-normal text-light-secondary block">Catatan:</label>
                                    <h1 class="text-xs font-normal">Penyerahan sampel produk tembakau dapat dilaksankan
                                        ketika pembayaran pengajuan sertifikasi dikonfirmasi oleh pemerintah.</h1>
                                </div>
    
                            </div>
    
                        </div>
                    </div>
                    <div class="w-full justify-around grid grid-cols-9">
                        <div class="col-span-1"></div>
                        <div class="col-span-1 flex justify-start items-center">
         
                            <button type="button" id="prevBtn" onclick="nextPrev(-1)" class=" cursor-pointer rounded-full w-[11rem] text-center bg-light-primary px-10 py-4 text-sm font-bold text-light-button border border-3 border-light-button">Sebelumnya
                            </button>
                        </div>
                        <div class="col-span-5"></div>
                        <div class="col-span-1 flex justify-end items-center">
                            <button type="button" id="nextBtn" onclick="nextPrev(1)"
                                class="text-center text-sm font-bold bg-light-button text-light-putih py-4 px-10 rounded-full border hover:bg-opacity-80 focus:shadow-outline ">
                                Selanjutnya
                            </button>
                            <button type="submit" id="kirimBtn" onclick="nextPrev(1)"
                                class="text-center text-sm font-bold bg-light-button text-light-putih py-4 px-10 rounded-full border hover:bg-opacity-80 focus:shadow-outline ">
                                Kirim
                            </button>
                        </div>
                        <div class="col-span-1"></div>
                    </div>
                </div>
            </div>
        </section>

    </form>
    @if($errors->any())
    <div id="modelConfirm" class="fixed z-50 inset-0 bg-gray-900 bg-opacity-40 overflow-y-auto h-full w-full px-4 ">
        <div class="relative top-40 mx-auto shadow-xl rounded-xl bg-light-modal max-w-md">
    
            <div class="flex justify-end p-2">
                <button onclick="closeModal('modelConfirm')" type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>

                            
                    </svg>
                </button>
            </div>
    
            <div class="p-6 pt-0 text-center">
                <div class="mx-auto flex items-center justify-center h-32 w-32 rounded-full">
                    <img src="../images/image 34.svg" class="">
                </div>
                
                <h3 class="text-xl font-bold text-light-secondary mt-5 ">PERHATIAN!!</h3>
                <h3 class="text-sm font-normal text-light-secondary mt-2 mb-6"> {{ $errors->all()[0] }}</h3>
                <button type="button"  onclick="closeModal('modelConfirm')"
                    class="text-white bg-light-button hover:opacity-80 focus:ring-2 focus:ring-white font-medium rounded-full text-base inline-flex items-center px-8 py-2 text-center mr-2">
                    Oke
                </button>             
            </div> 
        </div>
    </div>
    @endif

</body>

</html>

<script>
    var currentTab = 0;

    showTab(currentTab);
    window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
        }
        }
    }
    }
    window.closeModal = function(modalId) {
    document.getElementById(modalId).style.display = 'none'
    document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
    }

    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    function showTab(n) {
        // This function will display the specified tab of the form ...
        var x = document.getElementsByClassName("tab");
        x[n].style.display = "grid";
        // ... and fix the Previous/Next buttons:
        if (n == 0) {
            document.getElementById("prevBtn").style.display = "none";
        } else {
            document.getElementById("prevBtn").style.display = "inline";
        }
        if (n == (x.length - 1)) {
            document.getElementById("nextBtn").style.display = 'none';
            document.getElementById("kirimBtn").style.display = 'inline';
        } else {
            document.getElementById("nextBtn").style.display = 'inline';
            document.getElementById("kirimBtn").style.display = 'none';
        }
        // ... and run a function that displays the correct step indicator:
        fixStepIndicator(n)
    }

    function nextPrev(n) {
        // This function will figure out which tab to display
        var x = document.getElementsByClassName("tab");
        // Exit the function if any field in the current tab is invalid:
        // if (n == 1 && !validateForm()) return false;
        // Hide the current tab:
        x[currentTab].style.display = "none";
        // Increase or decrease the current tab by 1:
        currentTab = currentTab + n;
        // if you have reached the end of the form... :
        if (currentTab >= x.length) {
            //...the form gets submitted:
            document.getElementById("buat-pengajuan").submit();
            return false;
        }
        // Otherwise, display the correct tab:
        showTab(currentTab);
    }

    function validateForm() {
        // This function deals with validation of the form fields
        var x, y, i, valid = true;
        x = document.getElementsByClassName("tab");
        y = x[currentTab].getElementsByTagName("input");
        // A loop that checks every input field in the current tab:
        for (i = 0; i < y.length; i++) {
            // If a field is empty...
            if (y[i].value == "") {
                // add an "invalid" class to the field:
                y[i].className += " invalid";
                // and set the current valid status to false:
                valid = false;
            }
        }
        // If the valid status is true, mark the step as finished and valid:
        if (valid) {
            document.getElementsByClassName("step")[currentTab].className += " finish";
        }
        return valid; // return the valid status
    }

    function fixStepIndicator(n) {
        // This function removes the "active" class of all steps...
        var i, x = document.getElementsByClassName("step");
        for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
        //... and adds the "active" class to the current step:
        x[n].className += " active";
    }
    document.addEventListener('click', (e)=>{
        if(e.target.classList.contains('jenisPengujian')){
            document.querySelector('#hargaPengujian').value = e.target.dataset.harga;
            document.querySelector('#idPengujian').value = e.target.dataset.id;
            document.querySelector('.dropbtn').innerText = e.target.innerText;
            document.querySelector('.dropbtn').style.paddingTop = '0.7rem';
            document.querySelector('.dropbtn').style.paddingBottom = '0.7rem';
            document.querySelector('.dropbtn').style.paddingBottom = 'text-align: right;';
        }
    })

    </script>