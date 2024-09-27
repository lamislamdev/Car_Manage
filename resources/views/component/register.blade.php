<div class="login_register_wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3>Register</h3>
                        </div>
                        <div class="form-group mb-3">
                            <input id="name" type="text" required class="form-control" placeholder="Your Name">
                        </div>
                        <div class="form-group mb-3">
                            <input id="email" type="email" required class="form-control" placeholder="Your Email">
                        </div>
                        <div class="form-group mb-3">
                            <input id="password" type="password" required class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group mb-3">
                            <input id="phone" type="tel" required class="form-control" placeholder="Phone Number">
                        </div>
                        <div class="form-group mb-3">
                            <input id="address" type="text" required class="form-control" placeholder="Address">
                        </div>
                        <div class="form-group mb-3">
                            <button onclick="register()" type="button" class="btn btn-fill-out btn-block">Next</button>
                        </div>
                        <div class="form-note text-center">
                            I Have an Account! <a href="{{ route('login') }}">Login now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    async function register() {
        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        let number = document.getElementById('phone').value;
        let address = document.getElementById('address').value;

        if (name.length === 0) {
            alert("Name Required!");
            return; // Exit early if validation fails
        }
        if (email.length === 0) {
            alert("Email Required!");
            return;
        }
        if (password.length === 0) {
            alert("Password Required!");
            return;
        }
        if (number.length === 0) {
            alert("Phone Required!");
            return;
        }
        if (address.length === 0) {
            alert("Address Required!");
            return;
        }

        $("#preloader").delay(90).fadeIn(100).removeClass('loaded');

        try {
            let res = await axios.post("/UserRegister", {
                name: name,
                email: email,
                password: password,
                number: number, // Ensure this matches your backend field
                address: address
            });

            if (res.status === 201) {
                alert("Account Created Successfully");
                window.location.href = "/login";
            } else {
                $("#preloader").delay(90).fadeOut(100).addClass('loaded');
                alert("Something Went Wrong");
            }
        } catch (error) {
            $("#preloader").delay(90).fadeOut(100).addClass('loaded');
            alert("Error: " + (error.response?.data?.message || "Something Went Wrong"));
        }
    }
</script>
