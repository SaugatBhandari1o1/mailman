<!-- <head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head> -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{__('Registration')}}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4">
        <div class="max-w-md mx-auto my-10 bg-white dark:bg-gray-800 p-6 rounded-md shadow-md">
            <form>
                <div class="form-group">
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name:</label>
                    <input type="text" id="name" name="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                </div>
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label for="province" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Province:</label>
                        <select id="province" name="province" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            <option value="" disabled selected>Select Province</option>
                            @foreach($Provinces as $data)
                            <option value="{{$data->id}}">{{$data->name}}</option>
                            @endforeach
                            <!-- Populate dropdown with province options -->
                        </select>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label for="city" class="block text-sm font-medium text-gray-700 dark:text-gray-300">City:</label>
                        <select id="city" name="city" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            <option value="" disabled selected>Select City</option>
                            <!-- Populate dropdown with city options based on selected province -->
                        </select>
                    </div>
                </div>
                <div class="form-group btn">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-indigo-700 focus:outline-none focus:border-indigo-700 focus:ring focus:ring-indigo-200 active:bg-indigo-700 disabled:opacity-25 transition">Upload</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        $('#province').on('change', function() {
            var idProvince = this.value;
            console.log('Selected Province ID:', idProvince);
            $('#city').html('');
            $.ajax({
                url: "{{route('city')}}",
                type: "POST",
                data: {
                    province_id: idProvince,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(result) {
                    console.log('Response from server:', result);
                    $('#city').html('<option value="">--Select City--</option>');
                    $.each(result.cities, function(key, value) {
                        $("#city").append(`<option value="${value.id}">${value.name}</option>)`);
                    });
                }
            });
        });
    });
</script>