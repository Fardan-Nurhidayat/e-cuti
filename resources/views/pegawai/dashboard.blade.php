@extends('base.dashboard')
@section('content')
    <h2>Hallo, {{ Auth::user()->name }}</h2>
    <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-md dark:bg-gray-800 dark:border-gray-700">
        <form method="POST" action="{{ route('pegawai.kirim.cuti') }}">
            @csrf
            <div class="px-10 py-2">
                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Cuti</label>
                <select name="jenis_cuti" id="countries"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="--- Pilih Jenis Cuti ---" default>--- Pilih Jenis Cuti --- </option>
                    @foreach ($jeniscuti as $data)
                        <option value="{{ $data->id }}">{{ $data->jenis_cuti }}</option>
                    @endforeach
                </select>
            </div>
            @error('jenis_cuti')
                <div class="text-red-600">{{ $message }}</div>
            @enderror
            <div class="px-10 py-2">
                <label for="tanggal_mulai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                    Mulai</label>
                <input name="tanggal_mulai" type="date" id="tanggal_mulai"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                @error('tanggal_mulai')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class="px-10 py-2">
                <label for="tanggal_akhir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last
                    name</label>
                <input name="tanggal_akhir" type="date" id="tanggal_akhir"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                @error('tanggal_akhir')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class="px-10 py-2">
                <label for="keterangan"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                <textarea name="keterangan" id="keterangan" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Isikan keterangan anda..."></textarea>
                @error('keterangan')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>

            <div class="m-6">
                <button type="submit"
                    class="min-w-full text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kirim</button>
            </div>
        </form>
    </div>
@endsection
