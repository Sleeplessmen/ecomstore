<div class="sec-banner bg0 p-t-80 p-b-50">

    <div class="container">
        <div class="p-b-10">
            <h4 class="ltext-103 cl5" style="font-family: 'Open Sans', sans-serif;">
                Danh mục ngành hàng
            </h4>
        </div>

        <div class="row">
            <div class="category-slider">
                <div class="category-list">
                    <?php
                    $query = "SELECT * FROM categories";
                    $result = $connect->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $categoryID = $row['categoryID'];
                            $categoryImage = $row['categoryImage'];
                            $categoryName = $row['categoryName'];
                    ?>
                            <div class="zzz" onclick="redirectToCategory(<?php echo $categoryID; ?>)">
                                <div class="block1 wrap-pic-w">
                                    <div class="crop-img">
                                        <img src="<?php echo $categoryImage; ?>" alt="Category Image">
                                    </div>
                                    <div class="block1-txt-child1">
                                        <span class="block1-name ltext-102 trans-04">
                                            <?php echo $categoryName; ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                        echo "No categories found.";
                    }
                    ?>
                </div>
            </div>
            <button id="prevBtn" class="nav-btn">&lt;</button>
			<button id="nextBtn" class="nav-btn">&gt;</button>
        </div>
    </div>
</div>


<style>
    .category-slider {
        width: 100%;
        overflow-x: auto;
        white-space: nowrap;
        margin-bottom: 20px;
    }

    .category-list {
        display: inline-block;
    }

    .zzz {
        display: inline-block;
        width: 156px;
        margin-right: 10px; 
        vertical-align: top;
    }

    .zzz .block1 {
        width: 100%;
    }

    .zzz .crop-img {
        width: 100%;
        overflow: hidden;
    }

    .zzz .crop-img img {
        width: 100%;
        height: auto;
    }

    .zzz .block1-txt-child1 {
        text-align: center;
        height: 40px; 
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .zzz .block1-name {
        font-family: Arial;
        font-size: 14px; 
    }

    #prevBtn,
    #nextBtn {
        margin-right: 10px;
    }

	.nav-btn {
		font-size: 0.75em; /* Adjust the font size to make it bigger */
		background-color: grey; /* Darker color for the button background */
		color: white; /* Text color */
		border: none; /* Remove border */
		padding: 8px 12px; /* Adjust padding for the button */
		cursor: pointer;
		transition: background-color 0.3s; /* Smooth transition */
	}

	/* Styling for hover state */
	.nav-btn:hover {
		background-color: #111; /* Darker color on hover */
	}
</style>

<script>
    document.getElementById("prevBtn").addEventListener("click", function () {
        document.querySelector(".category-slider").scrollBy({
            left: -200, // Adjust scroll amount as needed
            behavior: "smooth",
        });
    });

    document.getElementById("nextBtn").addEventListener("click", function () {
        document.querySelector(".category-slider").scrollBy({
            left: 200, // Adjust scroll amount as needed
            behavior: "smooth",
        });
    });

    function redirectToCategory(categoryID) {
		const baseURL = 'http://localhost/ecomstore/product.php?category=';
		window.location.href = baseURL + categoryID;
	}
</script>
