@extends('admin')

@section('main-content')
<div class="content-wrapper bg-gray-100 min-h-screen p-4">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container mx-auto">
            <div class="flex justify-between items-center mb-3">
                <div></div>
                <div>
                    <nav class="flex space-x-2 mt-1 text-gray-500">
                        <a href="#" class="hover:text-gray-900">Home</a>
                        <span>/</span>
                        <span class="text-gray-800">Add choose</span>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content section -->
    <div class="content">
        <div class="container mx-auto mt-2">
            <div class="bg-white shadow-xl rounded-lg overflow-hidden" style="margin-top: -200;">
                <!-- Form Header -->
                <div class="bg-gradient-to-r from-indigo-500 to-blue-500 text-white px-6 py-4">
                    <h3 class="text-lg font-semibold">Add Choose</h3>
                </div>

                <!-- Form start -->
                <form action="{{route('choose_store')}}" method="post" enctype="multipart/form-data" class="p-8 space-y-6">
                    @csrf
                    <!-- Image Upload -->
                    <div>
                        <label for="imageUpload" class="block text-sm font-medium text-gray-700">Upload Image</label>
                        <div class="flex items-center mt-2">
                            <input type="file" name="img" class="hidden" id="imageUpload" onchange="previewImage(event)" required>
                            <label for="imageUpload" class="block px-4 py-2 bg-gray-200 text-gray-700 cursor-pointer rounded-lg shadow-inner transition duration-200 ease-in-out transform hover:bg-gray-300">Choose file</label>
                        </div>
                        <!-- Image preview -->
                        <img id="imagePreview" class="mt-2 hidden border border-gray-300 rounded-lg shadow-lg" style="max-width: 150px; max-height: 150px;" />
                    </div>

                    <!-- Title Input -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="title" class="form-control w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 transition duration-200 ease-in-out" id="title" placeholder="Enter Title" required>
                    </div>

                    <!-- Subtitle Input -->
                    <div>
                        <label for="subtitle" class="block text-sm font-medium text-gray-700">Subtitle</label>
                        <input type="text" name="subtitle" class="form-control w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 transition duration-200 ease-in-out" id="subtitle" placeholder="Enter Subtitle" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-right">
                        <button type="submit" class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white px-6 py-2 rounded-lg shadow-lg hover:shadow-xl transition duration-200 ease-in-out hover:bg-indigo-600">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <span></span>
</div>

@endsection

<script>
    // Image preview function
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('imagePreview');
            output.src = reader.result;
            output.classList.remove('hidden');
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>