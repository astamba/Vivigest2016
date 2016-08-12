@extends('layouts.master')

@section('title', 'Clienti')

@section('pagetitle', 'Anagrafiche')
@section('pagesubtitle', 'Clienti')

@section('user', Auth::user()->name)

@section('scripts')
    <!-- DataTables -->
    <script src="{{asset('resources/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('resources/assets/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

    <script>
        $(function () {
            $("#example1").DataTable();
            var table = $('#table_clienti').DataTable({
                "paging": false,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "scrollY": '60vh',
                "scrollCollapse": true,
            });
        });
    </script>
@endsection

@section('content')
<div class="box">
    <div class="box-body">
        <table id="table_clienti" class="table table-bordered table-striped" >
            <thead>
                <tr>
                    <th>
                        <button class="btn btn-default btn-sm" type="button" onclick="window.location.href = '{{url('clienti/create')}}'">
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                    </th>
                    <th>Codice</th>
                    <th>Ragione Sociale</th>
                    <th>Indirizzo</th>
                    <th>Cap</th>
                    <th>Localit&agrave</th>
                    <th>Prov.</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clienti as $cliente)
                    <tr>
                        <td width="110px">
                            <button class="btn btn-default btn-sm" type="button" onclick="window.location.href = 'clienti/{{$cliente->Codice}}/edit';">
                                <span class="glyphicon glyphicon-edit"></span>
                            </button>
                            <button class="btn btn-default btn-sm" type="button" onclick="window.location.href = 'clienti/{{$cliente->Codice}}'">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </td>
                        <td width="70px">
                            {{$cliente->Codice}}
                        </td>
                        <td>
                            {{$cliente->RagioneSociale}}
                        </td>
                        <td>
                            {{$cliente->Indirizzo}}
                        </td>
                        <td width="60px">
                            {{$cliente->Cap}}
                        </td>
                        <td>
                            {{$cliente->Localita}}
                        </td>
                        <td width="40px">
                            {{$cliente->Provincia}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            {{--<tfoot>--}}
            {{--<tr>--}}
                {{--<th>--}}
                    {{--<button class="btn btn-default btn-sm" type="button" onclick="window.location.href = 'gruppiclifor/create'">--}}
                        {{--<span class="glyphicon glyphicon-plus"></span>--}}
                    {{--</button>--}}
                {{--</th>--}}
                {{--<th>Codice</th>--}}
                {{--<th>Descrizione</th>--}}
            {{--</tr>--}}
            {{--</tfoot>--}}
        </table>
    </div>
</div>

@endsection

