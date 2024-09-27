<div class="login_register_wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3>Login</h3>
                        </div>
                            <div class="form-group mb-3">
                                <input id="email" type="text" required="" class="form-control" name="email" placeholder="Your Email">
                            </div>
                        <div class="form-group mb-3">
                            <input class="form-control" id="password" required="" type="password" name="password" placeholder="Password">
                        </div>
                            <div class="form-group mb-3">
                                <button onclick="Login()" type="submit" class="btn btn-fill-out btn-block" name="login">Next</button>
                            </div>
                        <div class="form-note text-center">Don't Have an Account? <a href="{{route('register')}}">Sign up now</a></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    async function Login() {
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;

        if (email.length === 0) {
            alert("Email Required!");
            return; 
        } else if (password.length === 0) {
            alert("Password Required!");
            return;
        }

        $("#preloader").delay(90).fadeIn(100).removeClass('loaded');

        try {
            let res = await axios.post("/UserLogin", { email: email, password: password });

            if (res.status === 200) {
                window.location.href = "/dashboard";
            } else {
                $("#preloader").delay(90).fadeOut(100).addClass('loaded');
                alert("Something Went Wrong");
            }
        } catch (error) {
            $("#preloader").delay(90).fadeOut(100).addClass('loaded');


            if (error.response) {
                alert("Error: " + (error.response.data.message || "Login Failed"));
            } else {
                alert("Error: " + "Network Error");
            }
        }
    }

</script>
