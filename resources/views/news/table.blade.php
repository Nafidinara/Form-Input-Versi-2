@extends('base')
@section('content')
    <div class="container-fluid">
        <link rel="stylesheet" href="{{url('https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css')}}">
        <script src="{{url('https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{url('https://use.fontawesome.com/9564038555.js')}}"></script>
        <div class="card" style="margin-top:12%; ">
            <div class="card-header">
                <h4>Tabel Pengolahan Berita</h4>
            </div>
            <div class="card-body col" style="padding: 5%;">
{{--                            @php--}}
{{--                            dd($data);--}}
{{--                            @endphp--}}
                <a href="{{url('berita/store')}}"><button style="margin-top: -5%;" class="btn btn-success">Tambah Berita</button></a>
                <table class="table table-striped table-bordered data">
                    <thead>
                    <tr style="text-align: center">
                        <th>Nomor</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Isi</th>
                        <th>Di Upload</th>
                        <th>Di Update</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(is_array($data) || is_object($data))
                        @foreach($data as $key=>$datas)
                            <tr style="text-align: center">
                                <td>{{$key+1}}</td>
                                <td>
                                    <img class="img-table-berita" src="{{asset('app/'.$datas->foto)}}" alt="iyaaa">
                                </td>
                                <td>{{\Illuminate\Support\Str::limit($datas->judul,50)}}</td>
                                <td>{!!\Illuminate\Support\Str::limit($datas->isi,50)!!}</td>
                                <td>{{$datas->created_at}}</td>
                                <td>{{$datas->updated_at}}</td>
                                <td>
                                    <a href="{{url('berita/edit/'.$datas->berita_id)}}"><button class="btn"><i class="fa fa-pencil-square-o"></i></button></a>
                                    <a href="{{url('download/'.$datas->berita_id)}}"><button class="btn"><i class="fa fa-trash"></i></button></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.data').DataTable();
        });
    </script>
@endsection
