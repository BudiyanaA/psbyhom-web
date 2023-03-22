@extends('layouts.costumerapp')
@section('content')

<!-- Page Content -->
<div class="container" id="content">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h3>Forgot Password</h3>
      </div>
      <div class="col-lg-12">
        <div class="form-checkout">
          <div class="form-register">
            <form class="form-group row" id='forgot_password_form' name='change_password_form' method="POST" action="{{ route('password.forgotaction') }}">
              @csrf
              <div class="col-sm-6">
                <div class="form-group">
                  <span class="text-right req">Your Registered Email<span class="reqsign">*</span></span>
                  <input class="form-control" name="email_forgot" id='forgot_email' type="text" size="40" maxlength="50" required="required" value=''>
                </div>
                <div class="form-group">
                  <br>
                  <input class="btn btn-default more" type="submit" id="forgot_password" name="forgot_password" value="Submit">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="blockfooter">
      <div class="wrapper"></div>
    </div>
  </div>
  <div class="blockseparator"></div>
</div>

@endsection
