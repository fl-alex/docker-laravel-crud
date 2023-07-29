<html>
<body>

@include('menu')

<p><a href="{{ route('Model1.create') }}">Create new Model1</a></p>



<div class="container mt-4">
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="card">
        <table style="border: 1px solid grey">
            <thead>
            <th>id</th>
            <th>name</th>
            <th>description</th>
            </thead>
        @foreach($data as $k=>$val)
            <tr>
                <td>{{$k}}</td>
                <td>{{$val['name']}}</td>
                <td>{{$val['description']}}</td>
            </tr>
        @endforeach
        </table>


    </div>
</div>



</body>
</html>
