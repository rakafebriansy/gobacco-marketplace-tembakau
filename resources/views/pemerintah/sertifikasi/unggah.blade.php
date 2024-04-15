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
    <link rel="stylesheet" href="../../dist/output.css">
</head>

<body>
    <form action="/pemerintah/unggah" enctype="multipart/form-data" method="post" class="w-screen h-screen bg-light-primary flex justify-center items-center">
        @csrf
        <input type="hidden" name="id_sertifikasi" id="" value="{{ $id_sertifikasi }}">
        <div class="h-[40%] w-[50%] bg-light-fill bg-opacity-50 rounded-xl justify-center grid grid-cols-8">
            <div class="col-span-1"></div>
            <div class="col-span-6">
                <div class="h-[20%] flex items-center">
                    <h3 class="text-start text-light-secondary font-bold text-lg">Upload Hasil
                        Sertifikasi Mutu Tembakau</h3>
                </div>
                <label for="hasil_pengujian" class="h-[60%] bg-light-fill rounded-lg flex justify-center items-center" id="dropzone">
                    <input type="file" class="hidden" name="hasil_pengujian" id="hasil_pengujian"/>
                    <img class="h-[4rem] w-[4rem]" src="https://www.svgrepo.com/show/357902/image-upload.svg"
                        alt="">
                </label>
                <div class="text-center w-full h-[20%] flex justify-between items-center">
                    <a href="/pemerintah/sertifikasi"
                        class="inline-block cursor-pointer rounded-full bg-light-button px-10 py-2.5 text-sm font-bold text-white hover:opacity-80">Batal
                    </a>
                    <button onclick="openModal('modelConfirm')" type="button"
                        class="text-center font-bold bg-light-button text-light-putih py-2 px-10 rounded-full hover:bg-opacity-80 focus:shadow-outline">
                        <span class=" text-sm">
                            Unggah
                        </span>
                    </button>
                </div>
            </div>
            <div class="col-span-1"></div>
        </div>
        <div id="modelConfirm"
        class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-40 overflow-y-auto h-full w-full px-4 ">
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
                    <img src="../../images/image 18.svg" class="">
                </div>

                <h3 class="text-sm font-normal text-light-secondary mt-2 mb-6">Yakin Mengajukan Sertifikasi?</h3>
                <button type="button" onclick="closeModal('modelConfirm')"
                    class="text-white bg-light-tidak hover:bg-red-800 focus:ring-2 focus:ring-red-300 font-medium rounded-full text-base inline-flex items-center px-8 py-2 text-center mr-2">
                    Tidak
                </button>
                <button type="submit" 
                    class="text-white bg-light-iya hover:opacity-80 focus:ring-2 focus:ring-white font-medium rounded-full text-base inline-flex items-center px-8 py-2 text-center mr-2">
                    Iya
                </button>
            </div>
        </div>
    </div>
    </form>
    @if($errors->any())
    <div id="modelError" class="fixed z-50 inset-0 bg-gray-900 bg-opacity-40 overflow-y-auto h-full w-full px-4 ">
        <div class="relative top-40 mx-auto shadow-xl rounded-xl bg-light-modal max-w-md">
    
            <div class="flex justify-end p-2">
                <button onclick="closeModal('modelError')" type="button"
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
                    <img src="../../images/image 34.svg" class="">
                </div>
                
                <h3 class="text-xl font-bold text-light-secondary mt-5 ">PERHATIAN!!</h3>
                <h3 class="text-sm font-normal text-light-secondary mt-2 mb-6"> {{ $errors->all()[0] }}</h3>
                <button type="button"  onclick="closeModal('modelError')"
                    class="text-white bg-light-button hover:opacity-80 focus:ring-2 focus:ring-white font-medium rounded-full text-base inline-flex items-center px-8 py-2 text-center mr-2">
                    Oke
                </button>             
            </div> 
        </div>
    </div>
    @endif
    <script type="text/javascript">
        window.openModal = function (modalId) {
            document.getElementById(modalId).style.display = 'block'
            document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden')
        }

        window.closeModal = function (modalId) {
            document.getElementById(modalId).style.display = 'none'
            document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
        }

        document.onkeydown = function (event) {
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