<div class="tab-pane fade" id="my_user" role="tabpanel" aria-labelledby="orders-tab">
    <div class="card">
        <div class="card-header">
            <h3>My Car's</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-sm">
                    <thead>
                    <tr>
                        <th width="10%" class="fs-6 text-center">Name</th>
                        <th class="fs-6 text-center">Email</th>
                        <th class="fs-6 text-center">Phone</th>
                        <th class="fs-6 text-center">Address</th>
                        <th class="fs-6 text-center">Type</th>
                        <th class="fs-6 text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="user">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    async function user() {
        const tbody = document.querySelector('#user');
        $("#preloader").delay(90).fadeIn(100).removeClass('loaded');

        try {
            let res = await axios.get("/all-users");

            if (res.status === 200) {
                const users = res.data;
                tbody.innerHTML = '';

                users.forEach(user => {
                    // const availabilityText = (car.availability === 1) ? 'Available' : 'Not Available';

                    const row = `
                <tr style="cursor: pointer;">
                    <td class="fs-6 text-center">${user.name}</td>
                    <td class="fs-6 text-center">${user.email}</td>
                    <td class="fs-6 text-center">${user.number}</td>
                    <td class="fs-6 text-center">${user.address}</td>
                    <td class="fs-6 text-center text-capitalize">${user.role}</td>
                    <td>
                        <button class="btn fs-6 btn-fill-out btn-sm" onclick="deleteUser(${user.id})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                            </svg>
                        </button>
                    </td>
                </tr>
                `;
                    tbody.innerHTML += row;
                });
            } else {
                alert("Something went wrong");
            }
        } catch (error) {
            console.error(error);
            alert("Something went wrong");
        } finally {
            $("#preloader").delay(90).fadeOut(100).addClass('loaded');
        }
    }
    async function deleteUser(userId) {
        try {
            let res = await axios.delete(`/user-delete/${userId}`);
            if(res.data['status']==='success'){
                alert("User deleted successfully.");
                user(); // Refresh the data
            }else {
                alert("Delete User Unsuccessful");
                user(); // Refresh the data
            }

        } catch (error) {
            console.error(error);
            alert("Something went wrong.");
        }
    }


</script>
