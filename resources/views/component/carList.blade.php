<div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row align-items-center mb-4 pb-1">
                        <div class="col-12">
                            <div class="product_header">
                                <div class="product_header_left">
                                    <div class="custom_select">
                                        <select id="option" class="form-control form-control-sm">
                                            <option value="all">All Cars</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="custom_select">
                                    <select class="form-control form-control-sm">
                                        <option value="">Showing</option>
                                        <option value="9">9</option>
                                        <option value="12">12</option>
                                        <option value="18">18</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="item" class="row shop_container loadmore" data-item="8" data-item-show="4" data-finish-message="No More Item to Show" data-btn="Load More">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    async function all() {
        try {
            let res = await axios.get("/car");
            $("#item").empty();
            $("#option").find('option:not(:first)').remove(); // Clear previous options except the first one

            res.data['car'].forEach((item) => {
                let SliderItem = `<div class="col-lg-3 col-md-4 col-6 grid_item">
                                    <a href="/car-details/${item['id']}">
                                        <div class="product">
                                            <div class="product_img">
                                                <img src="${item['image']}" alt="${item['name']}">
                                            </div>
                                            <div class="product_info">
                                                <h6 class="product_title"><a href="/car-details/${item['id']}">${item['name']}</a></h6>
                                                <div class="product_price">
                                                    <span class="price">${item['daily_rent_price']}</span>
                                                    <span>TK</span>
                                                </div>
                                                <div class="rating_wrap">
                                                    <span>Brand: ${item['brand']}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>`;
                $("#item").append(SliderItem);
                if (!$(`#option option[value="${item['car_type']}"]`).length) {
                    $("#option").append(`<option value="${item['car_type']}">${item['car_type']}</option>`);
                }
            });
        } catch (error) {
            console.error("Error fetching data:", error);
        }
    }

    async function option() {
        const selectedType = $("#option").val();
        try {
            let res;
            if (selectedType === "all") {
                res = await axios.get("/car");
            } else {
                res = await axios.get(`/car?car_type=${selectedType}`);
            }
            $("#item").empty();
            res.data['car'].forEach((item) => {
                let SliderItem = `<div class="col-lg-3 col-md-4 col-6 grid_item">
                                    <a href="/car-details/${item['id']}">
                                        <div class="product">
                                            <div class="product_img">
                                                <img src="${item['image']}" alt="${item['name']}">
                                            </div>
                                            <div class="product_info">
                                                <h6 class="product_title"><a href="/car-details/${item['id']}">${item['name']}</a></h6>
                                                <div class="product_price">
                                                    <span class="price">${item['daily_rent_price']}</span>
                                                    <span>TK</span>
                                                </div>
                                                <div class="rating_wrap">
                                                    <span>Brand: ${item['brand']}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>`;
                $("#item").append(SliderItem);
            });
        } catch (error) {
            console.error("Error fetching filtered data:", error);
        }
    }

    $(document).ready(() => {
        all();
        $("#option").change(option); // Set up change event handler
    });
</script>
