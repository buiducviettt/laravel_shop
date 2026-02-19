document.addEventListener("DOMContentLoaded", function () {
    const updatePrice = document.getElementById("product-price");
    document
        .querySelectorAll(".product-card, .product-detail")
        .forEach((card) => {
            let selectedColor = null;
            let selectedSize = null;
            let selectedVariant = null;
            const productVariants = JSON.parse(card.dataset.variants || "[]");
            const priceEl = card.querySelector(".total-price-value");
            const colorEls = card.querySelectorAll(".color-img");
            const sizeEls = card.querySelectorAll(".size-icon");
            //auto chọn màu và size đầu tiên khi load trang
            if (colorEls.length) {
                colorEls[0].classList.add("active");
                selectedColor = colorEls[0].dataset.colorId;
            }

            if (sizeEls.length) {
                sizeEls[0].classList.add("active");
                selectedSize = sizeEls[0].dataset.sizeId;
            }

            findVariant();

            // chọn màu
            card.querySelectorAll(".color-img").forEach((el) => {
                el.addEventListener("click", function () {
                    card.querySelectorAll(".color-img").forEach((c) =>
                        c.classList.remove("active"),
                    );

                    this.classList.add("active");
                    selectedColor = this.dataset.colorId;

                    findVariant();
                });
            });

            // chọn size
            card.querySelectorAll(".size-icon").forEach((el) => {
                el.addEventListener("click", function () {
                    card.querySelectorAll(".size-icon").forEach((s) =>
                        s.classList.remove("active"),
                    );

                    this.classList.add("active");
                    selectedSize = this.dataset.sizeId;

                    findVariant();
                });
            });

            function findVariant() {
                if (!selectedColor || !selectedSize) return;

                selectedVariant = productVariants.find(
                    (v) =>
                        v.color_id == selectedColor &&
                        v.size_id == selectedSize,
                );

                console.log("Variant đã chọn:", selectedVariant);
                if (priceEl) {
                    priceEl.innerText =
                        new Intl.NumberFormat("vi-VN").format(
                            selectedVariant.price,
                        ) + "đ";
                }
            }

            const btnAddCart = card.querySelector(".btn-add-cart");

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
});
