<table class="table-auto w-full text-left mt-5" style="text-align: left">
    <thead>
        <tr>
            <th>Check <input type="checkbox" name="{{$page}}" id="{{$page}}"></th>
            @foreach ($table as $item)
                <th>{{$item}}</th>
            @endforeach
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        {{-- @dd($values) --}}
        
        @foreach ($values as $value)
        {{-- @dd($values) --}}
        <tr>
            <td><input type="checkbox" name="" id="{{$value->id}}"></td>
            @php
                $attributes = collect($value->getAttributes());
                $trimmedAttributes = $attributes->slice(0, -2);
            @endphp
            @foreach ($trimmedAttributes as $key => $attribute)
                <td>{{ $attribute }}</td>
            @endforeach
           
            <td><button class="p-[12px] rounded bg-red-400 mr-3"><i class="fa-solid fa-trash"></i></button>/<button class="p-[12px] rounded bg-blue-400 ml-3"><i class="fa-solid fa-pen-to-square"></i></button></td>
        </tr>
        @endforeach
    </tbody>
</table>
<script>
    $(document).ready(function () {
        $.ajax({
            url: window.localtion.href,
            method: 'GET',
            success: function (reponse) {
                console.log(reponse);
            }
        })
    })
</script>