<div class="tab-pane fade" id="add_car" role="tabpanel" aria-labelledby="account-detail-tab">
    <div class="card">
        <div class="card-header">
            <h3>Add Car</h3>
        </div>
        <div class="card-body">
            <p>Already have an account? <a href="#">Log in instead!</a></p>
            <form enctype="multipart/form-data" action="{{ route('add-car') }}" method="post">
                @csrf <!-- Ensure CSRF token is included -->
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label>Car Name <span class="required">*</span></label>
                        <input required id="car_name" class="form-control" name="car_name" type="text">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label>Brand Name <span class="required">*</span></label>
                        <input required id="brand" class="form-control" name="brand" type="text">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label>Model <span class="required">*</span></label>
                        <input required id="model" class="form-control" name="model" type="text">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label>Year of Manufacture <span class="required">*</span></label>
                        <input required id="year" class="form-control" name="year" type="number" min="1900" max="2100" placeholder="YYYY">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label>Car Type <span class="required">*</span></label>
                        <input required id="car_type" class="form-control" name="car_type" type="text">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label>Daily Rent Price <span class="required">*</span></label>
                        <input required id="daily_rent_price" class="form-control" name="daily_rent_price" type="number" step="0.01">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label>Availability <span class="required">*</span></label>
                        <select class="form-control" name="availability" id="availability" required>
                            <option value="1">Available</option>
                            <option value="0">Not Available</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label>Car Image <span class="required">*</span></label>
                        <input required id="image" class="form-control" name="image" type="file" accept="image/*">
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
