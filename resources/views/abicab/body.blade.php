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
            @if($errors->abicab->first('Codice') )
                <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    {{ $errors->abicab->first('Codice') }}
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
            @if($errors->abicab->first('Descrizione') )
                <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    {{ $errors->abicab->first('Descrizione') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-lg-12">
        <div class="form-group">
            <label for="Indirizzo">Indirizzo</label>
            @if($formmethod == 'update')
                {!! Form::text('Indirizzo', old('Indirizzo'), ['class' => 'form-control',]) !!}
            @endif
            @if($formmethod == 'create')
                {!! Form::text('Indirizzo', '', ['class' => 'form-control',]) !!}
            @endif
            @if($formmethod == 'delete')
                {!! Form::text('Indirizzo', old('Indirizzo'), ['class' => 'form-control', 'readonly']) !!}
            @endif
            @if($errors->abicab->first('Indirizzo') )
                <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    {{ $errors->abicab->first('Indirizzo') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label for="Cap">Cap</label>
            @if($formmethod == 'update')
                {!! Form::text('Cap', old('Cap'), ['class' => 'form-control',]) !!}
            @endif
            @if($formmethod == 'create')
                {!! Form::text('Cap', '', ['class' => 'form-control',]) !!}
            @endif
            @if($formmethod == 'delete')
                {!! Form::text('Cap', old('Cap'), ['class' => 'form-control', 'readonly']) !!}
            @endif
            @if($errors->abicab->first('Cap') )
                <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    {{ $errors->Cap->first('Cap') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-lg-8">
        <div class="form-group">
            <label for="Localita">Località</label>
            @if($formmethod == 'update')
                {!! Form::text('Localita', old('Localita'), ['class' => 'form-control',]) !!}
            @endif
            @if($formmethod == 'create')
                {!! Form::text('Localita', '', ['class' => 'form-control',]) !!}
            @endif
            @if($formmethod == 'delete')
                {!! Form::text('Localita', old('Localita'), ['class' => 'form-control', 'readonly']) !!}
            @endif
            @if($errors->abicab->first('Localita') )
                <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    {{ $errors->abicab->first('Localita') }}
                </div>
            @endif
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
            <label for="Provincia">Provincia</label>
            @if($formmethod == 'update')
                {!! Form::text('Provincia', old('Provincia'), ['class' => 'form-control',]) !!}
            @endif
            @if($formmethod == 'create')
                {!! Form::text('Provincia', '', ['class' => 'form-control',]) !!}
            @endif
            @if($formmethod == 'delete')
                {!! Form::text('Provincia', old('Provincia'), ['class' => 'form-control', 'readonly']) !!}
            @endif
            @if($errors->abicab->first('Provincia') )
                <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    {{ $errors->abicab->first('Provincia') }}
                </div>
            @endif
        </div>
    </div>
</div>