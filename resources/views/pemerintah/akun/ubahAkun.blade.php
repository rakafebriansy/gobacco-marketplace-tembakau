<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Gobacco</title>
    <link rel="stylesheet" href="../dist/output.css">
</head>
<body>
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
    <section class="font-poppins">
        <div class="bg-light-primary relative">
            <div class=" bg-light-secondary absolute top-0 w-full z-20">
                <img src="../images/Group 35.svg" alt="" class=" h-28 w-32 ml-4">
            </div>
            <div class="grid grid-cols-10 h-screen">
                <div class=" col-span-2 bg-light-secondary flex flex-col justify-between relative">
                    <div>
                        <div class="pb-32"></div>
                        <a href="/pemerintah/dashboard" class="flex items-center px-4 py-2  text-light-primary hover:bg-light-button hover:rounded-full">
                            <div class="">
                                <img src="../images/Haruki Icons.svg" class="w-3/4">
                            </div>
                            Dashboard
                        </a>
                        <a href="/pemerintah/sertifikasi" class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-light-button hover:rounded-full">
                            <div class="">
                                <img src="../images/Haruki Icons (2).svg" class="w-3/4">
                            </div>
                            Sertifikasi
                        </a>
                        <a href="#" class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-light-button hover:rounded-full">
                            <div class="">
                                <img src="../images/Haruki Icons (3).svg" class="w-3/4">
                            </div>
                            Edukasi
                        </a>
                    </div>
                    <div class="items-end justify-end py-2 box-border">

                        <form action="/logout" class="flex items-center justify-center p-2">
                        <button type="submit"
                            class=" text-center font-bold bg-light-button text-light-putih py-2 px-14 rounded-full hover:opacity-80 focus:shadow-outline  ">
                            <span class=" text-xs">
                                Logout
                            </span>
                        </button>
                        </form>
                                            
                        <div class="flex items-center py-2 px-4 mt-0 space-x-4 justify-self-end">                        
                            <img src="../images/profil.svg" alt="" class="w-12 h-12 rounded-lg dark:bg-gray-500">
                            <div>
                                <h2 class="text-base font-normal text-light-primary">UPT. PSMB-
                                    LT Jember</h2>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-8 bg-light-secondary relative"> 
                    <form action="/pemerintah/ubah" method="post" class=" flex flex-col justify-between bg-light-primary absolute z-20 bottom-0 w-[90%] h-[85%] p-20 rounded-tr-[3rem] rounded-tl-[3rem]">
                        @csrf
                        @method('patch')
                        <div class="">                            
                            <div class="grid grid-cols-6 gap-8 ">
                                <div class="col-span-6 sm:col-span-3 ">
                                    <label for="username" class="text-sm font-medium text-light-secondary opacity-70 block mb-2 ">Username</label>
                                    <input type="text" name="username_pemerintah" id="username_pemerintah" value="{{ $pemerintah->username_pemerintah }}" class="shadow-sm bg-light-fill bg-opacity-50 text-light-secondary rounded-lg block w-full p-2.5 focus:outline-slate-400">
                                </div>
                                <div class="col-span-6 sm:col-span-3  ">
                                    <label for="no-hp" class="text-sm font-medium text-light-secondary opacity-70 block mb-2">No. Handphone</label>
                                    <input type="text" name="telp_pemerintah" id="telp_pemerintah" value="{{ $pemerintah->telp_pemerintah }}" class="shadow-sm bg-light-fill bg-opacity-50 text-light-secondary rounded-lg block w-full p-2.5 focus:outline-slate-400">
                                </div>
                                <div class="col-span-6 sm:col-span-3 ">
                                    <label for="password" class="text-sm font-medium text-light-secondary opacity-70 block mb-2">Password</label>
                                    <input type="text" name="pw_pemerintah" id="password" value="{{ $pemerintah->pw_pemerintah }}" class="shadow-sm bg-light-fill bg-opacity-50 text-light-secondary rounded-lg block w-full p-2.5 focus:outline-slate-400">
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="alamat" class="text-sm font-medium text-light-secondary opacity-70 block mb-2">Alamat</label>
                                    <input type="text" name="kecamatan" id="alamat" value="{{ $kecamatan->kecamatan }}" class="shadow-sm bg-light-fill bg-opacity-50 text-light-secondary rounded-lg block w-full p-2.5 focus:outline-slate-400">
                                </div>
                                
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="email" class="text-sm font-medium text-light-secondary opacity-70 block mb-2">Email</label>
                                    <input type="email" name="email_pemerintah" value="{{ $pemerintah->email_pemerintah }}" id="email" class="shadow-sm bg-light-fill bg-opacity-50 text-light-secondary rounded-lg block w-full p-2.5 focus:outline-slate-400" >
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="" class=""></label>
                                    <h3 type="" name="" id="" class=" bg-light-primary w-full p-2.5" ></h3>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="/pemerintah/akun" class="cursor-pointer rounded-full bg-light-button px-10 py-4 text-sm font-bold text-white hover:opacity-80">Batal                            
                            </a>
                            <button
                            class="text-center text-sm font-bold bg-light-button text-light-putih py-4 px-10 rounded-full border hover:bg-opacity-80 focus:shadow-outline ml-10 ">
                            Simpan
                        </button>
                        </div>                
                    </form>
                </div>               
            </div>                   
        </div>
    </section>
    <script>
        window.closeModal = function(modalId) {
        document.getElementById(modalId).style.display = 'none'
        document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
        }
        </script>
</body>
</html>
