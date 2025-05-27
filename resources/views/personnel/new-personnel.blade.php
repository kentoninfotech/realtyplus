@extends('layouts.template')

@section('content')
<!-- @php $pagename="namesearch"; $sn=1; @endphp -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">New Personnel</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item active">New Personnel</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="card">
        <div class="card-heading">
        </div>
        <div class="card-body">


            <form method="POST" action="{{ route('create.personnel') }}">
                @csrf
                @if (isset($personnel))
                    <input type="hidden" name="id" value="{{$personnel->id}}">
                    <input type="hidden" name="oldcv" value="{{$personnel->cv}}">
                    <input type="hidden" name="oldpicture" value="{{$personnel->picture}}">
                    <input type="hidden" name="oldpassword" value="{{$personnel->password}}">
                @else
                    @php $personnel = []; @endphp
                    <input type="hidden" name="id" value="0">
                    <input type="hidden" name="oldcv" value="">
                    <input type="hidden" name="oldpicture" value="">
                @endif

                <div class="row form-group">
                    <div class="col-lg-4">
                        <label class="control-label col-lg-12" for="content">Firstname:</label>
                        <input name="firstname" type="text" class="form-control" id="firstname" maxlength="50" placeholder="Firstname" value="{{$personnel ? $user->personnel->firstname : ''}}">
                    </div>
                    <div class="col-lg-4">
                        <label class="control-label col-lg-12" for="content">Surname: </label>
                        <input name="surname" type="text" class="form-control" placeholder="Surname" value="{{$personnel ? $user->personnel->surname : ''}}" maxlength="50">
                    </div>
                    <div class="col-lg-4">
                        <label class="control-label col-lg-12" for="content">Othernames: </label>
                        <input name="othername" type="text" class="form-control" placeholder="Othernames" value="{{$personnel ? $user->personnel->othernames : ''}}" maxlength="50">
                    </div>
                </div>

                    <div class="row form-group">
                        <div class="col-lg-4">
                        <label class="control-label col-lg-12" for="content">Date of Birth: </label>
                    <input name="dob" type="text" class="form-control" placeholder="Date of Birth" maxlength="50" value="{{$personnel ? $user->personnel->dob : ''}}" id="datepicker">
                    </div>
                    <div class="col-lg-4">
                        <label class="control-label col-lg-12" for="content">State of Origin:</label>
                        <input name="state_of_origin" list="state" class="form-control" id="state" maxlength="50" value="{{$personnel ? $user->personnel->state_of_origin : ''}}" placeholder="State of Origin">
                        <datalist id="state">
                            <option value="Abia">
                            <option value="Adamawa">
                            <option value="Akwa Ibom">
                            <option value="Anambra">
                            <option value="Bauchi">
                            <option value="Bayelsa">
                            <option value="Benue">
                            <option value="Borno">
                            <option value="Cross River">
                            <option value="Delta">
                            <option value="Ebonyi">
                            <option value="Edo">
                            <option value="Ekiti">
                            <option value="Enugu">
                            <option value="Federal Capital Territory">
                            <option value="Gombe">
                            <option value="Imo">
                            <option value="Jigawa">
                            <option value="Kaduna">
                            <option value="Kano">
                            <option value="Katsina">
                            <option value="Kebbi">
                            <option value="Kogi">
                            <option value="Kwara">
                            <option value="Lagos">
                            <option value="Nasarawa">
                            <option value="Niger">
                            <option value="Ogun">
                            <option value="Ondo">
                            <option value="Osun">
                            <option value="Oyo">
                            <option value="Plateau">
                            <option value="Rivers">
                            <option value="Sokoto">
                            <option value="Taraba">
                            <option value="Yobe">
                            <option value="Zamfara">
                        </datalist>
                    </div>
                    <div class="col-lg-4">
                        <label class="control-label col-lg-12" for="content">Marital Status: </label>
                        <select name="marital_status" class="form-control">
                            <option  value="{{$personnel ? $user->personnel->marital_status : 'Select'}}" selected>{{$personnel ? $user->personnel->maritalstatus : 'Select'}}</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Divorced">Divorced</option>
                        </select>
                    </div>
                    </div>

                    <div class="row center"><h4>Contact Information</h4></div>
                    <div class="row form-group">
                        <div class="col-lg-4">
                            <label class="control-label col-lg-12" for="content">Phone No: </label>
                            <input name="phone_number" type="text" class="form-control" placeholder="Phone Number" maxlength="50" value="{{$personnel ? $user->personnel->phone_number : ''}}">
                        </div>
                        <div class="col-lg-4">
                            <label class="control-label col-lg-12" for="content">E-mail:</label>
                            <input name="email" type="email" class="form-control" id="titLe" maxlength="100" placeholder="E-mail" value="{{$personnel ? $user->personnel->email : ''}}">
                        </div>
                        <div class="col-lg-4">
                            <label class="control-label col-lg-12" for="content">Address: </label>
                            <textarea col="3" row="" name="address" type="text" class="form-control" placeholder="Address" maxlength="100" value="{{$personnel ? $user->personnel->address : ''}}"></textarea>
                        </div>
                    </div>

                    <!-- <div class="row form-group">
                        <div class="col-lg-6">
                            <label class="control-label col-lg-12" for="content">Guarantor's Name / Phone Number <small>Seperate with Comma</small>: </label>
                            <input name="guarantor" type="text" class="form-control" placeholder="Guarantor Name" maxlength="50" value="{{--$personnel ? $personnel->guarantor : ''--}}">
                        </div>
                    </div> -->

                    
                    <div class="row form-group">
                        <div class="col-lg-6">
                            <div class="row center"><h4>Educational Information</h4><hr></div>
                            <label class="control-label col-lg-12" for="content">Highest Certificate / School Name / Year of Graduation: </label>
                            <input name="highest_certificate" list="certificate" class="form-control" placeholder="Highest Certificate" maxlength="50"  value="{{$personnel ? $personnel->highestcert : ''}}">
                            <datalist id="cert">
                                <option value="O'Level">
                                <option value="OND">
                                <option value="ND">
                                <option value="HND">
                                <option value="Bsc">
                                <option value="PHd">
                                <option value="Msc">
                                <option value="LLB">
                                <option value="B.Eng">
                                <option value="M.Eng">
                            </datalist>
                        </div>
                        <div class="col-lg-6">
                            <div class="row center"><h4>System Role</h4><hr></div>
                            <label class="control-label col-lg-12" for="content">Roles: <i class="fas fa-help"></i></label>
                            <select name="department" class="form-control">
                                @foreach ($roles as $role)
                                    <option value="$role->name">{{ $role->name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="row center"><h4>Official Information</h4><hr></div>
                    <div class="row form-group">
                        <div class="col-lg-3">
                            <label class="control-label col-lg-12" for="content">Date Employed: </label>
                            <input name="empdate" type="text" class="form-control date" placeholder="Date Employed" id="datepicker2" maxlength="50" value="{{$personnel ? $personnel->empdate : ''}}">
                        </div>
                        <div class="col-lg-3">
                            <label class="control-label col-lg-12" for="content">Department:</label>
                            <select name="department" class="form-control">
                                <option  value="{{$personnel ? $personnel->department : ''}}">{{$personnel ? $personnel->department : ''}}</option>
                                <option value="Admin">Admin</option>
                                <option value="Front-Desk">Front Desk</option>
                                <option value="Spare-Parts">Spare Parts / Store</option>
                                <option value="Workshop">Workshop</option>
                                <option value="Security">Security</option>
                                <option value="Body Work">Body Work</option>
                                <option value="Finance">Finance</option>
                            </select>

                        </div>
                        <div class="col-lg-3">
                            <label class="control-label col-lg-12" for="content">Unit/Designation: </label>
                            <select name="designation" class="form-control">
                                <option  value="{{$personnel ? $personnel->designation : ''}}">{{$personnel ? $personnel->designation : ''}}</option>
                                <option value="Service Advisors">Service Advisors</option>
                                <option value="Customer Service">Customer Service</option>
                                <option value="Procurement/Logistics">Procurement/Logistics</option>
                                <option value="Accountant">Accountant</option>
                                <option value="Cashier">Cashier</option>
                                <option value="Workshop Manager">Workshop Manager</option>
                                <option value="Part Supervisor">Part Supervisor</option>
                                <option value="Store Keeper">Store Keeper</option>
                                <option value="Marketer/OTC">Marketer/OTC</option>
                                <option value="Electrical">Electrical</option>
                                <option value="Mechanical">Mechanical</option>
                                <option value="Car Wash">Car Wash</option>
                                <option value="Cleaner">Cleaner</option>
                                <option value="Security">Security</option>
                                <option value="Others">Others</option>
                                <option value="Quality Control">Quality Control</option>
                                <option value="Tire Service">Tire Service</option>
                                <option value="Panel Beater">Panel Beater</option>
                            <option value="Painter">Painter</option>
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label class="control-label col-lg-12" for="content">Basic Salary: </label>
                            <input name="salary" type="number" class="form-control" placeholder="salary" value="{{$personnel ? $personnel->salary : ''}}" maxlength="30">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-lg-4">
                            <label class="control-label col-lg-12" for="content">Passport: </label>
                            <input name="picture" type="file" class="form-conrol" />
                        </div>
                        <div class="col-lg-4">
                            <label class="control-label col-lg-12" for="content">Upload CV: </label>
                            <input name="cv" type="file" class="form-conrol" />
                        </div>
                        <div class="col-lg-4">
                            <label class="control-label col-lg-12" for="content">Password: </label>
                            <input name="spassword" type="password" class="form-control" placeholder="Password" maxlength="50">
                        </div>
                    </div>

                    <div class="row form-group" style="margin-top:20px !important;">
                        <div class="col-lg-6">
                        <label class="control-label col-lg-12" for="content">. </label>
                    </div>
                    <div class="col-lg-6">
                        <label class="control-label col-lg-12" for="content">.</label>
                        <input name="save1" type="submit" value="Save Personnel Record" class="btn btn-primary" />
                    </div>
                    </div>

            </form>
        </div>
    </div>

@endsection
