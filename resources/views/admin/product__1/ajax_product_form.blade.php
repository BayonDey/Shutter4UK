@if(isset($templateFields) && (count($templateFields) > 0))
<div class="row">
    @foreach($templateFields as $row)
    @if(isset($row->fieldName->field_name))
    <?php
    // dd($pTempVal);
    ?>
    <div class="col-md-4">
        <div class="form-group">
            <span class="label-title">{{ @$row->fieldName->field_name }}</span>
            <input class="form-control" name="template_field[{{@$row->fieldName->id}}]" value="{{(isset($pTempVal[$row->fieldName->id])) ? $pTempVal[$row->fieldName->id] : ''}}"/>
        </div>
    </div>
    @endif

    @endforeach
</div>
@endif

@if(isset($templateFieldsVal) && (count($templateFieldsVal) > 0))
<div class="row select-drop-data">
    @foreach($templateFieldsVal as $row)
    @if(isset($row->fieldName->field_name))

    <div class="col-md-4">
        <div class="form-group">
            <span class="label-title">{{@$row->fieldName->field_name}}</span>
            <input class="form-control" name="assign_template_field[{{@$row->fieldName->id}}]" value="{{$row->value}}" />
        </div>
    </div>
    @endif

    @endforeach
</div>
@endif