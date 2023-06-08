@section('confirmation_letter_active', 'active')
@section('title', 'Confirmation Letter')

@push('css')
<link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@push('js')
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
            $('#example').DataTable();
        });
</script>
@endpush
<x-app-layout>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-6">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>
            </div>
            <div class="col-6 text-right">
                <a href="{{route('confirmation-letter.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Create New</a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mb-4 shadow">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="font-weight-bold text-primary m-0">List items</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="show collapse" id="collapseCardExample">
                        <div class="card-body">
                            <table id="example" class="table-striped table-bordered table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Confirmation No.</th>
                                        <th>Full name</th>
                                        <th>Email</th>
                                        <th>Arrival</th>
                                        <th>Departure</th>
                                        <th>Total Guest</th>
                                        <th>Villa Name</th>
                                        <th>Created at</th>
                                        <th>Status</th>
                                        <th style="width:160px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($confirmation_letters as $data)
                                    <tr>
                                        <td>{{$data->confirmation_number}}</td>
                                        <td>{{$data->full_name}}</td>
                                        <td>{{$data->email}}</td>
                                        <td>{{date('d M Y', strtotime($data->check_in_date))}}</td>
                                        <td>{{date('d M Y', strtotime($data->check_out_date))}}</td>
                                        @php
                                        $total_guest = $data->adult + $data->child
                                        @endphp
                                        <td>{{$total_guest}}</td>
                                        <td>{{$data->villa->name}}</td>
                                        <td>{{date('d M Y', strtotime($data->create_at))}}</td>
                                        <td>
                                            @if ($data->status == '0')
                                            <span class="badge badge-secondary">Draft</span></h1>
                                            @else
                                            <span class="badge badge-success">Send</span></h1>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('confirmation-letter.edit',[$data->id])}}" class="btn btn-warning"> Edit</a>
                                            <button type="button" class="btn btn-danger"> Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->

</x-app-layout>