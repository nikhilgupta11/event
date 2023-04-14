@extends('SuperAdmin/Layouts/Layout/HomeLayout')
@section('SuperAdminContent')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header">
            <h5>FAQ's</h5>
            <a href="{{ route('EditSmtp' , $data->id) }}" class="btn rounded-pill btn-primary">Edit</a>
        </div>
        @if (Session::has('success'))
        <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @elseif(Session::has('error'))
        <div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">
            {{ Session::get('error') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        
                        <th>Host</th>
                        <th>Port</th>
                        <th>User Name</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($data as $index=>$item)
                    <tr>
                        <td>{{ $item->question }}</td>
                        <td>
                            {!! Str::length($item->answer) > 20 ? substr($item->answer, 0,15) . '...' : $item->answer !!}
                        </td>
                        <td>
                            @if($item->status ==1)
                            <span class="badge bg-label-primary me-1">ACTIVE</span>
                        </td>
                        @else
                        <span class="badge bg-label-warning me-1">INACTIVE</span></td>
                        @endif
                        <td>
                            
                                    <a  href="{{ route('ShowFaq', [ 'id' => $item->id ]) }}"><i class="bx bx-show-alt me-1"></i> </a>
                                    <a  href="{{ route('EditFaq', [ 'id' => $item->id ]) }}"><i class="bx bx-edit-alt me-1"></i> </a>
                                    <a  href="{{ route('DeleteFaq', [ 'id' => $item->id ]) }}" onclick="return confirm('Are you sure you want to delete this item?')"><i class="bx bx-trash me-1"></i> </a>
                             
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection('SuperAdminContent')