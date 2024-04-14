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
                    <div>
                        <div class="pb-32"></div>
                        <a href="#" class="flex items-center px-4 py-2  text-light-primary hover:bg-light-button hover:rounded-full">
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
                            <a href="/petani/akun">
                                <h2 class="text-base font-normal text-light-primary">{{ $sertifikasis[0]->nama_petani }}</h2>
                                <span class="flex items-center space-x-1 text-sm text-light-primary">
                                    <h1>Petani</h1>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-span-8 bg-light-secondary relative">                   
                    <div class=" flex flex-col justify-between bg-light-primary absolute z-50 bottom-0 w-[90%] h-[85%] p-12 rounded-tr-[3rem] rounded-tl-[3rem]">
                        <div class="">
                            <h3 class="text-2xl font-bold text-light-secondary text-opacity-70 pb-8">Data Sertifikasi Mutu Produk yang Telah Diajukan</h3>
                            <div class="grid grid-cols-6 gap-0">
                                <div class="col-span-6 sm:col-span-3"></div>
                                <div class="col-span-6 sm:col-span-3">
                                <button type="submit"
                                class="text-center font-bold bg-light-button text-light-putih py-2 px-10 rounded-full border hover:bg-opacity-80 focus:shadow-outline ml-36 mb-2">
                                <span class=" text-sm">
                                    +  Pengajuan Sertfikasi
                                </span>
                            </button>
                            </div>
                            </div>
                            
                            <div class="h-96 w-full bg-light-fill bg-opacity-50 rounded-xl mr-4">
                                <div class=" overflow-hidden text-center mx-2">
                                    @if($sertifikasis->isEmpty())
                                    <div class="py-20">
                                        <img src="../images/blm aju.svg" class="w-24 mx-auto">
                                        <h1 class="text-center font-medium text-light-abu">Belum ada pengajuan sertifikasi</h1>
                                    </div>    
                                    @else
                                        <table class="w-10%">
                                            <thead class="bg-['#C9D3B0']">
                                                <tr>
                                                    <th class="w-1/3 py-4 pr-0 pl-2 text-center text-gray-600 font-bold text-xs uppercase">JENIS TEMBAKAU</th>
                                                    <th class="w-1/5 py-4 pr-2 text-center text-gray-600 font-bold text-xs uppercase">FOTO</th>
                                                    <th class="w-1/4 py-4 pr-2 text-center text-gray-600 font-bold text-xs uppercase">SURAT IZIN USAHA</th>
                                                    <th class="w-1/2 py-4 pr-2 text-center text-gray-600 font-bold text-xs uppercase">JENIS PENGUJIAN</th>
                                                    <th class="w-1/4 py-4 pr-2 text-center text-gray-600 font-bold text-xs uppercase">STATUS PENGUJIAN</th>
                                                    <th class="w-1/4 py-4 px-20 text-center text-gray-600 font-bold text-xs uppercase">AKSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sertifikasis as $key => $sertifikasi)
                                                <tr class="{{ $key%2 == 1? 'bg-light-primary' : 'bg-light-secondary' }} {{ $key%2 == 0? 'text-light-putih' : 'text-light-secondary' }} bg-opacity-80 text-xs">
                                                    <td class="py-4 pr-2">T{{ $sertifikasi->jenis_tembakau }}</td>
                                                    <td class="flex justify-center py-4 pr-2 ">
                                                        <img src="../images/{{ $sertifikasi->gmb_tembakau }}">
                                                    </td>
                                                    <td class="py-4 pr-2">{{ $sertifikasi->surat_izin_usaha }}</td>
                                                    <td class="py-4 pr-2">{{ $sertifikasi->jenis_pengujian }}</td>
                                                        
                                                    <td class="py-4 pr-2">
                                                        <span class="bg-green-500 text-white py-1 px-2 rounded-full text-xs">{{ $sertifikasi->status_uji }}</span>
                                                    </td>
                                                    <td class="py-1 px-2">
                                                        <a href="#" class="cursor-pointer rounded-full bg-light-button px-2 py-1 text-xs font-normal text-light-putih hover:bg-opacity-80">Lihat Detail                               
                                                        </a>
                                                        <button
                                                            class="text-center font-normal bg-light-abu text-light-putih py-1 px-2 rounded-full hover:bg-gray-400 focus:shadow-outline ml-1 ">
                                                            <span class=" text-xs">
                                                                Edit Data
                                                            </span>
                                                        </button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>               
                    </div>
                </div>               
            </div>                   
        </div>
    </section>
</body>
</html>
