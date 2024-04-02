<x-app-layout>
    <div class="flex md:flex-row justify-between items-center mb-4">
        <div>
            <button type="button"
                class="px-5 py-2.5 text-sm font-medium text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">New
            </button>
        </div>
        <div>

            <form class="max-w-md mx-auto">
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <input type="search" id="default-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500""
                        placeholder="Search..." required />
                </div>
            </form>

        </div>
    </div>
    <div class="relative shadow-md sm:rounded-lg overflow-visible">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-3 py-2 sm:px-6 sm:py-3">Name</th>
                    <th scope="col" class="px-3 py-2 sm:px-6 sm:py-3">Phone</th>
                    <th scope="col" class="px-3 py-2 sm:px-6 sm:py-3">Date Appointment</th>
                    <th scope="col" class="px-3 py-2 sm:px-6 sm:py-3">Time</th>
                    <th scope="col" class="px-3 py-2 sm:px-6 sm:py-3">Vaccine Type</th>
                    <th scope="col" class="px-3 py-2 sm:px-6 sm:py-3">Center</th>
                    <th scope="col" class="px-3 py-2 sm:px-6 sm:py-3">Status</th>
                    <th scope="col" class="px-3 py-2 sm:px-6 sm:py-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row"
                            class="px-3 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white sm:px-6 sm:py-4">
                            {{ $appointment->getName() }}</th>
                        <td class="px-3 py-2 sm:px-6 sm:py-4">{{ $appointment->getPhone() }}</td>
                        <td class="px-3 py-2 sm:px-6 sm:py-4">{{ $appointment->getDateTime('date') }}</td>
                        <td class="px-3 py-2 sm:px-6 sm:py-4">{{ $appointment->getDateTime('time') }}</td>
                        <td class="px-3 py-2 sm:px-6 sm:py-4">{{ $appointment->getVaccineType() }}</td>
                        <td class="px-3 py-2 sm:px-6 sm:py-4">{{ $appointment->getVaccineCenter() }}</td>
                        <td class="px-3 py-2 sm:px-6 sm:py-4">Pending</td>
                        <td class="px-3 py-2 sm:px-6 sm:py-4">
                            <button id="dropdownMenuIconHorizontalButton"
                                data-dropdown-toggle="dropdownDotsHorizontal{{ $loop->index }}"
                                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                type="button">
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 16 3">
                                    <path
                                        d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                </svg>
                            </button>

                            <!-- Dropdown menu -->
                            <div id="dropdownDotsHorizontal{{ $loop->index }}"
                                class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownMenuIconHorizontalButton">
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Accept</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Cancel</a>
                                    </li>
                                    <li>
                                        <a href="#"
                                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                                    </li>
                                </ul>
                                <div class="py-2">
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Show
                                        All</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-5">
        {{ $appointments->links() }}
    </div>
</x-app-layout>
