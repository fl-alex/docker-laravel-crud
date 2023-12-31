<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Worker</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>



<body>

@include('menu')



<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mb-2">
                <h2>Add Worker</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('workers.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif
    <form action="{{ route('workers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Workwe Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                    @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Worker Company:</strong>
                        <select name="company_id" id="company_id" class="form-control">
                            <option value="0">Select company name</option>
                            @foreach($company as $cmp)
                                    <option value="{{$cmp->id}}">{{$cmp->name}}</option>
                            @endforeach
                        </select>
                    @error('email')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
        </div>
    </form>
</div>
</body>

</html>
