@extends('base.dashboard')
<h2 class="font-bold">
    @section('head', 'Pengajuan Cuti')
</h2>
@section('content')
    <div class="relative overflow-x-auto sm:rounded-lg">
        <div
            class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 py-4 bg-white dark:bg-gray-900">
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jenis Cuti
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengajuan as $data)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-1" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <th scope="row"
                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                            <img class="w-10 h-10 rounded-full" src="/img/image.png" alt="Jese image">
                            <div class="ps-3">
                                <div class="text-base font-semibold">{{ $data->user->name }}</div>
                                <div class="font-normal text-gray-500">{{ $data->user->email }}</div>
                            </div>
                        </th>
                        <td class="px-6 py-4 font-bold">
                            {{ $data->cuti->jenis_cuti }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                @if ($data->status == 'Pending')
                                    <div class="h-2.5 w-2.5 rounded-full bg-blue-500 me-2"></div>{{ $data->status }}
                                @elseif ($data->status == 'Diterima')
                                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> {{ $data->status }}
                                @elseif ($data->status == 'Ditolak')
                                    <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> {{ $data->status }}
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <!-- Modal toggle -->
                            <a href="#" type="button" data-modal-target="edit-{{ $data->id }}"
                                data-modal-show="edit-{{ $data->id }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Lihat</a>
                            <div id="edit-{{ $data->id }}" tabindex="-1" aria-hidden="true"
                                class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-2xl max-h-full">
                                    <!-- Modal content -->
                                    <form class="relative bg-white rounded-lg shadow dark:bg-gray-700 min-h-max "
                                        action="{{ route('admin.update.status') }}" method="POST">
                                        <!-- Modal header -->
                                        @csrf
                                        <div
                                            class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                Edit Pengajuan
                                            </h3>
                                            <button type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                data-modal-hide="edit-{{ $data->id }}">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-6 space-y-6">
                                            <p>Keterangan :
                                                {{ $data->keterangan }}</p>
                                            <p>Tanggal Mulai :
                                                {{ \Carbon\Carbon::parse($data->tanggal_mulai)->format('d/M/Y') }}
                                            </p>
                                            <p>
                                                Tanggal Selesai :
                                                {{ \Carbon\Carbon::parse($data->tanggal_selesai)->format('d/M/Y') }}
                                            </p>
                                            <div class="grid grid-cols-1 gap-6">
                                                <div>
                                                    <input type="hidden" name="id" value="{{ $data->id }}"
                                                        id="{{ $data->id }}">
                                                    <label for="status"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                                                        Status</label>
                                                    <select name="status" id="status"
                                                        class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                        <option value="{{ $data->status }}" selected>{{ $data->status }}
                                                        </option>
                                                        @foreach (['Diterima', 'Ditolak', 'Pending'] as $status)
                                                            @if ($status !== $data->status)
                                                                <option value="{{ $status }}">{{ $status }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div
                                                class="flex items-center p-6 space-x-3 rtl:space-x-reverse border-t border-gray-200 rounded-b dark:border-gray-600">
                                                <button type="submit"
                                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save
                                                    all</button>
                                            </div>
                                        </div>
                                        <!-- Modal footer -->

                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <!-- Edit user modal -->
    </div>

@endsection
