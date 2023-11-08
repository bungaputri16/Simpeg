@extends('layouts.theme')

@section('content')
    <div class="container">
        <div >
            <p class="pb-1 font-bold">Management Surat Tugas</p>

        </div>
        <div class="flex flex-col">
            <div class=" overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="border rounded-lg divide-y divide-gray-200 dark:border-gray-700 dark:divide-gray-700">
                        <div class="py-3 px-4">
                            <div class="relative max-w-xs">
                                <label for="hs-table-with-pagination-search" class="sr-only">Search</label>
                                <input type="text" name="hs-table-with-pagination-search"
                                    id="hs-table-with-pagination-search"
                                    class="p-3 pl-10 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="Search for items">
                                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none pl-4">
                                    <svg class="h-3.5 w-3.5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Tanggal Kehadiran
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Nomor Surat Tugas
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            File
                                        </th>
                                        <th scope="col" 
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            Penerima
                                        </th><th scope="col"
                                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">
                                            
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                                    @foreach ($surattugas as $log)
                                        <tr>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $log->created_at->format('d M Y') }}
                                            </td>
            
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                {{ $log->nomor }}

                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                <a target="_blank" href="{{ url('document/surat_keputusan/'. $log->file_pendukung ) }}"> lihat </a>
                                  

                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                                @foreach ($log->penerima as $penerima)
                                                    <p>{{ $penerima->user->name }}</p>
                                                @endforeach

                                            </td>
                                            {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">New York No. 1 Lake Park</td> --}}
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium ">
                                                <div class="flex justify-end">

                             
                                                </div>



                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="py-1 px-4">
                            {{-- {{ $perizinan->links() }} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
          $(document).ready(function() {
                var $provinsiSelect = $('#provinsiSelect');

                $provinsiSelect.select2();
                // $.ajax({
                //     url: 'https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json',
                //     type: 'GET',
                //     dataType: 'json',
                //     success: function(provinsiData) {
                //         // Isi dropdown provinsi dengan data provinsi
                //         $.each(provinsiData, function(index, provinsi) {
            
                //             $provinsiSelect.append('<option value="' + provinsi.id + '">' + provinsi.name + '</option>');
                //         });

                //         $provinsiSelect.select2(); // Activate Select2

                //         // Trigger the "change" event on $provinsiSelect to notify any attached event listeners
                //         $provinsiSelect.trigger('change');
                //     },
                //     error: function() {
                //         console.error('Gagal mengambil data provinsi dari API.');
                //     }
                // });


          });
        </script>
         
    </div>
@endsection
