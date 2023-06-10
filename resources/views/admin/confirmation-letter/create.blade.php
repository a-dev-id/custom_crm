@section('confirmation_letter_active', 'active')
@section('title', 'Create - Confirmation Letter')

@push('css')
@endpush

@push('js')
<script src="https://cdn.tiny.cloud/1/d8ys6zcfcgiv1bwe4den7z48yndrj1ruw5r57ujbg366mut6/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
            selector: '#campaign_benefit',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
</script>
<script>
    tinymce.init({
            selector: '#remarks',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
</script>
<script>
    tinymce.init({
            selector: '#check_in_out',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
</script>
<script>
    tinymce.init({
            selector: '#terms_conditions',
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
                <button class="btn btn-primary" form="createForm"><i class="fas fa-paper-plane"></i> Save & Preview</button>
            </div>
        </div>

        <form method="POST" action="{{ route('confirmation-letter.store') }}" enctype="multipart/form-data" class="row" id="createForm">
            @csrf
            <div class="col-8">
                <div class="card mb-4 shadow">
                    <!-- Card Header - Accordion -->
                    <a href="#collapseBookingDetail" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseBookingDetail">
                        <h6 class="font-weight-bold text-primary m-0">Booking details</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="show collapse" id="collapseBookingDetail">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="confirmation_number">Confirmation number</label>
                                    <input type="number" class="form-control" id="confirmation_number" name="confirmation_number" placeholder="Type something..." required>
                                    <input type="hidden" name="status" value="0">
                                </div>
                                <div class="form-group col-6">
                                    <label for="check_in">Check in</label>
                                    <input type="date" class="form-control" id="check_in" name="check_in_date" placeholder="Type something..." required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="check_out">Check out</label>
                                    <input type="date" class="form-control" id="check_out" name="check_out_date" placeholder="Type something..." required>
                                </div>
                                <div class="form-group col-12">
                                    <label for="room_type">Room type</label>
                                    <select name="villa_id" id="room_type" class="form-control" required>
                                        <option value="">Choose something...</option>
                                        @foreach ($villa_list as $list)
                                        <option value="{{$list->id}}">{{$list->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label for="adult">Adult</label>
                                    <input type="number" class="form-control" id="adult" name="adult" placeholder="Type something..." required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="child">Child</label>
                                    <input type="number" class="form-control" id="child" name="child" placeholder="Type something..." required>
                                </div>
                                <div class="form-group col-6">
                                    <label for="total_charge">Total charge</label>
                                    <input type="text" class="form-control" id="total_charge" name="total_charge" placeholder="Type something...">
                                </div>
                                <div class="form-group col-6">
                                    <label for="payment_status">Payment status</label>
                                    <input type="text" class="form-control" id="payment_status" name="payment_status" placeholder="Type something...">
                                </div>
                                <div class="form-group col-12">
                                    <label for="campaign_name">Campaign name</label>
                                    <input type="text" class="form-control" id="campaign_name" name="campaign_name" placeholder="Type something...">
                                </div>
                                <div class="form-group col-12">
                                    <label for="campaign_benefit">Campaign benefit</label>
                                    <textarea id="campaign_benefit" class="form-control" name="campaign_benefit" placeholder="Type something..."></textarea>
                                </div>
                                <div class="form-group col-12">
                                    <label for="remarks">Remarks</label>
                                    <textarea id="remarks" class="form-control" name="remarks" placeholder="Type something..."></textarea>
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
                        <h6 class="font-weight-bold text-primary m-0">Guest details</h6>
                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="show collapse" id="collapseGuestDetail">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="title">Title</label>
                                    <select name="title" id="title" class="form-control">
                                        <option value="">Choose something...</option>
                                        @foreach ($title_list as $title)
                                        <option value="{{$title->value}}">{{$title->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label for="full_name">Full name</label>
                                    <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Type something..." required>
                                </div>
                                <div class="form-group col-12">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Type something..." required>
                                </div>
                                <div class="form-group col-12">
                                    <label for="phone">Phone / Whatsapp number</label>
                                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Type something...">
                                </div>
                                <div class="form-group col-6">
                                    <label for="country">Country</label>
                                    <select id="country" name="country" class="form-control">
                                        <option value="">Choose something...</option>
                                        @foreach ($country_list as $country)
                                        <option value="{{$country->country_code}}">{{$country->country_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label for="birth_date">Birth Date</label>
                                    <input type="date" class="form-control" id="birth_date" name="birth_date" placeholder="Type something...">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="card mb-4 shadow">
                    <a href="#collapseCheckInOut" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCheckInOut">
                        <h6 class="font-weight-bold text-primary m-0">Check in / check out</h6>
                    </a>
                    <div class="show collapse" id="collapseCheckInOut">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-12">
                                    <textarea id="check_in_out" class="form-control" name="check_in_out" placeholder="Type something..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 shadow">
                    <a href="#collapseTermsConditions" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseTermsConditions">
                        <h6 class="font-weight-bold text-primary m-0">Terms & Conditions</h6>
                    </a>
                    <div class="show collapse" id="collapseTermsConditions">
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-12">
                                    <textarea id="terms_conditions" class="form-control" name="terms_conditions" placeholder="Type something..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </form>


    </div>
    <!-- /.container-fluid -->

</x-app-layout>