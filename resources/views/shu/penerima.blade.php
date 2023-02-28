@extends('layouts.sidebar')
@section('body')
    <div class="col-12 d-flex justify-content-center mt-3">
        <main class="col-10">
            <div class="row align-items-center">
                <div class="row justify-content-end">
                    <div class="col-4 d-flex justify-content-end ">
                        <a href="/print-penerima-shu/{{ $shu->id }}" target="_Blank" class="mt-2 ms-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-printer-fill" viewBox="0 0 16 16">
                                <path
                                    d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z" />
                                <path
                                    d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="col-3">
                    @if (url('') == 'http://127.0.0.1:8000')
                        <div class="row justify-content-center">
                            <div class="col-sm-12 d-flex justify-content-center">
                                <img class="img-preview " style="display: block;"
                                    src="{{ url('') . '/logo/' . $profil->logo }} " width="40%">
                            </div>
                        </div>
                    @else
                        <div class="row justify-content-center">
                            <div class="col-sm-12 d-flex justify-content-center">
                                <img class="img-preview " style="display: block;"
                                    src="{{ url('') . '/public/logo/' . $profil->logo }} " width="40%">
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-8 text-center">
                    <h3>Koperasi {{ $profil->nama_koperasi }}</h3>
                    <p>{{ $profil->alamat }} {{ $profil->telepon }}</p>
                </div>
            </div>
            <hr>
        
            <h4 class="text-center">Data Penerima SHU</h4>
            <h4>ID SHU : {{ $shu->id }}</h4>
            <table class="table col-6 text-center">
                <tr class="text-center table-secondary text-center">
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>TAHUN</th>
                    <th>BESAR SHU</th>
                    <th>PRESENTASE MODAL</th>
                    <th>NOMINAL TERIMA</th>
                </tr>
                @foreach ($shu->Pembagian_shu as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->created_at }}</td>
                        <td>@format($p->shu->besar_shu_bersih - $p->shu->sisa_shu)</td>
                        <td>{{ number_format($p->presentase * 100, 0, '.') }} % </td>
                        <td>@format($p->nominal)</td>
                    </tr>
                @endforeach
            </table>
        </main>
    </div>
@endsection
