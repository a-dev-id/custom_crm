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
<script>
    setTimeout(() => {
            const box = document.getElementById('alert');
            box.style.display = 'none';
        }, 3000);
</script>
@endpush
<x-app-layout>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            @if (session('message'))
            <div class="col-12">
                <div class="alert alert-success alert-dismissible" id="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="far fa-times-circle text-white"></i></button>
                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                    {{ session('message') }}
                </div>
            </div>
            @endif
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
                                        <th style="width: 80px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($villas as $data)
                                    <tr>
                                        <th><img src="{{asset($data->image)}}" class="w-100"></th>
                                        <th>{{$data->name}}</th>
                                        <th>{!! $data->description !!}</th>
                                        <th>{{date('d M Y', strtotime($data->created_at))}}</th>
                                        <th>
                                            <a href="{{route('villa.edit', [$data->id])}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>

                                            <button class="btn btn-danger" data-toggle="modal" data-target="#modal_delete_{{ $data->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                            <div class="modal fade" id="modal_delete_{{ $data->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger">
                                                            <h4 class="modal-title text-white"><i class="fas fa-exclamation-triangle text-white"></i> Warning!</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body text-left">
                                                            Are you sure want to delete this <strong>"{{ $data->name }}"</strong> ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-ban"></i> Cancel</button>
                                                            <form method="POST" action="{{ route('villa.destroy', [$data->id]) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
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