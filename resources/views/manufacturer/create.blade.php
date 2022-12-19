@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card border-dark mb-3">
        <div class="card-header">Add new manufacturer</div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Add new manufacturer</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('manufacturer.index') }}">Back</a>
                    </div>
                </div>
            </div>
            <hr>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form action="{{ route('manufacturer.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Details:</strong>
                            <textarea class="form-control" name="details" placeholder="Detail" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
</div>

@endsection