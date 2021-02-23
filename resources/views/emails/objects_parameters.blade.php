<!DOCTYPE html>
<html>
<body>
<h1>Hi, {{$user->name}}! See your objects and modules with their parameters.</h1>

@foreach($dataForEmail as $data)
    <h2>{{$data['object_name']}}</h2>
    <table style="width:100%" border="1">
        <tr>
            <th>Module name</th>
            <th>Module value</th>
        </tr>
        @foreach($data as $key=>$value)
            @if(is_numeric($key))
                <tr>
                    <td>{{$value['module_name']}}</td>
                    <td>{{$value['module_value']}}</td>
                </tr>
            @endif
        @endforeach
    </table>
@endforeach

<br>
<a href="http://smart-house-manager">Visit smart-house-manager site</a>
</body>
</html>
