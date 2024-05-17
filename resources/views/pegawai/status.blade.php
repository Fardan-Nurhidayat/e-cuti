@extends('base.dashboard')
@section('content')
    <h2>Status Pengajuan</h2>
    <div class="border my-8 p-8 bg-white rounded-xl">
        <div class="grid grid-cols-3 gap-10">
            @foreach ($pengajuan as $data )
                <div class="shadow-lg p-5">
                    <h2 >Pengajuan Cuti</h2>
                    <p class="font-bold text-blue-600 text-xl">{{$data->cuti->jenis_cuti}}</p>
                    <p>{{\Carbon\Carbon::parse($data->tanggal_mulai)->format('d/M/Y')}} - {{\Carbon\Carbon::parse($data->tanggal_selesai)->format('d/M/Y')}}</p>
                    <div class="mt-3">
                        @if ($data->status == "Pending")
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-1.5 rounded dark:bg-blue-900 dark:text-blue-300">{{$data->status}}</span>
                        @elseif($data->status == "Ditolak")
                        <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">{{$data->status}}</span>
                        @elseif($data->status == "Diterima")
                        <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{$data->status}}</span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection