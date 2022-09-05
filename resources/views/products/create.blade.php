<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="bg-white mt-4 max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <form id="product_create_form" method="post" action="{{ route('products.store') }}" enctype="multipart/form-data" autocomplete="off">
            @csrf

            <div class="mb-6">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Product Title</label>
                <input type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mt-4 mb-6">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description</label>
                <textarea id="description" rows="6" name="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
            </div>
            <div class="mb-6">
                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Price</label>
                <input type="number" id="price" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-20 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>

            <div class="flex">
                <div class="mt-4 mr-2 mb-2 w-full">
                    <!-- #singleMediaDropzoneModal is in component media-form-single-dropzone -->
                    <button type="button" data-modal-toggle="singleMediaDropzoneModal" class="text-sm px-5 py-12 text-center block w-full text-gray-700 bg-gray-100 border border-gray-300 hover:bg-gray-200 focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Thumbnail
                    </button>
                </div>
                <div class="mt-4 ml-2 mb-2 w-full">
                    <button type="button" data-modal-toggle="multiMediaDropzoneModal" class="text-sm px-5 py-12 text-center block w-full text-gray-700 bg-gray-100 border border-gray-300 hover:bg-gray-200 focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-lg dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Upload Gallery
                    </button>
                </div>
            </div>

            <div class="mt-2">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </div>
        </form>
    </div>




    <!-- dropzone multiple modal popup -->
    <div id="multiMediaDropzoneModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex justify-between items-center items-start p-4 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Upload Media/s
                    </h3>
                    <button type="button" data-modal-toggle="multiMediaDropzoneModal" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <form action="{{ route('upload-media') }}" method="post" id="mediaFormMultipleDropzone" class="dropzone" enctype="multipart/form-data">
                        @csrf
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <input id="submit-dropzone" type="submit" name="submitDropzone" value="Upload Gallery" class="cursor-pointer py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"/>
                </div>
            </div>
        </div>
    </div>


    <!-- dropzone single modal popup -->
    <div id="singleMediaDropzoneModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex justify-between items-center items-start p-4 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Upload Thumbnail
                    </h3>
                    <button type="button" data-modal-toggle="singleMediaDropzoneModal" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <form action="{{ route('upload-media') }}" method="post" id="mediaFormSingleDropzone" class="dropzone" enctype="multipart/form-data">
                        @csrf
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <input id="submit-single-dropzone" type="submit" name="submitSingleDropzone" value="Upload Thumbnail" class="cursor-pointer py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"/>
                </div>
            </div>
        </div>
    </div>

    @push('footer_scripts')
    <script>
        /*
        * Dropzone script
        * */
        // disable autodiscover
        Dropzone.autoDiscover = false;

        //const filesize = 5;
        const allowMaxFilesize = 5;
        const allowMaxFiles = 5;

        const myDropzone = new Dropzone("#mediaFormMultipleDropzone", {
            url: "{{ route('upload-media') }}",
            method: "POST",
            paramName: "files",
            autoProcessQueue: false,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            maxFiles: allowMaxFiles,
            maxFilesize: allowMaxFilesize, // MB
            uploadMultiple: true,
            parallelUploads: 100, // use it with uploadMultiple
            createImageThumbnails: true,
            thumbnailWidth: 120,
            thumbnailHeight: 120,
            addRemoveLinks: true,
            timeout: 180000,
            dictRemoveFileConfirmation: "Are you Sure?", // ask before removing file
            // Language Strings
            dictFileTooBig: `File is to big. Max allowed file size is ${allowMaxFilesize}mb`,
            dictInvalidFileType: "Invalid File Type",
            dictCancelUpload: "Cancel",
            dictRemoveFile: "Remove",
            dictMaxFilesExceeded: `Only ${allowMaxFiles} files are allowed`,
            dictDefaultMessage: "Drop files here to upload",
        });

        myDropzone.on("addedfile", function(file) {
            //console.log(file);
        });

        myDropzone.on("removedfile", function(file) {
            // console.log(file);
        });

        // Add more data to send along with the file as POST data. (optional)
        /*myDropzone.on("sending", function(file, xhr, formData) {
            formData.append("dropzone", "1"); // $_POST["dropzone"]
            formData.append("productId", "10"); // $_POST["productId"]
        });*/

        myDropzone.on("error", function(file, response) {
            console.log(response);
        });

        // on success
        myDropzone.on("successmultiple", function(file, response) {
            // get response from successful ajax request
            // response includes what you you return from php side
            console.log(response);
            $.each(response, function( key, value ) {
                $('form#product_create_form').append('<input type="text" name="gallery[]" value="'+value.name+'">')
            });


            /* submit the form after images upload
            (if u want to submit rest of the inputs in the form)
            I have no other inputs so, I commented below line. */
            //document.getElementById("mediaFormMultipleDropzone").submit();
        });

        // button trigger for processingQueue
        const submitDropzone = document.getElementById("submit-dropzone");
        submitDropzone.addEventListener("click", function(e) {
            // Make sure that the form isn't actually being sent.
            e.preventDefault();
            e.stopPropagation();

            if (myDropzone.files !== "") {
                // console.log(myDropzone.files);
                myDropzone.processQueue();
            } else {
                // if no file submit the form
                document.getElementById("dropzone-form").submit();
            }
        });
        // multiple




        // single
        const singleDropzone = new Dropzone("#mediaFormSingleDropzone", {
            url: "{{ route('upload-media') }}",
            method: "POST",
            paramName: "thumbnail",
            autoProcessQueue: false,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            maxFiles: 1,
            maxFilesize: allowMaxFilesize, // MB
            uploadMultiple: false,
            parallelUploads: 100, // use it with uploadMultiple
            createImageThumbnails: true,
            thumbnailWidth: 120,
            thumbnailHeight: 120,
            addRemoveLinks: true,
            timeout: 180000,
            dictRemoveFileConfirmation: "Are you Sure?", // ask before removing file
            // Language Strings
            dictFileTooBig: `File is to big. Max allowed file size is ${allowMaxFilesize}mb`,
            dictInvalidFileType: "Invalid File Type",
            dictCancelUpload: "Cancel",
            dictRemoveFile: "Remove",
            dictMaxFilesExceeded: `Only ${allowMaxFiles} files are allowed`,
            dictDefaultMessage: "Drop files here to upload",
        });

        singleDropzone.on("addedfile", function(file) {
            //console.log(file);
        });

        singleDropzone.on("removedfile", function(file) {
            // console.log(file);
        });

        // Add more data to send along with the file as POST data. (optional)
        /*singleDropzone.on("sending", function(file, xhr, formData) {
            formData.append("dropzone", "1"); // $_POST["dropzone"]
            formData.append("productId", "10"); // $_POST["productId"]
            formData.append("userId", "7"); // $_POST["productId"]
        });*/

        singleDropzone.on("error", function(file, response) {
            console.log(response);
        });

        // on success
        singleDropzone.on("success", function(file, response) {
            // get response from successful ajax request
            // response includes what you you return from php side
            console.log(response);
            $.each(response, function( key, value ) {
                $('form#product_create_form').append('<input type="text" name="thumbnail" value="'+value.name+'">')
            });

            /* submit the form after images upload
            (if u want to submit rest of the inputs in the form)
            I have no other inputs so, I commented below line. */
            //document.getElementById("mediaFormMultipleDropzone").submit();
        });

        // button trigger for processingQueue
        const submitSingleDropzone = document.getElementById("submit-single-dropzone");
        submitSingleDropzone.addEventListener("click", function(e) {
            // Make sure that the form isn't actually being sent.
            e.preventDefault();
            e.stopPropagation();

            if (singleDropzone.files !== "") {
                // console.log(myDropzone.files);
                singleDropzone.processQueue();
            } else {
                // if no file submit the form
                document.getElementById("dropzone-single-form").submit();
            }
        });
        // single
    </script>
    @endpush
</x-app-layout>
