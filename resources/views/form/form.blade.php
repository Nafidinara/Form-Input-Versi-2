@extends('base')
@section('content')
    <style>
        * {
            box-sizing: border-box;
        }

        .file-input {
            display: inline-block;
            text-align: left;
            background: #dddddd;
            padding: 16px;
            position: relative;
            border-radius: 5px;
        }

        .file-input > [type='file'] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            z-index: 10;
            cursor: pointer;
        }

        .file-input > .button {
            display: inline-block;
            cursor: pointer;
            background: #eee;
            padding: 8px 50px;
            border-radius: 2px;
            margin-right: 8px;
        }

        .file-input:hover > .button {
            background: dodgerblue;
            color: white;
        }

        .file-input > .label {
            color: #303030;
            white-space: nowrap;
            opacity: .3;
        }

        .file-input.-chosen > .label {
            opacity: 1;
        }
    </style>
    @include('sweet::alert')
    <div class="container">
        <div class="card" style="margin-top:10%; ">
            <h4 class="card-header">Formulir Keabsahan Dokumen</h4>
            <div class="card-body col" style="padding: 5%;">
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <form action="{{url('proses-input')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <h5>Informasi Utama : </h5>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Organisasi</label>
                        <input name="nama_organisasi" type="text" class="form-control" id="exampleFormControlInput1" placeholder="sesuai yang ada di Anggaran Dasar">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama Notaris</label>
                        <input name="no_notaris" type="text" class="form-control" id="exampleFormControlInput1" placeholder="sesuai yang ada di Akta Pendirian">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nomor & Tanggal Akta Notaris</label>
                        <input name="akta_notaris" type="text" class="form-control" id="exampleFormControlInput1" placeholder="sesuai yang ada di Akta Pendirian">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nomor & Tanggal Surat Permohonan</label>
                        <input name="tgl_srt_permohonan" type="text" class="form-control" id="exampleFormControlInput1" placeholder="disertai perihal surat">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Bidang Kegiatan</label>
                        <input type="text" name="bdg_kegiatan" class="form-control" id="exampleFormControlInput1" placeholder="sesuai dengan ormas">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Progam Kerja Ormas</label>
                        <input type="text" name="proker_ormas" class="form-control" id="exampleFormControlInput1" placeholder="sesuai dengan ormas">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Alamat Kantor/Sekertariat</label>
                        <input type="text"  name="alamat_kantor" class="form-control" id="exampleFormControlInput1" placeholder="sesuai domisili ormas">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tempat & Waktu Pendirian</label>
                        <input type="text" class="form-control" name="tw_pendirian" id="exampleFormControlInput1" placeholder="sesuai akta notaris ormas">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Asas Ciri Organisasi</label>
                        <input type="text" class="form-control" name="asas_organisasi" id="exampleFormControlInput1" placeholder="tidak bertentangan dengan pancasila">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tujuan Organisasi</label>
                        <input type="text" class="form-control" name="tujuan_organisasi" id="exampleFormControlInput1" placeholder="sesuai dengan ormas">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Nama Pendiri</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="nama_pendiri" rows="3" placeholder="nama, NIK, agama, kewarganegaraan, jenis kelamin, ttl, Status Perkawinan, Alamat, no telepon, pekerjaan"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Nama Pembina (jika ada)</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="nama_pembina" rows="3" placeholder="nama, NIK, agama, kewarganegaraan, jenis kelamin, ttl, Status Perkawinan, Alamat, no telepon, pekerjaan"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Nama Penasehat (jika ada)</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="nama_penasihat" placeholder="nama, NIK, agama, kewarganegaraan, jenis kelamin, ttl, Status Perkawinan, Alamat, no telepon, pekerjaan"></textarea>
                    </div>
                    <hr>
                    <h5>Biodata Pengurus : </h5>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Ketua/Sebutan Lain</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="nama_ketua" placeholder="nama, NIK, agama, kewarganegaraan, jenis kelamin, ttl, Status Perkawinan, Alamat, no telepon, pekerjaan"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Sekertaris/Sebutan Lain (jika ada)</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="nama_sekertaris" rows="3" placeholder="nama, NIK, agama, kewarganegaraan, jenis kelamin, ttl, Status Perkawinan, Alamat, no telepon, pekerjaan"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Bendahara/Sebutan Lain (jika ada)</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="nama_bendahara" rows="3" placeholder="nama, NIK, agama, kewarganegaraan, jenis kelamin, ttl, Status Perkawinan, Alamat, no telepon, pekerjaan"></textarea>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Masa Bakti Kepengurusan</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="masa_bakti_kepengurusan" placeholder="sesuai yang ada di SK ormas">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Keputusan Tertinggi Organisasi</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="keputusan_ttgi_organisasi" placeholder="sesuai yang ada di Anggaran Dasar">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Unit/Cabang</label>
                        <input type="text" class="form-control" name="unit_cabang" id="exampleFormControlInput1" placeholder="jumlah dan sebaran cabang">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Sumber Keuangan</label>
                        <input type="text" class="form-control" name="sumber_keuangan" id="exampleFormControlInput1" placeholder="dalam negeri/luar negeri">
                    </div>
                    <div class="mt-4">
                        <label>NPWP</label>
                        <div class="file-input col">
                            <input type="file" name="npwp" required>
                            <span class="button">Choose</span>
                            <span class="label" data-js-label>No file selected</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label>Lambang/Logo Organisasi</label>
                        <div class="file-input col">
                            <input type="file" name="logo_organisasi" required>
                            <span class="button">Choose</span>
                            <span class="label" data-js-label>No file selected</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        <label>Bendera Organisasi</label>
                        <div class="file-input col">
                            <input type="file" name="bendera_organisasi" required>
                            <span class="button">Choose</span>
                            <span class="label" data-js-label>No file selected</span>
                        </div>
                    </div>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-success btn-lg btn-block">Kirim Dokumen</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script>
        var inputs = document.querySelectorAll('.file-input')

        for (var i = 0, len = inputs.length; i < len; i++) {
            customInput(inputs[i])
        }

        function customInput (el) {
            const fileInput = el.querySelector('[type="file"]')
            const label = el.querySelector('[data-js-label]')

            fileInput.onchange =
                fileInput.onmouseout = function () {
                    if (!fileInput.value) return

                    var value = fileInput.value.replace(/^.*[\\\/]/, '')
                    el.className += ' -chosen'
                    label.innerText = value
                }
        }
    </script>
@endsection
