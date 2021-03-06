<div class="box-body">
    <div class="col-lg-2">
        <div class="form-group">
            <label for="Codice">Codice</label>
            @if($formmethod == 'update')
                {!! Form::text('Codice', old('Codice'), ['class' => 'form-control', 'readonly']) !!}
            @endif
            @if($formmethod == 'create')
                {!! Form::text('Codice', '', ['class' => 'form-control',]) !!}
            @endif
            @if($formmethod == 'delete')
                {!! Form::text('Codice', old('Codice'), ['class' => 'form-control', 'readonly']) !!}
            @endif
            @if($errors->banche->first('Codice') )
                <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    {{ $errors->banche->first('Codice') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-lg-10">
        <div class="form-group">
            <label for="Descrizione">Descrizione</label>
            @if($formmethod == 'update')
                {!! Form::text('Descrizione', old('Descrizione'), ['class' => 'form-control',]) !!}
            @endif
            @if($formmethod == 'create')
                {!! Form::text('Descrizione', '', ['class' => 'form-control',]) !!}
            @endif
            @if($formmethod == 'delete')
                {!! Form::text('Descrizione', old('Descrizione'), ['class' => 'form-control', 'readonly']) !!}
            @endif
            @if($errors->banche->first('Descrizione') )
                <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    {{ $errors->banche->first('Descrizione') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label for="Iban">Iban</label>
            @if($formmethod == 'update')
                {!! Form::text('Iban', old('Iban'), ['class' => 'form-control',]) !!}
            @endif
            @if($formmethod == 'create')
                {!! Form::text('Iban', '', ['class' => 'form-control',]) !!}
            @endif
            @if($formmethod == 'delete')
                {!! Form::text('Iban', old('Iban'), ['class' => 'form-control', 'readonly']) !!}
            @endif
            @if($errors->banche->first('Iban') )
                <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    {{ $errors->banche->first('Iban') }}
                </div>
            @endif

        </div>
    </div>
</div>