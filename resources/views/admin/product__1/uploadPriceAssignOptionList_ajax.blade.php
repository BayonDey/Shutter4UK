<div class="table-responsive">
    <table class="table">
        <tbody>
            <tr>
                <th>CSV Price Option</th>
                <th>Group</th>
                <th>Group Option</th>
                <th>Delete</th>
            </tr>

            @if(count($priceOptionList) > 0)
            @foreach($priceOptionList as $priceOption)
            <!-- {{$priceOption}} -->
            <tr id="{{$priceOption->csv_hash}}">
                <td>
                    <div class="sent-name">{{$priceOption->csv_name}}</div>
                </td>
                <td>
                    <select class='form-control selectGrDropdown' id="selectGrDropdown_<?= $priceOption->band_id ?>"
                        name="<?= $priceOption->band_id ?>" size="1" class="inputshort">
                        <option value="">Please Select ...</option>
                        @if(count($grList) > 0)
                        @foreach($grList as $gr)
                        @if($gr->band_id == $priceOption->band_id)
                        <option value="{{$gr->group_id}}"
                            onclick="B4UK_load_optionselectbox(<?= $gr->group_id ?>,<?= $priceOption->band_id ?>);">
                            {{$gr->group_admin_name}}</option>
                        @endif
                        @endforeach
                        @endif
                    </select>
                </td>
                <td>
                    <div class='' id="selectOptionDiv_<?= $priceOption->band_id ?>">

                    </div>
                </td>
                <td class="text-center">
                    <i class='fa fa-trash-alt delete_temp_option_btn text-danger'
                        onclick=" B4UK_delete_option(<?=$priceOption->band_id ?>)"></i>
                </td>
            </tr>
            @endforeach

            @else
            <tr>
                <td colspan="4">
                    <p class="no-product"> No price option found</p>
                </td>
            </tr>
            @endif

        </tbody>
    </table>
</div>