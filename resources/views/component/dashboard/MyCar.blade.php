<div class="tab-pane fade" id="my_car" role="tabpanel" aria-labelledby="orders-tab">
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
                        <th class="fs-6 text-center">Brand</th>
                        <th class="fs-6 text-center">Model</th>
                        <th class="fs-6 text-center">Year</th>
                        <th class="fs-6 text-center">Type</th>
                        <th class="fs-6 text-center">Daily Rent Price</th>
                        <th class="fs-6 text-center">Availability</th>
                        <th class="fs-6 text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="data">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    async function index() {
        const tbody = document.querySelector('#data');
        $("#preloader").delay(90).fadeIn(100).removeClass('loaded');

        try {
            let res = await axios.get("/all-car");

            if (res.status === 200) {
                const cars = res.data;
                tbody.innerHTML = '';

                cars.forEach(car => {
                    const availabilityText = (car.availability === 1) ? 'Available' : 'Not Available';

                    const row = `
                <tr style="cursor: pointer;">
                    <td onclick="window.location.href='/car/${car.id}'" class="fs-6 text-center">${car.name}</td>
                    <td onclick="window.location.href='/car/${car.id}'" class="fs-6 text-center">${car.brand}</td>
                    <td onclick="window.location.href='/car/${car.id}'" class="fs-6 text-center">${car.model}</td>
                    <td onclick="window.location.href='/car/${car.id}'" class="fs-6 text-center">${car.year}</td>
                    <td onclick="window.location.href='/car/${car.id}'" class="fs-6 text-center">${car.car_type}</td>
                    <td onclick="window.location.href='/car/${car.id}'" class="fs-6 text-center">${car.daily_rent_price}</td>
                    <td onclick="window.location.href='/car/${car.id}'" class="fs-6 text-center">${availabilityText}</td>
                    <td>
                        <button class="btn fs-6 btn-fill-out btn-sm" onclick="deleteCar(${car.id})">
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
    async function deleteCar(carId) {
        try {
            await axios.delete(`/car-delete/${carId}`);
            alert("Car deleted successfully.");
            index(); // Refresh the data
        } catch (error) {
            console.error(error);
            alert("Failed to delete the car.");
        }
    }


</script>
