<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List workers</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>

@include('menu')

<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>List workers</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('workers.create') }}"> Create Worker</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>S.No</th>
            <th>Worker name</th>

            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($workers as $worker)
            <tr>
                <td>{{ $worker->id }}</td>
                <td>{{ $worker->name }}</td>

                <td>
                    <form action="{{ route('workers.destroy',$worker->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('workers.edit',$worker->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $workers->links() !!}
</div>
</body>
</html>
