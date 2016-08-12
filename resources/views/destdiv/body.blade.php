{!! Form::hidden('CodiceCliFor', $codcli) !!}

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
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
                <div class="col-lg-2">
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
                <div class="col-lg-9">
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
                <div class="col-lg-3">
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
                <div class="col-lg-3">
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
                <div class="col-lg-5">
                    <div class="form-group">
                        <label for="EMail">E-Mail</label>
                        @if ($formmethod == 'update')
                            {!! Form::text('EMail', old('EMail'), ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'create')
                            {!! Form::text('EMail', '', ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'delete')
                            {!! Form::text('EMail', old('EMail'), ['class' => 'form-control', 'readonly']) !!}
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>