@extends('layouts.master')

@section('title', 'Causali Trasporto')

@section('pagetitle', 'Anagrafiche')
@section('pagesubtitle', 'Causali Trasporto')

@section('user', Auth::user()->name)

@section('scripts')
    <!-- DataTables -->
    <script src="{{asset('resources/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('resources/assets/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
@endsection

@section('content')
<div class="box">
    <div class="box-body">
        <table id="example1" class="table table-bordered table-striped" >
            <thead>
                <tr>
                    <th>
                        <button class="btn btn-default btn-sm" type="button" onclick="window.location.href = '{{url('causalitrasporto/create')}}'">
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                    </th>
                    <th>Codice</th>
                    <th>Descrizione</th>
                </tr>
            </thead>
            <tbody>
                @foreach($causali as $causale)
                    <tr>
                        <td width="110px">
                            <button class="btn btn-default btn-sm" type="button" onclick="window.location.href = 'causalitrasporto/{{$causale->Codice}}/edit';">
                                <span class="glyphicon glyphicon-edit"></span>
                            </button>
                            <button class="btn btn-default btn-sm" type="button" onclick="window.location.href = 'causalitrasporto/{{$causale->Codice}}'">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </td>
                        <td width="150px">
                            {{$causale->Codice}}
                        </td>
                        <td>
                            {{$causale->Descrizione}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

