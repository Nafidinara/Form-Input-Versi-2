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
    <script src="{{url('resources/ckeditor/ckeditor.js')}}"></script>
    @include('sweet::alert')
    <div class="container">
        <div class="card" style="margin-top:10%; ">
            <h4 class="card-header">Form Tambah Berita</h4>
            <div class="card-body col" style="padding: 5%;">
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <form action="{{url('berita/proses-update/'.$data->berita_id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Judul Berita</label>
                        <input name="judul" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Isikan dengan judul berita" value="{{$data->judul}}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Konten Berita</label>
                        <textarea class="form-control ckeditor" id="ckeditor" name="konten" rows="3" placeholder="Isi dengan isi dan deskripsi berita" required>{{$data->isi}}</textarea>
                    </div>
                    <div>
                        <img style="width: 40%; height: 40%;" src="{{asset('app/'.$data->foto)}}" alt="gambar berita">
                    </div>
                    <div class="mt-4">
                        <label>Gambar Berita</label>
                        <div class="file-input col">
                            <input type="file" name="gambar">
                            <span class="button">Choose</span>
                            <span class="label" data-js-label>No file selected</span>
                        </div>
                    </div>
                    <div class="mt-5">
                        <button type="submit" class="btn btn-success btn-lg btn-block">Upload Berita</button>
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
