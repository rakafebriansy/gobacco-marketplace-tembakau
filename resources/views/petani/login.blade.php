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
    <section id="login" class="font-poppins grid-cols-2">
        <div class="min-h-screen flex justify-center">
            <div class="max-w-screen bg-light-primary shadow flex justify-center flex-1">
                <div class="">                
                    <form class="mt-12 flex flex-col items-center" action="/petani/login" method="POST">
                        @csrf
                        <h1 class="text-3xl font-extrabold text-light-secondary opacity-70">
                            Login
                        </h1>
                        <div class="w-full">                                                                
                            <div class="my-8 text-center">
                                <div
                                    class=" px-2 inline-block text-base text-light-secondary opacity-50 tracking-wide font-medium transform translate-y-1/2">
                                    Masuk dengan akun anda
                                </div>
                            </div>

                            <div class="mx-auto max-w-xs mt-10"><span class="px-3 text-light-secondary opacity-70 font-bold">Username</span>
                                <input
                                    class="w-full px-8 py-4 rounded-lg font-medium bg-light-fill bg-opacity-50  text-light-secondary text-sm focus:outline-slate-400 mt-2"
                                    type="text" name="username_petani" />
                            </div>
                            <div class="mx-auto max-w-xs mt-4"><span class="px-3 text-light-secondary opacity-70 font-bold">Password</span>
                                <input
                                    class="w-full px-8 py-4 rounded-lg font-medium bg-light-fill bg-opacity-50  text-light-secondary text-sm  focus:outline-slate-400 focus:shadow-sm mt-2"
                                    type="password" name="pw_petani" />
                            </div>
                            <div class="my-12 text-center">
                                <div
                                    class=" leading-none px-2 inline-block text-sm text-light-secondary opacity-70 tracking-wide font-medium transform translate-y-1/2">
                                    Lupa kata sandi anda? <span class="italic font-normal cursor-pointer"> Klik disini</span> 
                                </div>
                            </div>
                            <button type="submit"
                                class="mt-5 tracking-wide font-bold bg-light-button text-light-putih w-full py-4 rounded-full hover:bg-opacity-80 flex items-center justify-center focus:shadow-outline ">
                                <span class="ml-3 text-base">
                                    LOGIN
                                </span>
                            </button>                                
                        </div>
                    </form>
                </div>
            </div>
            <div class="flex flex-col items-center bg-light-secondary w-1/2">
                <div class="bg-contain bg-no-repeat items-center justify-center mt-32 ml-52">
                    <img src="../images/petani.png" alt="logo" class=" w-1/2 ">
                </div>
                <div class="text-light-putih font-bold text-2xl mt-10 text-center">Selamat Datang!
                    <div class="text-center text-light-putih font-semibold text-sm px-32 mt-4">Daftarkan diri anda untuk melakukan sertifikasi mutu tembakau dan akses penuh fitur GOBACCO </div>
                    <a href="/petani/register" class="mt-6 inline-block text-center font-bold bg-light-secondary text-light-putih py-2.5 px-20 rounded-full border hover:bg-light-fill focus:shadow-outline  text-base">REGISTER</a>   
                </div>                                                                                                                           
            </div>
        </div>                                           
    </section>
    @if ($errors->any())
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
                    <h3 class="text-sm font-normal text-light-secondary mt-2 mb-6">{{ $errors->all()[0] }}</h3>
                    <button type="button"  onclick="closeModal('modelConfirm')"
                        class="text-white bg-light-button hover:opacity-80 focus:ring-2 focus:ring-white font-medium rounded-full text-base inline-flex items-center px-8 py-2 text-center mr-2">
                        Oke
                    </button>             
                </div> 
            </div>
        </div>
    @endif
    <script type="text/javascript">    
        window.closeModal = function(modalId) {
            document.getElementById(modalId).style.display = 'none'
            document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
        }
    
        // Close all modals when press ESC
        document.onkeydown = function(event) {
            event = event || window.event;
            if (event.keyCode === 27) {
                document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
                let modals = document.getElementsByClassName('modal');
                Array.prototype.slice.call(modals).forEach(i => {
                    i.style.display = 'none'
                })
            }
        };
    </script>
</body>
</html>