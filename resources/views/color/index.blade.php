@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card border-dark mb-3">
        <div class="card-header">Colors</div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Colors</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('color.create') }}">Create New Color</a>
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
                    <th>CREATOR </th>
                    <th width="280px">ACTION  </th>
                </tr>
                @foreach ($colors as $color)
                    <tr>
                        <td>{{ $color->id }}</td>
                        <td>{{ $color->name }}</td>
                        <td>{{ $color->details }}</td>
                        <td>{{ $color->created_by }}</td>
                        <td>
                            <form action="{{ route('color.destroy',$color->id) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('color.edit',$color->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $colors->links() }}
        </div>
    </div>
</div>


@endsection