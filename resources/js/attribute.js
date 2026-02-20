console.log("ATTRIBUTE JS LOADED");

document.addEventListener("DOMContentLoaded", function () {
    // ===== INIT PRODUCT CARD =====
    document.querySelectorAll(".product-card").forEach(initProduct);

    // ===== INIT PRODUCT DETAIL (chỉ 1) =====
    const detail = document.querySelector(".product-detail");
    if (detail) {
        initProduct(detail);
    }
});
function initProduct(card) {
    if (!card) return;
    let selectedColor = null;
    let selectedSize = null;
    let selectedVariant = null;

    const productVariants = JSON.parse(card.dataset.variants || "[]");
    if (!productVariants.length) return;

    const priceEl = card.querySelector(".total-price-value");
    const colorEls = card.querySelectorAll(".color-img");
    const sizeEls = card.querySelectorAll(".size-icon");
    const btnAddCart = card.querySelector(".btn-add-cart");
    const btnBuyNow = card.querySelector(".btn-buy-now");

    // ===============================
    // AUTO SELECT FIRST VARIANT
    // ===============================
    if (colorEls.length) {
        colorEls[0].classList.add("active");
        selectedColor = colorEls[0].dataset.colorId;
    }

    if (sizeEls.length) {
        sizeEls[0].classList.add("active");
        selectedSize = sizeEls[0].dataset.sizeId;
    }

    updateVariant();

    // ===============================
    // COLOR CLICK
    // ===============================
    colorEls.forEach((el) => {
        el.addEventListener("click", function () {
            colorEls.forEach((c) => c.classList.remove("active"));
            this.classList.add("active");

            selectedColor = this.dataset.colorId;
            updateVariant();
        });
    });

    // ===============================
    // SIZE CLICK
    // ===============================
    sizeEls.forEach((el) => {
        el.addEventListener("click", function () {
            sizeEls.forEach((s) => s.classList.remove("active"));
            this.classList.add("active");

            selectedSize = this.dataset.sizeId;
            updateVariant();
        });
    });

    // ===============================
    // UPDATE VARIANT
    // ===============================
    function updateVariant() {
        if (!selectedColor || !selectedSize) return;

        selectedVariant = productVariants.find(
            (v) => v.color_id == selectedColor && v.size_id == selectedSize,
        );

        if (!selectedVariant) return;

        if (priceEl) {
            priceEl.innerText =
                new Intl.NumberFormat("vi-VN").format(selectedVariant.price) +
                "đ";
        }

        console.log("Variant selected:", selectedVariant);
    }

    // ===============================
    // ADD TO CART
    // ===============================
    if (btnAddCart) {
        btnAddCart.addEventListener("click", function (e) {
            e.preventDefault();

            if (!selectedVariant) {
                alert("Vui lòng chọn màu và size");
                return;
            }

            btnAddCart.disabled = true; // tránh click spam

            fetch("/cart/add", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]',
                    ).content,
                },
                body: JSON.stringify({
                    product_id: selectedVariant.product_id,
                    color: selectedVariant.color_id,
                    size: selectedVariant.size_id,
                    quantity: 1,
                }),
            })
                .then((res) => res.json())
                .then((data) => {
                    console.log("Add success:", data);
                })
                .catch((err) => {
                    console.error("Add failed:", err);
                })
                .finally(() => {
                    btnAddCart.disabled = false;
                });
        });
    }

    // ===============================
    // BUY NOW
    // ===============================
    if (btnBuyNow) {
        btnBuyNow.addEventListener("click", function (e) {
            e.preventDefault();

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
                    product_id: selectedVariant.product_id,
                    color: selectedVariant.color_id,
                    size: selectedVariant.size_id,
                    quantity: 1,
                }),
            })
                .then((res) => res.json())
                .then(() => {
                    window.location.href = "/checkout";
                });
        });
    }
}
