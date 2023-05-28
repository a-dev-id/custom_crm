@section('villa_active', 'active')
@section('title', 'Create - Villa')

@push('css')
@endpush

@push('js')
<script src="https://cdn.tiny.cloud/1/d8ys6zcfcgiv1bwe4den7z48yndrj1ruw5r57ujbg366mut6/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
            selector: '#description',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
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
                <button class="btn btn-success" form="createForm"><i class="fas fa-save mr-2"></i> Save</button>
            </div>
        </div>

        <form method="POST" action="{{ route('villa.store') }}" enctype="multipart/form-data" class="row" id="createForm">
            @csrf
            <div class="col-8">
                <div class="card mb-4 shadow">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseBookingDetail" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseBookingDetail">
                        <h6 class="font-weight-bold text-primary m-0">General</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="show collapse" id="collapseBookingDetail">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="name">Villa Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Type something..." required>
                                </div>
                                <div class="form-group col-12">
                                    <label for="description">Description</label>
                                    <textarea id="description" class="form-control" name="description" placeholder="Type something..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card mb-4 shadow">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseGuestDetail" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseGuestDetail">
                        <h6 class="font-weight-bold text-primary m-0">Detail</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="show collapse" id="collapseGuestDetail">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                </div>
                                <div class="form-group col-6">
                                    <label for="size">Villa Size</label>
                                    <input type="text" class="form-control" id="size" name="size" placeholder="Type something..." required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="advantages">Advantage</label>
                                    <input type="text" class="form-control" id="advantages" name="advantages" placeholder="Type something..." required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="view">View</label>
                                    <input type="text" class="form-control" id="view" name="view" placeholder="Type something..." required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>


    </div>
    <!-- /.container-fluid -->

</x-app-layout>