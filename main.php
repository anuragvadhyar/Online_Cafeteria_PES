<?php 
    include("cart.php");
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Select Your Items</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <h1>Select Your Items</h1>

    <!-- Button to select Snacks -->
    <button id="snacksButton">Snacks</button>

    <!-- Button to select Desserts -->
    <button id="dessertButton">Dessert</button>

    <div id="snacksSection" class="section">
        <h2>Snacks</h2>
        <div>
            <span>Burger</span>
            <input type="number" id="burgerQty" value="0" min="0">
        </div>
        <div>
            <span>Samosa</span>
            <input type="number" id="samosaQty" value="0" min="0">
        </div>
        <div>
            <span>Juice</span>
            <input type="number" id="juiceQty" value="0" min="0">
        </div>
    </div>

    <div id="dessertSection" class="section">
        <h2>Dessert</h2>
        <div>
            <span>Ice Cream</span>
            <input type="number" id="iceCreamQty" value="0" min="0">
        </div>
        <div>
            <span>Pudding</span>
            <input type="number" id="puddingQty" value="0" min="0">
        </div>
    </div>

    <!-- Button to add selected items to cart -->
    <button id="addToCartButton" style="display: none">ADD TO CART</button>

<form method="post" action="cart.php" id="addToCartForm">
    <input type="hidden" name="food_id" id="food_id" value="">
    <input type="hidden" name="item" id="item" value="">
    <input type="hidden" name="price" id="price" value="">
    <input type="hidden" name="quantity" id="quantity" value="0">
</form>



    <script>
        // Function to show the selected section (snacks or dessert)
        function showSection(sectionId) {
            document.getElementById("snacksSection").classList.remove("active");
            document.getElementById("dessertSection").classList.remove("active");
            document.getElementById(sectionId).classList.add("active");
        }

        // Function to check if there are selected items to enable the "ADD TO CART" button
        function checkSelectedItems() {
    const selectedItems = [
        { id: "burgerQty", foodId: 1, itemName: "Burger", price: 60 },
        { id: "samosaQty", foodId: 2, itemName: "Samosa", price: 15 },
        { id: "juiceQty", foodId: 3, itemName: "Juice", price: 20 },
        { id: "iceCreamQty", foodId: 4, itemName: "Ice Cream", price: 35 },
        { id: "puddingQty", foodId: 5, itemName: "Pudding", price: 50 }
    ];

    const selectedItemsData = [];

    for (const item of selectedItems) {
        const qty = document.getElementById(item.id).value;
        if (qty > 0) {
            selectedItemsData.push({
                food_id: item.foodId,
                item: item.itemName,
                price: item.price,
                quantity: qty
            });
        }
    }

    if (selectedItemsData.length > 0) {
        // Assuming you want to add all selected items to the cart
        // For demonstration purposes, you might modify this logic
        document.getElementById("food_id").value = selectedItemsData.map(item => item.food_id).join(',');
        document.getElementById("item").value = selectedItemsData.map(item => item.item).join(',');
        document.getElementById("price").value = selectedItemsData.map(item => item.price).join(',');
        document.getElementById("quantity").value = selectedItemsData.map(item => item.quantity).join(',');

        document.getElementById("addToCartButton").style.display = "block";
    } else {
        document.getElementById("addToCartButton").style.display = "none";
    }
}



        // Attach click event handlers to the buttons
        document.getElementById("snacksButton").addEventListener("click", function() {
            showSection("snacksSection");
        });

        document.getElementById("dessertButton").addEventListener("click", function() {
            showSection("dessertSection");
        });

        // Attach change event handlers to quantity inputs
        const quantityInputs = document.querySelectorAll("input[type='number']");
        quantityInputs.forEach(function(input) {
            input.addEventListener("change", checkSelectedItems);
        });
    // Attach click event handler to the "ADD TO CART" button
    document.getElementById("addToCartButton").addEventListener("click", function() {
        // Submit the form when the button is clicked
        document.getElementById("addToCartForm").submit();
    });
    </script>
</body>
</html>