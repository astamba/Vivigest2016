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
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            @if($formmethod == 'update')
                {!! Form::checkbox('IsDim1', old('IsDim1')) !!}
            @endif
            @if($formmethod == 'create')
                {!! Form::checkbox('IsDim1', old('IsDim1'), true) !!}
            @endif
            @if($formmethod == 'delete')
                {!! Form::checkbox('IsDim1', old('IsDim1')) !!}
            @endif
            <label for="DescrizioneDim1">Descrizione Dimensione 1</label>
            @if($formmethod == 'update')
                {!! Form::text('DescrizioneDim1', old('DescrizioneDim1'), ['class' => 'form-control',]) !!}
            @endif
            @if($formmethod == 'create')
                {!! Form::text('DescrizioneDim1', '', ['class' => 'form-control',]) !!}
            @endif
            @if($formmethod == 'delete')
                {!! Form::text('DescrizioneDim1', old('DescrizioneDim1'), ['class' => 'form-control', 'readonly']) !!}
            @endif
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            @if($formmethod == 'update')
                {!! Form::checkbox('IsDim2', old('IsDim2')) !!}
            @endif
            @if($formmethod == 'create')
                {!! Form::checkbox('IsDim2', old('IsDim2'), true) !!}
            @endif
            @if($formmethod == 'delete')
                {!! Form::checkbox('IsDim2', old('IsDim2')) !!}
            @endif
            <label for="DescrizioneDim2">Descrizione Dimensione 2</label>
            @if($formmethod == 'update')
                {!! Form::text('DescrizioneDim2', old('DescrizioneDim2'), ['class' => 'form-control',]) !!}
            @endif
            @if($formmethod == 'create')
                {!! Form::text('DescrizioneDim2', '', ['class' => 'form-control',]) !!}
            @endif
            @if($formmethod == 'delete')
                {!! Form::text('DescrizioneDim2', old('DescrizioneDim2'), ['class' => 'form-control', 'readonly']) !!}
            @endif
        </div>
    </div>
    <div class="col-lg-4">
        <div class="form-group">
            @if($formmethod == 'update')
                {!! Form::checkbox('IsDim3', old('IsDim3')) !!}
            @endif
            @if($formmethod == 'create')
                {!! Form::checkbox('IsDim3', old('IsDim3'), true) !!}
            @endif
            @if($formmethod == 'delete')
                {!! Form::checkbox('IsDim3', old('IsDim3')) !!}
            @endif
            <label for="DescrizioneDim3">Descrizione Dimensione 3</label>
            @if($formmethod == 'update')
                {!! Form::text('DescrizioneDim3', old('DescrizioneDim3'), ['class' => 'form-control',]) !!}
            @endif
            @if($formmethod == 'create')
                {!! Form::text('DescrizioneDim3', '', ['class' => 'form-control',]) !!}
            @endif
            @if($formmethod == 'delete')
                {!! Form::text('DescrizioneDim3', old('DescrizioneDim3'), ['class' => 'form-control', 'readonly']) !!}
            @endif
        </div>
    </div>
</div>