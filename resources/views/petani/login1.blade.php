<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Gobacco</title>
    <link rel="stylesheet" href="dist/output.css">
</head>
<body>
    <section id="login" class="font-poppins grid-cols-2">
        <div class="min-h-screen flex justify-center">
            <div class="max-w-screen bg-light-primary shadow flex justify-center flex-1">
                <div class="">                
                    <div class="mt-12 flex flex-col items-center">
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
                                    class="w-full px-8 py-4 rounded-lg font-medium bg-light-fill opacity-50 border border-gray-200 text-light-hitam text-sm focus:outline-none focus:border-gray-400 mt-2"
                                    type="text" />
                            </div>
                            <div class="mx-auto max-w-xs mt-4"><span class="px-3 text-light-secondary opacity-70 font-bold">Password</span>
                                <input
                                    class="w-full px-8 py-4 rounded-lg font-medium bg-light-fill opacity-50 border border-gray-200 text-light-hitam text-sm focus:outline-none focus:border-gray-400 mt-2"
                                    type="password" />
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
                        </div>
                    </div>
                </div>
                <div class="flex flex-col items-center bg-light-secondary w-1/2">
                    <div class="bg-contain bg-no-repeat items-center justify-center mt-12 -mr-56">
                        <img src="./css/petani.png" alt="logo" class=" w-1/2 ">
                    </div>
                    <div class="text-light-putih font-bold text-2xl mt-8 text-center">Selamat Datang!
                        <div class="text-center text-light-putih font-semibold text-sm px-32 mt-4">Daftarkan diri anda untuk melakukan sertifikasi mutu tembakau dan akses penuh fitur GOBACCO </div>
                        <button type="submit"
                            class="mt-5 text-center font-bold bg-light-secondary text-light-putih py-4 px-20 rounded-full border hover:bg-light-fill focus:shadow-outline  ">
                            <span class="ml-3 text-base">
                                REGISTER
                            </span>
                        </button>    
                    </div>                                                                                                                           
                </div>
            </div>
        </div>                                           
    </section>
</body>
</html>