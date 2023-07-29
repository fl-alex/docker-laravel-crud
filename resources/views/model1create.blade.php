<html>
<body>

@include('menu')


<div class="container mt-4">
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header text-center font-weight-bold">
            <h1>Add record to {{$controllername}}</h1>
        </div>
        <div class="card-body">

            <form action="{{ route('Model1.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" id="name" name="name" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea name="description" class="form-control" required=""></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>








        </div>
    </div>
</div>



</body>
</html>
