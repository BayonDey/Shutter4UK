@if(count($loadTempData) > 0)

<table class="table">
    <tbody>
        <tr>
            <th>Temp Name and Date Uploaded</th>
            <th class="centre">Assign to Band</th>
            <th class="centre">Delete</th>
        </tr>

        @foreach($loadTempData as $tempData)

        <tr id="{{$tempData->id}}">
            <td width="60%">
                <div class="sent-name">{{$tempData->temp_name}}</div>
                <em class="sent-datetime">{{ date('d F, Y H:iA', strtotime($tempData->date_upload)) }}</em>
            </td>
            <td>
                <div class="assign-wrap-val">
                    <select name="{{$tempData->id}}" class="form-control select2 assign_temp_band"
                        id="tempBand__{{$tempData->id}}">
                        <option value="">Please Select...</option>
                        @foreach($bandList as $bandRow)
                        <option value="{{ $bandRow->id }}">{{ $bandRow->name }}</option>
                        @endforeach
                    </select>
                    <input type="button" class='btn btn-success btn-sm' value="Assign"
                        onclick="B4UK_assign_temp(<?= $tempData->id ?>);">
                </div>
            </td>
            <td class="text-center">
                <i class='fa fa-trash-alt delete_temp_btn text-danger'
                    onclick="B4UK_delete_temp(<?= $tempData->id ?>)"></i>
        </tr>
        @endforeach

    </tbody>
</table>
@else
<p>There are no unassigned prices in the holding area</p>
@endif