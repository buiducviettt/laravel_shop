let selectedColor = null;
let selectedSize = null;
let selectedVariant = null;
document.addEventListener("DOMContentLoaded", function () {
    const productVariants = window.productVariants || [];
    console.log(productVariants);
    // chọn màu
    document.querySelectorAll(".color-img").forEach((el) => {
        el.addEventListener("click", function () {
            document
                .querySelectorAll(".color-img")
                .forEach((c) => c.classList.remove("active"));
            this.classList.add("active");
            selectedColor = this.dataset.colorId;
            findVariant(productVariants);
        });
    });
    // chọn size
    document.querySelectorAll(".size-icon").forEach((el) => {
        el.addEventListener("click", function () {
            document
                .querySelectorAll(".size-icon")
                .forEach((s) => s.classList.remove("active"));
            this.classList.add("active");

            selectedSize = this.dataset.sizeId;
            findVariant(productVariants);
        });
    });

    function findVariant(productVariants) {
        if (!selectedColor || !selectedSize) return;

        selectedVariant = productVariants.find(
            (v) => v.color_id == selectedColor && v.size_id == selectedSize,
        );

        console.log("Variant đã chọn:", selectedVariant);
    }

    // thêm vào giỏ
    const btnAddCart = document.querySelector(".btn-add-cart");

    if (btnAddCart) {
        btnAddCart.addEventListener("click", function () {
            if (!selectedVariant) {
                alert("Vui lòng chọn màu và size");
                return;
            }

            fetch("/cart/add", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]',
                    ).content,
                },
                body: JSON.stringify({
                    variant_id: selectedVariant.id,
                    quantity: 1,
                }),
            })
                .then((res) => res.json())
                .then((data) => {
                    alert("Đã thêm vào giỏ hàng");
                });
        });
    }
});
