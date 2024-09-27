<div>
    <div class="card">
        <div class="card-header">
            <h3>Car Details</h3>
        </div>
        <div class="card-body">
            <div class="form-sm">
                <input type="hidden" name="id" id="id" value="{{$car->id}}">
                <div class="row">
                    <div class="form-group col-md-4 mb-3">
                        <label>Car Name <span class="required">*</span></label>
                        <h3 id="name" class="fs-4">{{$car->name}}</h3>
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label>Brand Name <span class="required">*</span></label>
                        <h3 id="brand" class="fs-4">{{$car->brand}}</h3>
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label>Model <span class="required">*</span></label>
                        <h3 id="model" class="fs-4">{{$car->model}}</h3>
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label>Year of Manufacture <span class="required">*</span></label>
                        <h3 id="year" class="fs-4">{{$car->year}}</h3>
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label>Car Type <span class="required">*</span></label>
                        <h3 id="car_type" class="fs-4">{{$car->car_type}}</h3>
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label>Daily Rent Price <span class="required"></span></label>
                        <h3 id="daily_rent_price" class="fs-4">{{$car->daily_rent_price}}</h3>
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label>Starting Date <span class="required">*</span></label>
                        <input required="" id="start_date" class="form-control" name="start_date" type="date">
                    </div>
                    <div class="form-group col-md-4 mb-3">
                        <label>Ending Date <span class="required">*</span></label>
                        <input required="" id="end_date" class="form-control" name="end_date" type="date">
                    </div>
                    <div class="col-md-12">
                        <button onclick="book()" class="btn btn-fill-out" name="submit" value="Submit">Book Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    async function book() {
        try {
            let id = document.getElementById("id").value;
            let start_date = document.getElementById("start_date").value;
            let end_date = document.getElementById("end_date").value;

            // Basic validation
            if (!start_date || !end_date) {
                alert("Please fill in all fields.");
                return;
            }

            // Date validation
            if (new Date(start_date) >= new Date(end_date)) {
                alert("End date must be after start date.");
                return;
            }

            // Show loading indicator (optional)
            const button = document.querySelector("button");
            button.disabled = true;
            button.textContent = "Booking...";

            let res = await axios.post("/rental", {
                id: id,
                start_date: start_date,
                end_date: end_date
            });

            if (res.status === 201) {
                alert(res.data['days']);

            } else {
                window.location.href = '/login';
            }
        } catch (error) {
            console.error(error);
            alert("An error occurred: " + (error.response ? error.response.data.message : error.message));
        } finally {
            // Re-enable button and reset text
            const button = document.querySelector("button");
            button.disabled = false;
            button.textContent = "Book Now";
        }
    }
</script>
