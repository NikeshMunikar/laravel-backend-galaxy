@extends('admin.layout.master')
@section('content')

<style>
    .intakeParts{
        font-size:26px;
        font-weight:bold;
    }
    .textareaclass{
        height:100px;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header">
                <strong class="card-title">{{$page_name}}</strong>
                <a href="{{route('intake.index')}}" class="btn btn-info pull-right rounded">Back</a>
            </div>
            <div class="card-body">
                <!-- Category Create Table -->
                <div id="pay-invoice">
                    <div class="card-body">

                    <!-- for error message displaying -->
                    <!-- @if(count($errors) > 0)
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li> {{ $error }} </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif -->
                        <!-- for form -->
                        <form action="{{route('intake.store')}}" method="post">
                            @csrf

                            <span class="intakeParts">Part 1: Participant Details</span>
                            <div>
                                <label for="name">Name*</label>
                                <input type="text" class="form-control rounded @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name" value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="participant_address">Address*</label>
                                <input type="text" class="form-control rounded @error('participant_address') is-invalid @enderror" name="participant_address" id="participant_address" placeholder="Address" value="{{ old('participant_address') }}">
                                @error('participant_address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="participant_email">Email*</label>
                                <input type="email" class="form-control rounded @error('participant_email') is-invalid @enderror" name="participant_email" id="participant_email" placeholder="E.g. abc@gmail.com" value="{{ old('participant_email') }}">
                                @error('participant_email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="participant_contact_number">Contact Number*</label>
                                <input type="text" class="form-control rounded @error('participant_contact_number') is-invalid @enderror" name="participant_contact_number" id="participant_contact_number" placeholder="Contact No." value="{{ old('participant_contact_number') }}">
                                @error('participant_contact_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="participant_date_of_birth">Date of Birth*</label>
                                <input type="date" class="form-control rounded @error('participant_date_of_birth') is-invalid @enderror" name="participant_date_of_birth" id="participant_date_of_birth" placeholder="Address" value="{{ old('participant_date_of_birth') }}">
                                @error('participant_date_of_birth')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="participant_gender">Gender*</label>
                                <select class="form-control rounded @error('participant_gender') is-invalid @enderror" name="participant_gender" id="participant_gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                                @error('participant_gender')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="participant_support_hours">Support Hours*</label>
                                <input type="text" class="form-control rounded @error('participant_support_hours') is-invalid @enderror" name="participant_support_hours" id="participant_support_hours" placeholder="Support Hours" value="{{ old('participant_support_hours') }}">
                                @error('participant_support_hours')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="participant_desc_support">Support Description*</label>
                                <textarea class="form-control textareaclass rounded @error('participant_desc_support') is-invalid @enderror" name="participant_desc_support" id="participant_desc_support" placeholder="Support Description">{{ old('participant_desc_support') }}</textarea>
                                @error('participant_desc_support')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="participant_any_risk">Any Risk/ Alert/ Diagnosis*</label>
                                <input type="text" class="form-control rounded @error('participant_any_risk') is-invalid @enderror" name="participant_any_risk" id="participant_any_risk" placeholder="Any Risk/ Alert/ Diagnosis" value="{{ old('participant_any_risk') }}">
                                @error('participant_any_risk')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <span class="intakeParts">Part 2: Invoicing Particulars</span>
                            <div>
                                <label for="invoicing_particular_name">Name*</label>
                                <input type="text" class="form-control rounded @error('invoicing_particular_name') is-invalid @enderror" name="invoicing_particular_name" id="invoicing_particular_name" placeholder="Name" value="{{ old('invoicing_particular_name') }}">
                                @error('invoicing_particular_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="invoicing_particular_email">Email*</label>
                                <input type="email" class="form-control rounded @error('invoicing_particular_email') is-invalid @enderror" name="invoicing_particular_email" id="invoicing_particular_email" placeholder="E.g. xyz@gmail.com" value="{{ old('invoicing_particular_email') }}">
                                @error('invoicing_particular_email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="invoicing_particular_contact_number">Contact Number*</label>
                                <input type="text" class="form-control rounded @error('invoicing_particular_contact_number') is-invalid @enderror" name="invoicing_particular_contact_number" id="invoicing_particular_contact_number" placeholder="Contact No." value="{{ old('invoicing_particular_contact_number') }}">
                                @error('invoicing_particular_contact_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="invoicing_plan_funding">Plan Funding*</label>
                                <input type="text" class="form-control rounded @error('invoicing_plan_funding') is-invalid @enderror" name="invoicing_plan_funding" id="invoicing_plan_funding" placeholder="Plan Funding" value="{{ old('invoicing_plan_funding') }}">
                                @error('invoicing_plan_funding')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <span class="intakeParts">Part 3: Participant Support Needs</span>
                            <div>
                                <label for="participant_living_situatuion">Participant Living Situation*</label>
                                <textarea class="form-control textareaclass rounded @error('participant_living_situatuion') is-invalid @enderror" name="participant_living_situatuion" id="participant_living_situatuion" placeholder="Participant Living Situation">{{ old('participant_living_situatuion') }}</textarea>
                                @error('participant_living_situatuion')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="participant_current_behavioural_plan">Does the participant have a current behavioural support plan?</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="participant_current_behavioural_plan" id="participant_current_behavioural_plan" value="yes" @if(old('participant_current_behavioural_plan') == 'yes') checked @endif>
                                    <label class="form-check-label" for="yesRadio">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="participant_current_behavioural_plan" id="participant_current_behavioural_plan" value="no" @if(old('participant_current_behavioural_plan') == "no") checked @endif>
                                    <label class="form-check-label" for="noRadio">
                                        No
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="participant_mobility_need_assistance">Need Assistance for Mobility?</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="participant_mobility_need_assistance" id="yesRadio" value="yes" @if(old('participant_mobility_need_assistance') == 'yes') checked @endif>
                                    <label class="form-check-label" for="yesRadio">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="participant_mobility_need_assistance" id="noRadio" value="no" @if(old('participant_mobility_need_assistance') == 'no') checked @endif>
                                    <label class="form-check-label" for="noRadio">
                                        No
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="participant_mobility_independent">Independent Mobility?</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="participant_mobility_independent" id="yesRadio" value="yes" @if(old('participant_mobility_independent') == 'yes') checked @endif>
                                    <label class="form-check-label" for="yesRadio">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="participant_mobility_independent" id="noRadio" value="no" @if(old('participant_mobility_independent') == 'no') checked @endif>
                                    <label class="form-check-label" for="noRadio">
                                        No
                                    </label>
                                </div>
                            </div>

                            <div>
                                <label for="participant_mobility_desc">Participant Mobility Description*</label>
                                <textarea class="form-control textareaclass rounded @error('participant_mobility_desc') is-invalid @enderror" name="participant_mobility_desc" id="participant_mobility_desc" placeholder="Participant Mobility Description">{{ old('participant_mobility_desc') }}</textarea>
                                @error('participant_mobility_desc')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <span class="intakeParts">Part 4: Participant Communication Needs</span>
                            <div class="form-group">
                                <label for="participant_comm_need_assistance">Need Assistance for Communication?</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="participant_comm_need_assistance" id="yesRadio" value="yes" @if(old('participant_comm_need_assistance') == 'yes') checked @endif>
                                    <label class="form-check-label" for="yesRadio">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="participant_comm_need_assistance" id="noRadio" value="no" @if(old('participant_comm_need_assistance') == 'no') checked @endif>
                                    <label class="form-check-label" for="noRadio">
                                        No
                                    </label>
                                </div>
                            </div>

                            <div>
                                <label for="participant_comm_perfer">How do you prefer to communicate?*</label>
                                <select class="form-control rounded @error('participant_comm_perfer') is-invalid @enderror" name="participant_comm_perfer" id="participant_comm_perfer">
                                    <option value="verbally">Verbally</option>
                                    <option value="auslan">Auslan</option>
                                    <option value="nonVerbally">Non-Verbal/Vocalize</option>
                                    <option value="gesture">Point/Gesture</option>
                                    <option value="iPad">iPad</option>
                                    <option value="other">Other</option>
                                </select>
                                @error('participant_comm_perfer')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>  
                            
                            <div>
                                <label for="participant_comm_desc">Communication Description*</label>
                                <textarea class="form-control textareaclass rounded @error('participant_comm_desc') is-invalid @enderror" name="participant_comm_desc" id="participant_comm_desc" placeholder="Communication Description">{{ old('participant_comm_desc') }}</textarea>
                                @error('participant_comm_desc')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div class="form-group">
                                <label for="participant_personal_care_need_assistance">Need Assistance for Personal Care?</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="participant_personal_care_need_assistance" id="yesRadio" value="yes" @if(old('participant_personal_care_need_assistance') == 'yes') checked @endif>
                                    <label class="form-check-label" for="yesRadio">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="participant_personal_care_need_assistance" id="noRadio" value="no" @if(old('participant_personal_care_need_assistance') == 'no') checked @endif>
                                    <label class="form-check-label" for="noRadio">
                                        No
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="participant_transfer_need_assistance">Need Assistance to Transfer?</label>
                                <p>(does the person require assistance for getting up from the couch, bed or transporting?)</p>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="participant_transfer_need_assistance" id="yesRadio" value="yes" @if(old('participant_transfer_need_assistance') == 'yes') checked @endif>
                                    <label class="form-check-label" for="yesRadio">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="participant_transfer_need_assistance" id="noRadio" value="no" @if(old('participant_transfer_need_assistance') == 'no') checked @endif>
                                    <label class="form-check-label" for="noRadio">
                                        No
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="participant_eatinganddrinking_need_assistance">Need Assistance for eating and drinking?</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="participant_eatinganddrinking_need_assistance" id="yesRadio" value="yes" @if(old('participant_eatinganddrinking_need_assistance') == 'yes') checked @endif>
                                    <label class="form-check-label" for="yesRadio">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="participant_eatinganddrinking_need_assistance" id="noRadio" value="no" @if(old('participant_eatinganddrinking_need_assistance') == 'no') checked @endif>
                                    <label class="form-check-label" for="noRadio">
                                        No
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="participant_continence_need_assistance">Need Assistance for Continence?</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="participant_continence_need_assistance" id="yesRadio" value="yes" @if(old('participant_continence_need_assistance') == 'yes') checked @endif>
                                    <label class="form-check-label" for="yesRadio">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="participant_continence_need_assistance" id="noRadio" value="no" @if(old('participant_continence_need_assistance') == 'no') checked @endif>
                                    <label class="form-check-label" for="noRadio">
                                        No
                                    </label>
                                </div>
                            </div>

                            <div>
                                <label for="participant_continence_desc">Continence Description*</label>
                                <textarea class="form-control textareaclass rounded @error('participant_continence_desc') is-invalid @enderror" name="participant_continence_desc" id="participant_continence_desc" placeholder="Continence Description">{{ old('participant_continence_desc') }}</textarea>
                                @error('participant_continence_desc')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div class="form-group">
                                <label for="participant_cald_background_need_assistance">Need Assistance for CALD background?</label><br>
                                    <p>
                                        <li style="color:grey;">Aboriginal or Torres Strait Islander?</li>
                                        <li style="color:grey;">LGBTQIA+ Cultural considerations?</li>
                                    </p>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="participant_cald_background_need_assistance" id="yesRadio" value="yes" @if(old('participant_cald_background_need_assistance') == 'yes') checked @endif>
                                    <label class="form-check-label" for="yesRadio">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="participant_cald_background_need_assistance" id="noRadio" value="no" @if(old('participant_cald_background_need_assistance') == 'no') checked @endif>
                                    <label class="form-check-label" for="noRadio">
                                        No
                                    </label>
                                </div>
                            </div>

                            <div>
                                <label for="participant_work_preferences_desc">Work Preferences*</label>
                                <p>
                                    <li style="color:grey;">Gender</li>
                                    <li style="color:grey;">Skills and other attributes</li>
                                </p>
                                <textarea class="form-control textareaclass rounded @error('participant_work_preferences_desc') is-invalid @enderror" name="participant_work_preferences_desc" id="participant_work_preferences_desc" placeholder="Participant work preferences description">{{ old('participant_work_preferences_desc') }}</textarea>
                                @error('participant_work_preferences_desc')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <span class="intakeParts">Part 5: Referrer Information</span>
                            <div>
                                <label for="referrer_name">Name*</label>
                                <input type="text" class="form-control rounded @error('referrer_name') is-invalid @enderror" name="referrer_name" id="referrer_name" placeholder="Name" value="{{ old('referrer_name') }}">
                                @error('referrer_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="referrer_org">Organization*</label>
                                <input type="text" class="form-control rounded @error('referrer_org') is-invalid @enderror" name="referrer_org" id="referrer_org" placeholder="Organization" value="{{ old('referrer_org') }}">
                                @error('referrer_org')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="referrer_position">Position*</label>
                                <input type="text" class="form-control rounded @error('referrer_position') is-invalid @enderror" name="referrer_position" id="referrer_position" placeholder="Position" value="{{ old('referrer_position') }}">
                                @error('referrer_position')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="referrer_contact_number">Contact Number*</label>
                                <input type="text" class="form-control rounded @error('referrer_contact_number') is-invalid @enderror" name="referrer_contact_number" id="referrer_contact_number" placeholder="Contact No." value="{{ old('referrer_contact_number') }}">
                                @error('referrer_contact_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="referrer_email">Email*</label>
                                <input type="email" class="form-control rounded @error('referrer_email') is-invalid @enderror" name="referrer_email" id="referrer_email" placeholder="E.g. abcd@email.com" value="{{ old('referrer_email') }}">
                                @error('referrer_email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <div>
                                <label for="referrer_remark">Remark*</label>
                                <textarea class="form-control textareaclass rounded @error('referrer_remark') is-invalid @enderror" name="referrer_remark" id="referrer_remark" placeholder="Remark">{{ old('referrer_remark') }}</textarea>
                                @error('referrer_remark')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div><br>

                            <button type="submit" style="background-color:#339320!important;" class="btn btn-success rounded"><i class="fa fa-paper-plane" aria-hidden="true">Create</i></button>
                        </form>
                    </div>
                </div>

            </div>
        </div> <!-- .card -->
    </div>
</div>
<script src="{{ asset('admin/assets/js/vendor/jquery-2.1.4.min.js')}}"></script>
<script src="{{ asset('admin/assets/js/main.js')}}"></script>
@endsection