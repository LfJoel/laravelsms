
@section
<!-- Begin page -->
<div class="p-3">
    <h4 class="font-18 m-b-5 text-center">Register</h4>
    <p class="text-muted text-center"></p>

    <form class="form-horizontal m-t-30" action="#" id="registerFormId">
        @csrf
        <div class="form-group">
            <label for="name">Username</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter username">
            <div class="text-danger" id="nameError"></div>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
            <div class="text-danger" id="emailError"></div>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
            <div class="text-danger" id="passwordError"></div>
        </div>

        <div class="form-group row m-t-20">
            <div class="col-12 text-right">
                <button class="btn btn-primary w-md waves-effect waves-light" type="button" onclick="onSubmit()">Register</button>
            </div>
        </div>

    </form>
</div>

@endsection('prelogin-content')

@section('prelogin-footer-question-redirect-link')
<p class="text-white">Already have an account ? <a href="{{ url('login') }}" class="font-500 font-14 text-white font-secondary"> Login </a> </p>

<script>
    function onSubmit() {
        data = $('#registerFormId').serialize();
        $.ajax({
            url: "/register",
            type: 'POST',
            data: data,
            success: function(result) {
                resetErrors();
                console.log("Data: " + JSON.stringify(result));
                if (result.status == 1) {
                    route_name = result.route_name;
                    window.location.href = `{{ url('` + route_name + `')}}`;
                } else {
                    showStatusMessage("danger", result.message);
                }
            },
            error: function(xhr) {
                resetErrors();
                $.each(xhr.responseJSON.errors, function(key, value) {
                    $('#' + key + "Error").text(value);
                    $('#' + key).addClass("errorInput");
                });
            },
        });
    }

    function resetErrors() {
        inputFieldsArr = ["name","email", "password"];
        $.each(inputFieldsArr, function(key, value) {
            $('#' + value + "Error").text("");
            $('#' + value).removeClass("errorInput");
        });
    }
</script>
@endsection