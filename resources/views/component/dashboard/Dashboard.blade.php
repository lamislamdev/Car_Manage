<div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
    <div class="card">
        <div class="card-header">
            <h3>Admin</h3>
        </div>
        <div class="card-body row justify-content-around align-items-center">
            <div class="card m-2" style="width: 18rem; ">
                <div class="card-body ">
                    <h3 class="text-center">Total number of cars</h3>
                    <p id="total_car" class="text-center fw-bold fs-2 text-dark"></p>
                </div>
            </div>

            <div class="card m-2" style="width: 18rem; ">
                <div class="card-body">
                    <h3 class="text-center">Number of Available cars</h3>
                    <p id="available_car" class="text-center fw-bold fs-2 text-dark">30</p>
                </div>
            </div>

            <div class="card m-2" style="width: 18rem; ">
                <div class="card-body">
                    <h3 class="text-center">Total Number of Rentals</h3>
                    <p id="rental" class="text-center fw-bold fs-2 text-dark"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script >

    (async () => {
        let res = await axios('/countCar')
        console.log(res)
        if(res.status === 200){
            $('#total_car').text(res.data['car']);
            $('#available_car').text(res.data['available']);
            $('#rental').text(res.data['rental']);


        }else {
            alert('Something went wrong. ')
        }
    })()


</script>
