@extends('layouts.app')

@section('content')

<div class="container">
    <div class="card border-dark mb-3">
        <div class="card-header">Edit Car</div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Edit Car</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('cars.index') }}">Back</a>
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
        
            <form action="{{ route('cars.update',$car->id) }}" method="POST">
                @csrf
                @method('PUT')
                 
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" value="{{ $car->name }}" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Details:</strong>
                            <textarea class="form-control" name="details" placeholder="Detail" cols="30" rows="5">{{ $car->details }}</textarea>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Manufacturer:</strong>
                            <select name="manufacturer" id="manufacturer" class="form-control" >
                                <option value="">-</option>
                                @foreach ($manufacturers as $manufacturer)
                                    <option value="{{ $manufacturer->id }}" @if($car->manufacturer == $manufacturer->id) selected @endif>{{ $manufacturer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Color:</strong>
                            <select name="color" id="color" class="form-control">
                                <option value="" selected>-</option>
                                @foreach ($colors as $color)
                                    <option value="{{ $color->id }}" @if($car->color == $color->id) selected @endif>{{ $color->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Car Type:</strong>
                            <select name="type" id="type" class="form-control">
                                <option value="" selected>-</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" @if($car->type == $type->id) selected @endif>{{ $type->name }}</option>
                                @endforeach
                            </select>
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