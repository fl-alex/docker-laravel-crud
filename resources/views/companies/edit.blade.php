<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Company parameters</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

@include('menu')

<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Company parameters</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('companies.index') }}" enctype="multipart/form-data">
                    Back</a>
            </div>
        </div>
    </div>
    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('companies.update',$company->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Company Name:</strong>
                    <input type="text" name="name" value="{{ $company->name }}" class="form-control"
                           placeholder="Company name">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Company Email:</strong>
                    <input type="email" name="email" class="form-control" placeholder="Company Email"
                           value="{{ $company->email }}">
                    @error('email')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Company Address:</strong>
                    <input type="text" name="address" value="{{ $company->address }}" class="form-control"
                           placeholder="Company Address">
                    @error('address')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
    </form>
    <hr style="height: 10px;">
<div class="mt-4">
    <hr style="box-shadow: darkolivegreen 1px 1px 1px 1px">
    <div class="pull-left">
        <h2>List of existing employees:</h2>
    </div>
    <form action="{{ route('workers_from') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{$company->id}}" name="own_company">
        <button type="submit" class="btn btn-success ml-3">Create a new worker for the company</button>
    </form><br>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>S.No</th>
            <th>Worker Name</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($workers as $worker)
            <tr>
                <td>{{ $worker->id }}</td>
                <td>{{ $worker->name }}</td>

                <td>
                    <form action="{{ route('workers.destroy',$worker->id) }}" method="POST">
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
</div>
</body>

</html>
