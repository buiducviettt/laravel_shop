document.addEventListener("DOMContentLoaded", () => {
    const csrf = document.querySelector('meta[name="csrf-token"]')?.content;
    if (!csrf) return;

    const cartCount = document.querySelector(".cart-count");
    const cartToggle = document.getElementById("cart-toggle");
    const miniCart = document.getElementById("mini-cart");
    const miniCartItems = document.querySelector(".mini-cart-items");

    if (!miniCart || !miniCartItems) return;

    /* ================= ADD TO CART ================= */

    function addToCart(productId, redirect = false, btn = null) {
        let color = null;
        let size = null;

        if (btn) {
            const card = btn.closest(".product-card, .product-detail");

            color =
                card?.querySelector(".color-img.active")?.dataset.colorId ||
                null;
            size =
                card?.querySelector(".size-icon.active")?.dataset.sizeId ||
                null;
        }

        fetch("/cart/add", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrf,
            },
            body: JSON.stringify({
                product_id: productId,
                color: color,
                size: size,
            }),
        })
            .then((res) => res.json())
            .then((data) => {
                if (!data.success) return;

                if (cartCount) cartCount.innerText = data.count;

                loadMiniCart();
                miniCart.classList.add("active");

                if (redirect) window.location.href = "/checkout";
            });
    }

    document.querySelectorAll(".btn-add-cart").forEach((btn) => {
        btn.addEventListener("click", () => {
            addToCart(btn.dataset.id, false, btn);
        });
    });

    document.querySelectorAll(".btn-buy-now").forEach((btn) => {
        btn.addEventListener("click", () => {
            addToCart(btn.dataset.id, true, btn);
        });
    });

    /* ================= TOGGLE CART ================= */

    cartToggle?.addEventListener("click", (e) => {
        e.stopPropagation();
        miniCart.classList.toggle("active");

        if (miniCart.classList.contains("active")) {
            loadMiniCart();
        }
    });

    // Click ra ngoài thì đóng
    document.addEventListener("click", (e) => {
        if (!miniCart.contains(e.target) && !cartToggle.contains(e.target)) {
            miniCart.classList.remove("active");
        }
    });

    /* ================= LOAD MINI CART ================= */

    function loadMiniCart() {
        fetch("/cart/mini")
            .then((res) => res.json())
            .then((data) => {
                miniCartItems.innerHTML = "";

                if (!data.items.length) {
                    miniCartItems.innerHTML = "<p>Giỏ hàng trống</p>";
                    if (cartCount) cartCount.innerText = 0;
                    return;
                }

                if (cartCount) cartCount.innerText = data.count;

                data.items.forEach((item) => {
                    miniCartItems.innerHTML += `
                    <div class="mini-cart-item">
                        <span>${item.name}</span>
                        <span>x ${item.quantity}</span>
                        <button class="btn-remove-item" data-id="${item.product_id}">
                            ❌
                        </button>
                    </div>
                `;
                });
            });
    }

    /* ================= REMOVE ITEM ================= */

    miniCartItems.addEventListener("click", (e) => {
        const btn = e.target.closest(".btn-remove-item");
        if (!btn) return;

        fetch("/cart/remove", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrf,
            },
            body: JSON.stringify({
                product_id: btn.dataset.id,
            }),
        })
            .then((res) => res.json())
            .then(() => loadMiniCart());
    });
});
