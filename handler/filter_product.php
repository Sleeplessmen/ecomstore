<?php
// Include your database connection
include("../partials/connect.php");

// Validate and sanitize the input
$category = isset($_POST['category']) ? mysqli_real_escape_string($connect, $_POST['category']) : '';

// Fetch products based on the selected category
$sqlFilteredProducts = "SELECT * FROM products WHERE categoryID = '$category'";
$resultFilteredProducts = $connect->query($sqlFilteredProducts);

// Display filtered products
while ($rowFilteredProduct = $resultFilteredProducts->fetch_assoc()) :
?>
<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo strtolower($rowFilteredProduct['category'])?>" >
    <div class="block2">
        <div class="block2-pic hov-img0">
            <img src="<?php echo $final['productPicture']?>" alt="Product Image - <?php echo $final['productName']; ?>" style="max-height: 300px; max-width: 300px; margin-bottom: 5px;">

            <a href="../details.php?detail_id=<?php echo $resultFilteredProducts['productID'] ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                Quick View
            </a>
        </div>

        <div class="block2-txt flex-w flex-t p-t-14">
            <div class="block2-txt-child1 flex-col-l">
                <a href="details.php?detail_id=<?php echo $final['productID']; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                    <?php echo $final['productName'] ?>
                </a>

                <span class="stext-105 cl3">
                    <?php echo number_format($final['productPrice'], 0, ',', '.') . 'đ'; ?>
                </span>
            </div>
        </div>
    </div>
</div>
<?php
endwhile;
?>
