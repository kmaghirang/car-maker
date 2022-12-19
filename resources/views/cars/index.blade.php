@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card border-dark mb-3">
        <div class="card-header">Cars</div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Cars</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('cars.create') }}">Create New Car</a>
                    </div>
                </div>
            </div>
        
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
        
            <table class="table table-stripped">
                <tr>
                    <th>ID      </th>
                    <th>NAME    </th>
                    <th>DETAILS </th>
                    <th>COLOR </th>
                    <th>MANUFACTURER </th>
                    <th>CAR TYPE </th>
                    <th>CREATOR </th>
                    <th width="150px">ACTION  </th>
                </tr>
                @foreach ($cars as $car)
                    <tr>
                        <td>{{ $car->id }}</td>
                        <td>{{ $car->name }}</td>
                        <td>{{ $car->details }}</td>
                        <td>{{ $car->color }}</td>
                        <td>{{ $car->manufacturer }}</td>
                        <td>{{ $car->cartype }}</td>
                        <td>{{ $car->created_by }}</td>
                        <td>
                            <form action="{{ route('cars.destroy',$car->id) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('cars.edit',$car->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{-- {{ $manufacturers->links() }} --}}
        </div>
    </div>
</div>


@endsection