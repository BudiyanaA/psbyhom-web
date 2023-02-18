
{{ Form::open(['url' => route('register_c.store'), 'class' => 'form-group row','id' => 'myForm', 'onsubmit' => 'return validateForm()' ]) }}
	@include('register_c._form')
	<div class="col-sm-6">	    
		<div class="form-group">
			<button class="btn btn-default more">Register</button>
			<p>*required field</p>
		</div>
	</div>
	</div>
{{ Form::close() }}


<script>
function validateForm() {
    var email = document.forms["myForm"]["email"].value;
    var name = document.forms["myForm"]["name"].value;
    var password = document.forms["myForm"]["password"].value;
    var handphone = document.forms["myForm"]["handphone"].value;
    var address = document.forms["myForm"]["address"].value;
    var province = document.forms["myForm"]["province"].value;
    var city = document.forms["myForm"]["city"].value;
    var district = document.forms["myForm"]["district"].value;
    
    if (email == "") {
        alert("Email tidak valid!");
        return false;
    }
    

    if (name == "") {
        alert("Nama lengkap harus diisi!");
        return false;
    }

    if (password == "") {
        alert("Password harus diisi!");
        return false;
    }
	if (password !== confirmPassword) {
    alert("Konfirmasi password tidak sesuai!");
    return false;
  }

    if (handphone == "") {
        alert("Nomor handphone harus diisi!");
        return false;
    }

    if (address == "") {
        alert("Alamat harus diisi!");
        return false;
    }

    if (province == "") {
        alert("Provinsi harus diisi!");
        return false;
    }

    if (city == "") {
        alert("Kota harus diisi!");
        return false;
    }

    if (district == "") {
        alert("Kecamatan harus diisi!");
        return false;
    }
}
</script>