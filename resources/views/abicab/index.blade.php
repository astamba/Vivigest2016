@extends('layouts.master')

@section('title', 'Abi-Cab')
@section('pagetitle', 'Anagrafiche')
@section('pagesubtitle', 'Abi-Cab')

@section('user', Auth::user()->name)

<?php
//dd($abicabs);
?>

@section('scripts')
    <!-- DataTables -->
    <script src="{{asset('resources/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('resources/assets/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

    <script>
        $(function () {
            $('#table_abicab').DataTable({
                'paging': false
            });
        });
    </script>
@endsection

@section('content')
<div class="box">
    <div class="box-body">
        <table id="table_abicab" class="table table-bordered table-striped" >
            <thead>
                <tr>
                    <th>
                        <button class="btn btn-default btn-sm" type="button" onclick="window.location.href = '{{url('abicab/create')}}'">
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                    </th>
                    <th>Abi-Cab</th>
                    <th>Descrizione</th>
                    <th>Localit&agrave</th>
                </tr>
            </thead>
            <tbody>
                @foreach($abicabs as $abicab)
                    <tr>
                        <td width="110px">
                            <button class="btn btn-default btn-sm" type="button" onclick="window.location.href = 'abicab/{{$abicab->Codice}}/edit';">
                                <span class="glyphicon glyphicon-edit"></span>
                            </button>
                            <button class="btn btn-default btn-sm" type="button" onclick="window.location.href = 'abicab/{{$abicab->Codice}}'">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </td>
                        <td width="150px">
                            {{$abicab->Codice}}
                        </td>
                        <td>
                            {{$abicab->Descrizione}}
                        </td>
                        <td>
                            {{$abicab->Localita}}
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
        {!! $abicabs->links() !!}
    </div>
</div>

@endsection

