{!! Form::hidden('CodiceCliFor', $codcli) !!}

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="Referente">Referente</label>
                        @if ($formmethod == 'update')
                            {!! Form::text('Referente', old('Referente'), ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'create')
                            {!! Form::text('Referente', '', ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'delete')
                            {!! Form::text('Referente', old('Referente'), ['class' => 'form-control', 'readonly']) !!}
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Posizione">Posizione</label>
                        @if ($formmethod == 'update')
                            {!! Form::text('Posizione', old('Posizione'), ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'create')
                            {!! Form::text('Posizione', '', ['class' => 'form-control']) !!}
                        @endif
                        @if ($formmethod == 'delete')
                            {!! Form::text('Posizione', old('Posizione'), ['class' => 'form-control', 'readonly']) !!}
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
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
            </div>
        </div>
    </div>
</div>