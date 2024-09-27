<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="dashboard_menu">
                    <ul class="nav nav-tabs flex-column" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false">
                                <i class="ti-layout-grid2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="fetchOrders()" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false">
                                <i class="ti-shopping-cart-full"></i> Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="profile()" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true">
                                <i class="ti-id-badge"></i> Account Details
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-8">
                <div class="tab-content dashboard_content">

                    {{-- Dashboard --}}
                    <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                        <div class="card">
                            <div class="card-header">
                                <h3>Dashboard</h3>
                            </div>
                            <div class="card-body row justify-content-around align-items-center">
                                <div class="card m-2" style="width: 18rem;">
                                    <div class="card-body">
                                        <h3 class="text-center">Total Cars</h3>
                                        <p class="text-center fw-bold fs-2 text-dark">55</p>
                                    </div>
                                </div>

                                <div class="card m-2" style="width: 18rem;">
                                    <div class="card-body">
                                        <h3 class="text-center">Available Cars</h3>
                                        <p class="text-center fw-bold fs-2 text-dark">30</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Orders --}}
                    <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                        <div class="card">
                            <div class="card-header">
                                <h3>My Cars</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-sm">
                                        <thead>
                                        <tr>
                                            <th width="10%" class="fs-6 text-center">Invoice ID</th>
                                            <th class="fs-6 text-center">status</th>
                                            <th class="fs-6 text-center">Start Date</th>
                                            <th class="fs-6 text-center">End Date</th>
                                            <th class="fs-6 text-center">Amount</th>
                                            <th class="fs-6 text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="user">
                                        <tr>
                                            <td colspan="6" class="text-center">Loading...</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Account Detail --}}
                    <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                        <div class="card">
                            <div class="card-header">
                                <h3><span id="role" class="text-capitalize"></span> Account</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label>Name <span class="required">*</span></label>
                                        <input required id="name" class="form-control" name="name" type="text">
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input required id="email" class="form-control" name="email" type="email">
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                        <label>Change Password <span class="required">*</span></label>
                                        <input required id="password" class="form-control" name="password" type="password">
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                        <label>Phone Number <span class="required">*</span></label>
                                        <input required id="number" class="form-control" name="number" type="tel">
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                        <label>Address <span class="required">*</span></label>
                                        <input required id="address" class="form-control" name="address" type="text">
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" onclick="update()" class="btn btn-fill-out">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                alert("Something went wrong.");
            }
        } catch (error) {
            console.error(error);
            alert("Something went wrong.");
        } finally {
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
                alert("Something went wrong.");
            }
        } catch (error) {
            console.error(error);
            alert("Something went wrong.");
        } finally {
            $("#preloader").delay(90).fadeOut(100).addClass('loaded');
        }
    }

    async function fetchOrders() {
        const tbody = document.querySelector('#user');
        tbody.innerHTML = '<tr><td colspan="6" class="text-center">Loading...</td></tr>'; // Loading state

        try {
            let res = await axios.get("/order-list");
            if (res.status === 200) {
                const orders = res.data.history; // Extract the array from the response object
                tbody.innerHTML = '';

                if (Array.isArray(orders)) {
                    if (orders.length === 0) {
                        tbody.innerHTML = '<tr><td colspan="6" class="text-center">No cars available.</td></tr>';
                    } else {
                        orders.forEach(item => {
                            const row = `
                                <tr style="cursor: pointer;">
                                    <td class="fs-6 text-center">${item.id}</td>
                                    <td class="fs-6 text-center">${item.status}</td>
                                    <td class="fs-6 text-center">${item.start_date}</td>
                                    <td class="fs-6 text-center">${item.end_date}</td>
                                    <td class="fs-6 text-center text-capitalize">${item.total_cost}</td>
                                    <td>
                                        <button class="btn fs-6 btn-fill-out btn-sm" onclick="deleteOrder(${item.id})">
                                            Cancel
                                        </button>
                                    </td>
                                </tr>`;
                            tbody.innerHTML += row;
                        });
                    }
                } else {
                    console.error("Expected an array, but got:", orders);
                    tbody.innerHTML = '<tr><td colspan="6" class="text-center">Unexpected data format.</td></tr>';
                }
            } else {
                tbody.innerHTML = '<tr><td colspan="6" class="text-center">Something went wrong.</td></tr>';
            }
        } catch (error) {
            console.error(error);
            tbody.innerHTML = '<tr><td colspan="6" class="text-center">Something went wrong.</td></tr>';
        }
    }

    async function deleteOrder(orderId) {
        try {
            let res = await axios.put(`/order-update/${orderId}`);
            if (res.data.status === 'success') {
                alert("Order Canceled  successfully.");
                fetchOrders(); // Refresh the data
            } else {
                alert("order Canceled unsuccessful.");
                fetchOrders(); // Refresh the data
            }
        } catch (error) {
            console.error(error);
            alert("Something went wrong.");
        }
    }
</script>
