<div class="grid grid-cols-6 gap-6 mb-6">
    <div class="col-span-6 sm:col-span-3">
        <label for="province_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
        <select
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            name="province_code" id="province_code">
            <option selected>Pilih Provinsi</option>
            {{ $slot }}
        </select>
    </div>
    <div class="col-span-6 sm:col-span-3">
        <label for="city_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota</label>
        <select id="city_code" name="city_code" data-placeholder="Pilih Kota"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Pilih Kota</option>
            <option></option>
        </select>
    </div>
    <div class="col-span-6 sm:col-span-3">
        <label for="district_code"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
        <select id="district_code" name="district_code" data-placeholder="Pilih Kecamatan"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Pilih Kecamatan</option>
            <option></option>
        </select>
    </div>
    <div class="col-span-6 sm:col-span-3">
        <label for="village_code"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Desa/Kelurahan</label>
        <select id="village_code" name="village_code" data-placeholder="Pilih Desa/Kelurahan"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Pilih Desa/Kelurahan</option>
            <option></option>
        </select>
    </div>
</div>
@push('customJS')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        function onChangeSelect(url, code, name) {
            // send ajax request to get the cities of the selected province and append to the select tag
            $.ajax({
                url: url,
                type: "GET",
                data: {
                    code: code,
                },
                success: function(data) {
                    let select = $("#" + name);
                    select.empty();
                    select.append(`<option>${select.data("placeholder")}</option>`);
                    $.each(data, function(key, value) {
                        select.append(`<option value="${key}">${value}</option>`);
                    });
                },
            });
        }
        $("#city_code").attr("disabled", true);
        $("#district_code").attr("disabled", true);
        $("#village_code").attr("disabled", true);
        $(function() {
            $("#province_code").on("change", function() {
                onChangeSelect("api/city/", $(this).val(), "city_code");
                $("#city_code").attr("disabled", false);
                $("#district_code").attr("disabled", true).empty();
                $("#village_code").attr("disabled", true).empty();
            });
            $("#city_code").on("change", function() {
                onChangeSelect("api/district/", $(this).val(), "district_code");
                $("#city_code").attr("disabled", false);
                $("#district_code").attr("disabled", false).empty();
                $("#village_code").attr("disabled", false).empty();
            });
            $("#district_code").on("change", function() {
                onChangeSelect("api/village/", $(this).val(), "village_code");
            });
        });
    </script>
@endpush
