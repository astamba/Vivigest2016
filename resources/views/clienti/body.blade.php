@section('scripts')
    <!-- DataTables -->
    <script src="{{asset('resources/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('resources/assets/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('resources/assets/plugins/select2/select2.min.js')}}"></script>

    <script>
        $(function () {
            $("#contatti_table").DataTable();
            $("#destdiv_table").DataTable();
            $('#AbiCab').select2({
                ajax: {
                    url: "{{ url('resources/views/scripts/elencoabicab.php') }}",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term, // search term
                            page: params.page
                        };
                    },
                    cache: true
                },
                minimumInputLength: 0,
            });
            var abicab = '<?php echo $cliente->AbiCab; ?>';
            var descrabicab = '<?php echo DB::table("abicab")->where("Codice", $cliente->AbiCab)->first()->Descrizione; ?>';
            if (abicab != '')
            {
                var option = new Option(abicab + ' - ' + descrabicab, abicab, true, true);
                $('#AbiCab').append(option);
                $('#AbiCab').trigger('change');
            }
        });
    </script>
@endsection

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="Codice">Codice</label>
                        @if ($formmethod == 'update' or $formmethod == 'delete')
                            {!! Form::text('Codice', old('Codice'), ['class' => 'form-control', 'readonly']) !!}
                        @endif
                        @if ($formmethod == 'create')
                            {!! Form::text('Codice', $cliente->Codice, ['class' => 'form-control', 'readonly']) !!}
                        @endif
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="form-group">
                        <label for="RagioneSociale">Ragione Sociale</label>
                        @if($formmethod == 'update')
                            {!! Form::text('RagioneSociale', old('RagioneSociale'), ['class' => 'form-control']) !!}
                        @endif
                        @if($formmethod == 'create')
                            {!! Form::text('RagioneSociale', '', ['class' => 'form-control']) !!}
                        @endif
                        @if($formmethod == 'delete')
                            {!! Form::text('RagioneSociale', old('RagioneSociale'), ['class' => 'form-control', 'readonly']) !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Dati Generali</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="PartitaIva">Partita Iva</label>
                        @if ($formmethod == 'update')
                            {!! Form::text('PartitaIva', old('PartitaIva'), ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'create')
                            {!! Form::text('PartitaIva', '', ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'delete')
                            {!! Form::text('PartitaIva', old('PartitaIva'), ['class' => 'form-control', 'readonly']) !!}
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="CodiceFiscale">Codice Fiscale</label>
                        @if ($formmethod == 'update')
                            {!! Form::text('CodiceFiscale', old('CodiceFiscale'), ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'create')
                            {!! Form::text('CodiceFiscale', '', ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'delete')
                            {!! Form::text('CodiceFiscale', old('CodiceFiscale'), ['class' => 'form-control', 'readonly']) !!}
                        @endif
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="Indirizzo">Indirizzo</label>
                        @if ($formmethod == 'update')
                            {!! Form::text('Indirizzo', old('Indirizzo'), ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'create')
                            {!! Form::text('Indirizzo', '', ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'delete')
                            {!! Form::text('Indirizzo', old('Indirizzo'), ['class' => 'form-control', 'readonly']) !!}
                        @endif
                    </div>
                </div>
                <div class="col-lg-1">
                    <div class="form-group">
                        <label for="Cap">Cap</label>
                        @if ($formmethod == 'update')
                            {!! Form::text('Cap', old('Cap'), ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'create')
                            {!! Form::text('Cap', '', ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'delete')
                            {!! Form::text('Cap', old('Cap'), ['class' => 'form-control', 'readonly']) !!}
                        @endif
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="form-group">
                        <label for="Localita">Localit&agrave</label>
                        @if ($formmethod == 'update')
                            {!! Form::text('Localita', old('Localita'), ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'create')
                            {!! Form::text('Localita', '', ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'delete')
                            {!! Form::text('Localita', old('Localita'), ['class' => 'form-control', 'readonly']) !!}
                        @endif
                    </div>
                </div>
                <div class="col-lg-1">
                    <div class="form-group">
                        <label for="Provincia">Prov.</label>
                        @if ($formmethod == 'update')
                            {!! Form::text('Provincia', old('Provincia'), ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'create')
                            {!! Form::text('Provincia', '', ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'delete')
                            {!! Form::text('Provincia', old('Provincia'), ['class' => 'form-control', 'readonly']) !!}
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="Telefono">Telefono</label>
                        @if ($formmethod == 'update')
                            {!! Form::text('Telefono', old('Telefono'), ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'create')
                            {!! Form::text('Telefono', '', ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'delete')
                            {!! Form::text('Telefono', old('Telefono'), ['class' => 'form-control', 'readonly']) !!}
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="Fax">Fax</label>
                        @if ($formmethod == 'update')
                            {!! Form::text('Fax', old('Fax'), ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'create')
                            {!! Form::text('Fax', '', ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'delete')
                            {!! Form::text('Fax', old('Fax'), ['class' => 'form-control', 'readonly']) !!}
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="Cellulare">Cellulare</label>
                        @if ($formmethod == 'update')
                            {!! Form::text('Cellulare', old('Cellulare'), ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'create')
                            {!! Form::text('Cellulare', '', ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'delete')
                            {!! Form::text('Cellulare', old('Cellulare'), ['class' => 'form-control', 'readonly']) !!}
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="EMail1">E-Mail 1</label>
                        @if ($formmethod == 'update')
                            {!! Form::text('EMail1', old('EMail1'), ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'create')
                            {!! Form::text('EMail1', '', ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'delete')
                            {!! Form::text('EMail1', old('EMail1'), ['class' => 'form-control', 'readonly']) !!}
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="EMail2">E-Mail 2</label>
                        @if ($formmethod == 'update')
                            {!! Form::text('EMail2', old('EMail2'), ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'create')
                            {!! Form::text('EMail2', '', ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'delete')
                            {!! Form::text('EMail2', old('EMail2'), ['class' => 'form-control', 'readonly']) !!}
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="SitoWeb">Sito Web</label>
                        @if ($formmethod == 'update')
                            {!! Form::text('SitoWeb', old('SitoWeb'), ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'create')
                            {!! Form::text('SitoWeb', '', ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'delete')
                            {!! Form::text('SitoWeb', old('SitoWeb'), ['class' => 'form-control', 'readonly']) !!}
                        @endif
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="CodicePagamento">Pagamento</label>
                        @if ($formmethod == 'update')
                            {!! Form::select('CodicePagamento', $arrPagamenti, null, ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'create')
                            {!! Form::select('CodicePagamento', $arrPagamenti, null, ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'delete')
                            {!! Form::select('CodicePagamento', $arrPagamenti, null, ['class' => 'form-control', 'readonly']) !!}
                        @endif
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="AliquotaIva">Aliquota Iva</label>
                        @if ($formmethod == 'update')
                            {!! Form::select('AliquotaIva', $arrAliquote, null, ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'create')
                            {!! Form::select('AliquotaIva', $arrAliquote, null, ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'delete')
                            {!! Form::select('AliquotaIva', $arrAliquote, null, ['class' => 'form-control', 'readonly']) !!}
                        @endif
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="Gruppo">Gruppo</label>
                        @if ($formmethod == 'update')
                            {!! Form::select('Gruppo', $arrGruppi, null, ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'create')
                            {!! Form::select('Gruppo', $arrGruppi, null, ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'delete')
                            {!! Form::select('Gruppo', $arrGruppi, null, ['class' => 'form-control', 'readonly']) !!}
                        @endif
                    </div>
                </div>
                <div class="col-lg-1">
                    <div class="form-group">
                        <label for="Sconto">Sconto</label>
                        @if ($formmethod == 'update')
                            {!! Form::number('Sconto', old('Sconto'), ['class' => 'form-control', 'step' => 'any']) !!}
                        @endif
                        @if ($formmethod == 'create')
                            {!! Form::number('Sconto', '', ['class' => 'form-control', 'step' => 'any']) !!}
                        @endif
                        @if ($formmethod == 'delete')
                            {!! Form::number('Sconto', old('Sconto'), ['class' => 'form-control', 'step' => 'any', 'readonly']) !!}
                        @endif
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="RitenutaAccontoAttiva">Ritenuta Acconto Attiva</label>
                        @if ($formmethod == 'update')
                            {!! Form::number('RitenutaAccontoAttiva', old('RitenutaAccontoAttiva'), ['class' => 'form-control', 'step' => 'any']) !!}
                        @endif
                        @if ($formmethod == 'create')
                            {!! Form::number('RitenutaAccontoAttiva', 0, ['class' => 'form-control', 'step' => 'any']) !!}
                        @endif
                        @if ($formmethod == 'delete')
                            {!! Form::number('RitenutaAccontoAttiva', old('RitenutaAccontoAttiva'), ['class' => 'form-control', 'step' => 'any', 'readonly']) !!}
                        @endif
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="form-group">
                        <label for="AbiCab">Abi-Cab</label>
                        <select class="form-control" id="AbiCab" name="AbiCab"></select>
                        {{--@if ($formmethod == 'update')--}}
                            {{--{!! Form::select('AbiCab', $arrGruppi, null, ['class' => 'form-control', 'id' => 'AbiCab']) !!}--}}
                        {{--@endif--}}
                        {{--@if ($formmethod == 'create')--}}
                            {{--{!! Form::select('AbiCab', $arrGruppi, null, ['class' => 'form-control', 'id' => 'AbiCab']) !!}--}}
                        {{--@endif--}}
                        {{--@if ($formmethod == 'delete')--}}
                            {{--{!! Form::select('AbiCab', $arrGruppi, null, ['class' => 'form-control', 'id' => 'AbiCab', 'readonly']) !!}--}}
                        {{--@endif--}}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="Iban">Iban</label>
                        @if ($formmethod == 'update')
                            {!! Form::text('Iban', old('Iban'), ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'create')
                            {!! Form::text('Iban', '', ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'delete')
                            {!! Form::text('Iban', old('Iban'), ['class' => 'form-control', 'readonly']) !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if($formmethod == 'update')
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Contatti</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <table id="contatti_table" class="table table-bordered table-striped" >
                    <thead>
                    <tr>
                        <th>
                            <button class="btn btn-default btn-sm" type="button" onclick="window.location.href = '{{url('contatti/create/?clifor='.$cliente->Codice)}}'">
                                <span class="glyphicon glyphicon-plus"></span>
                            </button>
                        </th>
                        <th>Referente</th>
                        <th>Posizione</th>
                        <th>Telefono</th>
                        <th>Fax</th>
                        <th>Cellulare</th>
                        <th>E-Mail</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contatti as $contatto)
                        <tr>
                            <td width="110px">
                                <button class="btn btn-default btn-sm" type="button" onclick="window.location.href = '{{ url('contatti/'.$contatto->ID.'/edit')}}'">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </button>
                                <button class="btn btn-default btn-sm" type="button" onclick="window.location.href = '{{ url('contatti/'.$contatto->ID) }}'">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </td>
                            <td width="150px">
                                {{$contatto->Referente}}
                            </td>
                            <td>
                                {{$contatto->Posizione}}
                            </td>
                            <td>
                                {{$contatto->Telefono}}
                            </td>
                            <td>
                                {{$contatto->Fax}}
                            </td>
                            <td>
                                {{$contatto->Cellulare}}
                            </td>
                            <td>
                                {{$contatto->EMail}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endif

@if($formmethod == 'update')
<div class="row">
    <div class="col-md-12">
        <div class="box box-solid box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Destinazioni Diverse</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <table id="destdiv_table" class="table table-bordered table-striped" >
                    <thead>
                    <tr>
                        <th>
                            <button class="btn btn-default btn-sm" type="button" onclick="window.location.href = '{{url('destdiv/create?clifor='.$cliente->Codice)}}'">
                                <span class="glyphicon glyphicon-plus"></span>
                            </button>
                        </th>
                        <th>Indirizzo</th>
                        <th>Cap</th>
                        <th>Località</th>
                        <th>Prov.</th>
                        <th>Telefono</th>
                        <th>Fax</th>
                        <th>E-Mail</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($destinazioni as $destinazione)
                        <tr>
                            <td width="110px">
                                <button class="btn btn-default btn-sm" type="button" onclick="window.location.href = '{{ url('destdiv/'.$destinazione->ID.'/edit')}}'">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </button>
                                <button class="btn btn-default btn-sm" type="button" onclick="window.location.href = '{{ url('destdiv/'.$destinazione->ID) }}'">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </td>
                            <td width="150px">
                                {{$destinazione->Indirizzo}}
                            </td>
                            <td>
                                {{$destinazione->Cap}}
                            </td>
                            <td>
                                {{$destinazione->Localita}}
                            </td>
                            <td>
                                {{$destinazione->Provincia}}
                            </td>
                            <td>
                                {{$destinazione->Telefono}}
                            </td>
                            <td>
                                {{$destinazione->Fax}}
                            </td>
                            <td>
                                {{$destinazione->EMail}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endif