@extends('layouts.theme')

@section('content')
    <div class="container">
        <div class="flex justify-between">
            <p class="pb-2 font-bold">Pegawai Fungsional</p>
            {{-- <a href="{{ route('jabatan-fungsional.create') }}">
                <button type="button"
                    class="py-2 px-3 mb-2 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                    Add
                </button>
            </a> --}}

        </div>
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
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
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">NIP
                                        </th>

                                        {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Address</th> --}}
                                        <th scope="col"
                                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                                    @foreach ($pegawai as $index => $pg)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            {{ $pg->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-200">
                                            {{ $pg->nip }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium ">
                                            <div class="flex justify-end">
                                                <form method="POST" action="{{ route('pegawai-fungsional.created',['id' => $pg->id]) }}">
                                                    @csrf
                                                    <select id="unitKerja{{ $index }}"
                                                        class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 sm:p-4">
                                                        <option disabled selected>Unit Kerja</option>
                                                        @foreach ($unitKerja as $unit)
                                                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                        @endforeach
                                                    </select>
                                    
                                                    <select name="jabatan_id" id="jabatanFungsional{{ $index }}"
                                                        class="py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 sm:p-4">
                                                        <option disabled selected>Jabatan Fungsional</option>
                                                    </select>
                                    
                                                    <script>
                                                        const unitKerjaDropdown{{ $index }} = document.getElementById('unitKerja{{ $index }}');
                                                        const jabatanFungsionalDropdown{{ $index }} = document.getElementById('jabatanFungsional{{ $index }}');
                                                        
                                                        unitKerjaDropdown{{ $index }}.addEventListener('change', () => {
                                                            // alert('ehm')
                                                            // Ambil nilai yang dipilih dari dropdown Unit Kerja
                                                            const selectedUnitKerjaId = unitKerjaDropdown{{ $index }}.value;
                                    
                                                            // Hapus opsi lama pada dropdown Jabatan Fungsional
                                                            jabatanFungsionalDropdown{{ $index }}.innerHTML =
                                                                '<option disabled selected>Jabatan Fungsional</option>';
                                    
                                                            // Deklarasikan variabel jabatanOption di luar loop
                                                            let jabatanOption;
                                    
                                                            // Perbarui dropdown Jabatan Fungsional berdasarkan Unit Kerja yang dipilih
                                                            @foreach ($unitKerja as $unit)
                                                                if (selectedUnitKerjaId == {{ $unit->id }}) {
                                                                    @foreach ($unit->jabatanfungsional as $fgs)
                                                                        jabatanOption = document.createElement('option');
                                                                        jabatanOption.value = '{{ $fgs->id }}';
                                                                        jabatanOption.textContent = '{{ $fgs->name }}';
                                                                        jabatanFungsionalDropdown{{ $index }}.appendChild(jabatanOption);
                                                                    @endforeach
                                                                }
                                                            @endforeach
                                                        });
                                                    </script>
                                                    <button type="submit"
                                                    class="py-2 px-3 my-2 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                                    Simpan
                                                </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    


                                </tbody>
                            </table>
                        </div>
                        <div class="py-1 px-4">
                            {{ $pegawai->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
