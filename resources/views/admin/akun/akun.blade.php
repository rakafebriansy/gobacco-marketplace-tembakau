<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="../dist/output.css">
</head>
<body>
    <section class="font-poppins">
        <div class="bg-light-primary relative">
            <div class=" bg-light-secondary absolute top-0 w-full z-50">
                <img src="../images/Group 35.svg" alt="" class=" h-28 w-32 ml-4">
            </div>
            <div class="grid grid-cols-10 h-screen">
                <div class=" col-span-2 bg-light-secondary flex flex-col justify-between relative">
                    <div class="">
                        <div class="pb-32"></div>
                        <a href="/admin/dashboard" class="flex items-center px-4 py-2  text-light-primary hover:bg-light-button hover:rounded-full">
                            <div class="">
                                <img src="../images/Haruki Icons.svg" class="w-3/4">
                            </div>
                            Dashboard
                        </a>
                        <a href="#" class="flex items-center px-4 py-2 mt-2 text-gray-100 hover:bg-light-button hover:rounded-full">
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

                        <form action="/logout" method="get" class="flex items-center justify-center p-2">
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
                                <h2 class="text-base font-normal text-light-primary">Admin</h2>
                                <span class="flex items-center space-x-1 text-sm text-light-primary">
                                    <h1>Gobacco</h1>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-8 bg-light-secondary relative"> 
                    <div class=" flex flex-col justify-between bg-light-primary absolute z-50 bottom-0 w-[90%] h-[85%] p-20 rounded-tr-[3rem] rounded-tl-[3rem]">
                            <div class="">
                                <h3 class="text-2xl font-bold text-light-secondary text-opacity-70">Akun Admin GOBACCO</h3>
                                <div class="mb-4 mt-4">
                                    <h1 for="id" class="text-base font-semibold text-light-secondary opacity-70 block mb-2 mt-8">ID Admin :</h1>
                                    <h1 for="id" class="text-medium font-medium text-light-secondary opacity-70 block mb-2">{{ $admin->id_admin }}</h1>
                                </div>
                                
                                <div class="mb-4">
                                    <h1 for="username" class="text-base font-semibold text-light-secondary opacity-70 block mb-2 mt-2">Username :</h1>
                                    <h1 for="username" class="text-medium font-medium text-light-secondary opacity-70 block mb-2">{{ $admin->username }}</h1>
                                </div>
                                <div class="">
                                    <h1 for="password" class="text-base font-semibold text-light-secondary opacity-70 block mb-2 mt-2">Password :</h1>
                                    <h1 for="password" class="text-medium font-medium text-light-secondary opacity-70 block mb-2">{{ $admin->password }}</h1>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="/admin/ubah" class="cursor-pointer rounded-full bg-light-button px-10 py-4 text-sm font-bold text-white hover:opacity-80">Ubah Profil                               
                                </a>
                            </div>     
                    </div>
                </div>               
            </div>                   
        </div>
    </section>
    @if (session('success'))
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
                    <img src="../images/image 14.svg" class="">
                </div>
                
                <h3 class="text-xl font-bold text-light-secondary mt-5 ">BERHASIL!!</h3>
                <h3 class="text-sm font-normal text-light-secondary mt-2 mb-6">{{ session('success') }}</h3>
                <button type="button" onclick="closeModal('modelConfirm')"
                    class="text-white bg-light-button hover:opacity-80 focus:ring-2 focus:ring-white font-medium rounded-full text-base inline-flex items-center px-8 py-2 text-center mr-2">
                    Oke
                </button>             
            </div> 
        </div>
    </div>
    @endif

<script>
window.closeModal = function(modalId) {
document.getElementById(modalId).style.display = 'none'
document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
}
</script>
</body>
</html>
