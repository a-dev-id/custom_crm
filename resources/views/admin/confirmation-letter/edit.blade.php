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

        <form method="POST" action="{{ route('confirmation-letter.update',[$data->id]) }}" enctype="multipart/form-data" class="row" id="createForm">
            @method('PUT')
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
                                    <input type="number" class="form-control" id="confirmation_number" name="confirmation_number" placeholder="Type something..." required value="{{$detail->confirmation_letter}}">
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
                                        <option value="1">Prince</option>
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
                                        <option value="Ms">Ms</option>
                                        <option value="Miss">Miss</option>
                                        <option value="Mrs">Mrs</option>
                                        <option value="Mr">Mr</option>
                                        <option value="Master">Master</option>
                                        <option value="Fr">Father (Fr)</option>
                                        <option value="Rev">Reverend (Rev)</option>
                                        <option value="Dr">Doctor (Dr)</option>
                                        <option value="Atty">Attorney (Atty)</option>
                                        <option value="Hon">Honorable (Hon)</option>
                                        <option value="Prof">Professor (Prof)</option>
                                        <option value="Pres">President (Pres)</option>
                                        <option value="VP">Vice President (VP)</option>
                                        <option value="CO">Chief Officer (CO)</option>
                                        <option value="CTO">Cheif Technical Officer (CTO)</option>
                                        <option value="CEO">Cheif Executive Officer (CEO)</option>
                                        <option value="COO">Cheif operating Officer (COO)</option>
                                        <option value="Gov">Governor (Gov)</option>
                                        <option value="Ofc">Officer (Ofc)</option>
                                        <option value="Capt">Captain</option>
                                        <option value="Chief">Chief</option>
                                        <option value="Cmdr">Commander</option>
                                        <option value="Col">Colonel</option>
                                        <option value="Gen">General</option>
                                        <option value="Gov">Governor</option>
                                        <option value="Maj">Major</option>
                                        <option value="MSgt">Major/Master Sergeant</option>
                                        <option value="Prince">Prince</option>
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
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Åland Islands">Åland Islands</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antarctica">Antarctica</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Bouvet Island">Bouvet Island</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote D'ivoire">Cote D'ivoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Territories">French Southern Territories</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guernsey">Guernsey</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-bissau">Guinea-bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Isle of Man">Isle of Man</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jersey">Jersey</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                        <option value="Korea, Republic of">Korea, Republic of</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macao">Macao</option>
                                        <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montenegro">Montenegro</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Pitcairn">Pitcairn</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russian Federation">Russian Federation</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Helena">Saint Helena</option>
                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                        <option value="Saint Lucia">Saint Lucia</option>
                                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                        <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Timor-leste">Timor-leste</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Viet Nam">Viet Nam</option>
                                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
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