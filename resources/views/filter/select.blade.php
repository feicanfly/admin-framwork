<div class="input-group input-group-sm">
    <div class="input-group-prepend">
        <span class="input-group-text bg-white text-capitalize"><b>{!! $label !!}</b></span>
    </div>

    <select onchange="submitformchange()" class="form-control {{ $class }}" name="{{$name}}" data-value="{{ $value }}" style="width: 100%;">
        <option value=""></option>
        @foreach($options as $select => $option)
            <option value="{{$select}}" {{ Dcat\Admin\Support\Helper::equal($select, $value) ?'selected':'' }}>{{$option}}</option>
        @endforeach
    </select>
</div>


<script>
    console.log('4444')
</script>


@include('admin::scripts.select')

<script require="@select2?lang={{ config('app.locale') === 'en' ? '' : str_replace('_', '-', config('app.locale')) }}">
    var configs = {!! admin_javascript_json($configs) !!};
    console.log('2222')
    @yield('admin.select-ajax')

    @if(isset($remote))
    $.ajax({!! admin_javascript_json($remote['ajaxOptions']) !!}).done(function(data) {
        $("{{ $selector }}").select2($.extend({!! admin_javascript_json($configs) !!}, {
            data: data,
        })).val({!! json_encode($remote['values']) !!}).trigger("change");
    });
    @else
    $("{!! $selector !!}").select2(configs);
    @endif

    console.log('3333')
</script>

<script>
    console.log('1111')
    if(typeof submitformchange !== "function"){
        console.log('8888')
        function submitformchange() {
            console.log('9999')
            $(".grid-filter-form").submit();
        }
    }
    
</script>
