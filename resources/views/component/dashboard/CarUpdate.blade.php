<div style="background-color: #0b0b0b;" >
    <div class="card">
        <div class="card-header">
            <h3>Update car</h3>
        </div>
        <div class="card-body">
            <form enctype="multipart/form-data" class="form-sm" action="{{route('updateCar')}}" method="post" onsubmit="return true">
                @csrf
                @method('put')
                <input type="hidden" name="id" id="id" value="{{$car->id}}">
                <div class="row">
                    <div class="form-group col-md-6 mb-3">
                        <label>car name <span class="required">*</span></label>
                        <input required="" id="car_name" class="form-control" name="car_name" type="text" value="{{$car->name}}">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label>Brand Name <span class="required">*</span></label>
                        <input required="" id="brand"  class="form-control" name="brand" value="{{$car->brand}}">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label>Model <span class="required">*</span></label>
                        <input required="" id="model"  class="form-control" name="model" value="{{$car->model}}">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label>Year of Manufacture <span class="required">*</span></label>
                        <input required="" id="year" class="form-control cursor" name="year" type="tel" placeholder="YYYY" value="{{$car->year}}">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label>Car Type <span class="required">*</span></label>
                        <input required="" id="car_type" class="form-control" name="car_type" type="text" value="{{$car->car_type}}">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label>Daily Rent Price <span class="required">*</span></label>
                        <input required="" id="daily_rent_price" class="form-control" name="daily_rent_price" type="tel" value="{{$car->daily_rent_price}}">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label>availability <span class="required">*</span></label>
                        <select class="form-control cursor"  name="availability" id="availability">
                            <option class="form-control " value="1">Available</option>
                            <option class="form-control " value="0">Not Available</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label>Car Image <span class="required"></span></label>
                        <input  id="image" class="form-control" name="image" type="file">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <p>{{session('update')}}</p>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-fill-out" name="submit" value="Submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
