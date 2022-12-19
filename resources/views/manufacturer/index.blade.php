@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card border-dark mb-3">
        <div class="card-header">Manufacturer</div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Manufacturer</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('manufacturer.create') }}">Create New Manufacturer</a>
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
                @foreach ($manufacturers as $manufacturer)
                    <tr>
                        <td>{{ $manufacturer->id }}</td>
                        <td>{{ $manufacturer->name }}</td>
                        <td>{{ $manufacturer->details }}</td>
                        <td>{{ $manufacturer->created_by }}</td>
                        <td>
                            <form action="{{ route('manufacturer.destroy',$manufacturer->id) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('manufacturer.edit',$manufacturer->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
            {{ $manufacturers->links() }}
        </div>
    </div>
</div>


@endsection