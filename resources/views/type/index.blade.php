@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card border-dark mb-3">
        <div class="card-header">Car Types</div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Car Types</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('type.create') }}">Create New Car Type</a>
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
                @foreach ($types as $type)
                    <tr>
                        <td>{{ $type->id }}</td>
                        <td>{{ $type->name }}</td>
                        <td>{{ $type->details }}</td>
                        <td>{{ $type->created_by }}</td>
                        <td>
                            <form action="{{ route('type.destroy',$type->id) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('type.edit',$type->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $types->links() }}
        </div>
    </div>
</div>


@endsection