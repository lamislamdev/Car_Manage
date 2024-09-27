<div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
    <div class="card">
        <div class="card-header">
            <h3><span id="role" class="text-capitalize"></span> Account </h3>
        </div>
        <div class="card-body">

            <div>
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label>Name <span class="required">*</span></label>
                        <input required="" id="name" class="form-control" name="name" type="text">
                    </div>

                    <div class="form-group col-md-12 mb-3">
                        <label>Email Address <span class="required">*</span></label>
                        <input required="" id="email" class="form-control" name="email" type="email">
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label>Change Password <span class="required">*</span></label>
                        <input required="" id="password" class="form-control" name="password" type="password">
                    </div>
                    <div class="form-group col-md-12 mb-3">
                        <label>Phone Number <span class="required">*</span></label>
                        <input required="" id="number" class="form-control" name="number" type="tel">
                    </div>

                    <div class="form-group col-md-12 mb-3">
                        <label>Address <span class="required">*</span></label>
                        <input required="" id="address" class="form-control" name="address" type="text">
                    </div>

                    <div class="col-md-12">
                        <button type="submit" onclick="update()" class="btn btn-fill-out" name="submit" value="Submit">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>


    let $name = $('#name');
    let $email = $('#email');
    let $role = $('#role');
    let $password = $('#password');
    let $number = $('#number');
    let $address = $('#address');



    async function profile() {

        $("#preloader").delay(90).fadeIn(100).removeClass('loaded');

        try {
            let res = await axios.get("/UserProfile");

            if (res.status === 200) {

                $name.val(res.data.data['name']);
                $email.val(res.data.data['email']);
                $number.val(res.data.data['number']);
                $address.val(res.data.data['address']);
                $role.text(res.data.data['role']);
            } else {
                alert("Something Went Wrong");
            }
        } catch (error) {
            console.error(error);
            alert("Something Went Wrong");
        } finally {
            // Hide preloader
            $("#preloader").delay(90).fadeOut(100).addClass('loaded');
        }
    }

    async function update() {

        $("#preloader").delay(90).fadeIn(100).removeClass('loaded');

        try {
            let res = await axios.put("/UserUpdate", {
                name: $name.val(),
                email: $email.val(),
                password: $password.val(),
                number: $number.val(),
                address: $address.val()
            });

            if (res.data['status'] === 'done') {
                alert('Profile Updated');
            } else {
                alert("Something Went Wrong");
            }
        } catch (error) {
            console.error(error);
            alert("Something Went Wrong");
        } finally {

            $("#preloader").delay(90).fadeOut(100).addClass('loaded');
        }
    }

</script>
