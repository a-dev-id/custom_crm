@section('villa_active', 'active')
@section('title', 'Villa')

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
                <a href="{{route('villa.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Create New</a>
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
                                        <th style="width: 150px">Image</th>
                                        <th style="width: 300px">Villa Name</th>
                                        <th>Description</th>
                                        <th style="width: 150px">Created at</th>
                                        <th style="width: 150px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($villas as $data)
                                    <tr>
                                        <th><img src="{{$data->image}}" class="w-100"></th>
                                        <th>{{$data->name}}</th>
                                        <th>{!! $data->description !!}</th>
                                        <th>{{date('d M Y', strtotime($data->created_at))}}</th>
                                        <th>
                                            <a href="#" class="btn btn-warning">edit</a>
                                            <a href="#" class="btn btn-danger">danger</a>
                                        </th>
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