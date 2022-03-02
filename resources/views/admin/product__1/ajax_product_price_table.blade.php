<div class="card-body table-responsive p-0">
    <table id="example1" class="table table-head-fixed text-nowrap">
        <thead>
            <tr>
                <th>#</th>
                <th>Supplier</th>
                <th>Blind Type</th>
                <th>Band</th>
                <!-- <th>Width from</th>
                <th>Width to</th> -->
                <th>Width Range</th>
                <!-- <th>Drop from</th>
                <th>Drop to</th> -->
                <th>Drop Range</th>
                <th>Cost(£)</th>
                <!-- <th>Option</th> -->
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @if(count($priceList) > 0)
            @foreach($priceList as $i => $rowData)
            <tr>
                <td>{{ $i + 1 }}

                
            <input type="hidden" id="widthMin__{{ $rowData->price_id }}" value="{{ $rowData->width_min }}">
            <input type="hidden" id="widthMax__{{ $rowData->price_id }}" value="{{ $rowData->width_max }}">
            <input type="hidden" id="heightMin__{{ $rowData->price_id }}" value="{{ $rowData->height_min }}">
            <input type="hidden" id="heightMax__{{ $rowData->price_id }}" value="{{ $rowData->height_max }}">
            <input type="hidden" id="price__{{ $rowData->price_id }}" value="{{ $rowData->price }}">
                </td>
                <td>{{ $rowData->supplier_name }}</td>
                <td>{{ $rowData->p_type_name }}</td>
                <td title="{{$rowData->band_name}}">{{ substr($rowData->band_name,0 ,100) }}</td>
                <!-- <td>{{ $rowData->width_min }}</td>
                <td>{{ $rowData->width_max }}</td> -->
                <td>{{ $rowData->width_min." - ".$rowData->width_max }}</td>
                <!-- <td>{{ $rowData->height_min }}</td>
                <td>{{ $rowData->height_max }}</td> -->
                <td>{{ $rowData->height_min." - ".$rowData->height_max }}</td>
                <td>{{ $rowData->price }}</td>
                <!-- <td>{{ $rowData->option_id }}</td> -->
                <td> <i class="fa fa-edit edit_price_btn" id="edit__{{ $rowData->price_id }}"></i></td>
            </tr>
            @endforeach
            @endif

        </tbody>
    </table>
</div>