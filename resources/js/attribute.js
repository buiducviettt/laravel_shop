document.addEventListener("DOMContentLoaded", function () {
    document
        .querySelectorAll(".product-card, .product-detail")
        .forEach((card) => {
            let selectedColor = null;
            let selectedSize = null;
            let selectedVariant = null;

            const productVariants = JSON.parse(card.dataset.variants || "[]");

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
