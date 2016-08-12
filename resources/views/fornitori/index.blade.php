@extends('layouts.master')

@section('title', 'Fornitori')

@section('pagetitle', 'Anagrafiche')
@section('pagesubtitle', 'Fornitori')

@section('user', Auth::user()->name)

@section('scripts')
    <!-- DataTables -->
    <script src="{{asset('resources/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('resources/assets/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

    <script>
        $(function () {
            $("#example1").DataTable();
            var table = $('#table_fornitori').DataTable({
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
        <table id="table_fornitori" class="table table-bordered table-striped" >
            <thead>
                <tr>
                    <th>
                        <button class="btn btn-default btn-sm" type="button" onclick="window.location.href = '{{url('fornitori/create')}}'">
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
                @foreach($fornitori as $fornitore)
                    <tr>
                        <td width="110px">
                            <button class="btn btn-default btn-sm" type="button" onclick="window.location.href = 'fornitori/{{$fornitore->Codice}}/edit';">
                                <span class="glyphicon glyphicon-edit"></span>
                            </button>
                            <button class="btn btn-default btn-sm" type="button" onclick="window.location.href = 'fornitori/{{$fornitore->Codice}}'">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </td>
                        <td width="70px">
                            {{$fornitore->Codice}}
                        </td>
                        <td>
                            {{$fornitore->RagioneSociale}}
                        </td>
                        <td>
                            {{$fornitore->Indirizzo}}
                        </td>
                        <td width="60px">
                            {{$fornitore->Cap}}
                        </td>
                        <td>
                            {{$fornitore->Localita}}
                        </td>
                        <td width="40px">
                            {{$fornitore->Provincia}}
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

