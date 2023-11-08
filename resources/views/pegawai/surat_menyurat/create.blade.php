@extends('layouts.theme')

@section('content')
    <div class="container">
        <div class="max-w-2xl px-4 sm:px-6 lg:px-8 mx-auto">
            <!-- Card -->
            <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-slate-900">
                <div class="text-center mb-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-800 dark:text-gray-200">
                        Surat Menyurat
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Politeknik Negeri Indramayu
                    </p>
                </div>

                <form method="POST" action="{{ route('surat.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Section -->
                    <div
                        class="py-6 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-gray-700">
                        <!-- HTML -->
                        <div class="flex items-center">
                            <label class="text-sm text-gray-500 mr-3 dark:text-gray-400">Personal</label>
                            <input type="checkbox" id="hs-basic-with-description"
                                class="relative shrink-0 w-[3.25rem] h-7 bg-gray-100 checked:bg-none checked:bg-blue-600 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 border border-transparent ring-1 ring-transparent focus:border-blue-600 focus:ring-blue-600 ring-offset-white focus:outline-none appearance-none dark:bg-gray-700 dark:checked:bg-blue-600 dark:focus:ring-offset-gray-800
                          
                            before:inline-block before:w-6 before:h-6 before:bg-white checked:before:bg-blue-200 before:translate-x-0 checked:before:translate-x-full before:shadow before:rounded-full before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-blue-200">
                            <label class="text-sm text-gray-500 ml-3 dark:text-gray-400">Unit Kerja</label>
                        </div>

                        <!-- Komponen yang ingin ditampilkan/sembunyikan -->
                        <div id="hiddenComponent" style="display: none;">
                            <!-- Isi komponen di sini -->
                            <label class="inline-block text-sm font-medium dark:text-white">
                                Unit Kerja
                            </label>

                            <select name="unit_kerja_id" id="unit_kerja_id"
                                class="py-2 px-3 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400">
                                <option disabled selected>Pilih Unit Kerja</option>
                                @foreach ($unitkerja as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>



                        <div id="personal">
                            <label class="inline-block text-sm font-medium dark:text-white">
                                Penerima
                            </label>

                            <div class="mt-2 space-y-3">
                                <input id="recipient-search" type="text"
                                    class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                    placeholder="Nama Jabatan fungsional">
                            </div>

                            <!-- Display search results in a dropdown -->
                            <div id="search-results" class="mt-2 space-y-3"></div>

                            <!-- Display selected recipients -->
                            <div id="selected-recipients" class="mt-4">
                                <p>Daftar Penerima yang Dipilih:</p>
                                <ul id="selected-recipient-list"></ul>
                            </div>

                            <!-- Hidden input to store selected recipients as JSON string -->
                            <input type="hidden" name="selected_recipients" id="selected-recipients-input">
                            <input type="hidden" name="usersSelected" id="usersSelected">
                            {{-- <input type="hidden" name="unit_kerja" id="usersSelected"> --}}
                        </div>
                        <script>
                            const toggleSwitch = document.getElementById('hs-basic-with-description');
                            const hiddenComponent = document.getElementById('hiddenComponent');
                            const personalComponent = document.getElementById('personal');
                            const unitkerjaId = document.getElementById('unit_kerja_id');
                            const usersSelectedId = document.getElementById('usersSelected');
                            const recipientSearch = document.getElementById('recipient-search');
                            const searchResults = document.getElementById('search-results');
                            const selectedRecipients = [];
                            const selectedRecipientList = document.getElementById('selected-recipient-list');
                            const selectedRecipientsInput = document.getElementById('selected-recipients-input');
                            const usersSelected = document.getElementById('usersSelected');


                            toggleSwitch.addEventListener('change', function() {
                                if (toggleSwitch.checked) {
                                    hiddenComponent.style.display = 'block';
                                    personalComponent.style.display = 'none';
                                    // unitkerjaId.value = null;
                                    usersSelectedId.value = null;
                                    while (selectedRecipientList.firstChild) {
                                        selectedRecipientList.removeChild(selectedRecipientList.firstChild);
                                    }

                                } else {
                                    hiddenComponent.style.display = 'none';
                                    personalComponent.style.display = 'block';
                                    unitkerjaId.value = null;
                                    // usersSelectedId.value = null;

                                }
                            });





                            recipientSearch.addEventListener('input', function() {
                                const userInput = this.value;

                                // Make an AJAX request to your server to fetch users based on userInput
                                // Replace '/surat/search-users?input=' with the actual route to search for users
                                fetch(`/surat/search-users?input=${userInput}`)
                                    .then(response => response.json())
                                    .then(data => {
                                        searchResults.innerHTML = '';
                                        data.forEach(user => {
                                            const userDiv = document.createElement('div');

                                            userDiv.textContent = user.name;
                                            userDiv.className =
                                                'cursor-pointer p-2 hover-bg-gray-200 dark:hover-bg-gray-700';
                                            userDiv.addEventListener('click', () => {
                                                // Set the selected recipient in the input field
                                                recipientSearch.value = user.name;

                                                // Add the selected recipient to the array
                                                selectedRecipients.push(user);

                                                // Update the selected recipient list
                                                const selectedRecipientItem = document.createElement('li');
                                                selectedRecipientItem.textContent = user.name;

                                                // Add a button to remove the recipient
                                                const removeButton = document.createElement('button');
                                                removeButton.textContent = 'Hapus';
                                                removeButton.className = 'text-red-500 ml-2';
                                                removeButton.addEventListener('click', () => {
                                                    // Remove the selected recipient from the array
                                                    const index = selectedRecipients.indexOf(user);
                                                    if (index !== -1) {
                                                        selectedRecipients.splice(index, 1);
                                                    }

                                                    // Remove the selected recipient from the list
                                                    selectedRecipientList.removeChild(
                                                        selectedRecipientItem);

                                                    // Update the hidden input with the selected recipients
                                                    selectedRecipientsInput.value = JSON.stringify(
                                                        selectedRecipients);
                                                    // selectedRecipientsInput.value = "oke";

                                                });

                                                selectedRecipientItem.appendChild(removeButton);
                                                selectedRecipientList.appendChild(selectedRecipientItem);

                                                // Clear search results
                                                searchResults.innerHTML = '';
                                                console.log(selectedRecipients);
                                                const list = [];
                                                selectedRecipients.map((item) => {
                                                    list.push(item.id);
                                                    // usersSelected.value = usersSelected + "." + item.id
                                                })
                                                usersSelected.value = list;
                                                // console.log(list);
                                            });
                                            searchResults.appendChild(userDiv);
                                        });
                                    });
                            });
                        </script>

                        {{-- end search --}}
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Judul
                        </label>

                        <div class="mt-2 space-y-3">
                            <input name="judul" type="text"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Nama Jabatan fungsional">
                        </div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            Isi
                        </label>

                        <div class="mt-2 space-y-3">
                            <input name="isi" type="text"
                                class="py-2 px-3 pr-11 block w-full border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Nama Jabatan fungsional">
                        </div>
                        <label class="inline-block text-sm font-medium dark:text-white">
                            File Pendukung
                        </label>

                        <div class="mt-2 space-y-3">
                            <label class="block">
                                <span class="sr-only">Choose profile photo</span>
                                <input name="file" type="file"
                                    class="block w-full text-sm text-gray-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-md file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-blue-500 file:text-white
                                    hover:file:bg-blue-600
                                " />
                            </label>
                        </div>
                    </div>

                    <div class="mt-5 flex justify-end gap-x-2">
                        <button type="button"
                            class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover-bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover-text-white dark:focus:ring-offset-gray-800">
                            Cancel
                        </button>
                        <button type="submit"
                            class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                            Save changes
                        </button>
                    </div>

                </form>
            </div>
            <!-- End Card -->
        </div>
    </div>
@endsection
