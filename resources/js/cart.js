document.addEventListener("DOMContentLoaded", () => {
    const csrf = document.querySelector('meta[name="csrf-token"]')?.content;
    if (!csrf) return;

    const cartCount = document.querySelector(".cart-count");
    const cartToggle = document.getElementById("cart-toggle");
    const miniCart = document.getElementById("mini-cart");
    const miniCartItems = document.querySelector(".mini-cart-items");
    const totalPrice = document.querySelector(".total-price-value");
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
        //debug
        console.log({
            productId,
            color,
            size,
        });

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
                if (!data.items.length) {
                    miniCartItems.innerHTML = "<p>Giỏ hàng trống</p>";
                    if (cartCount) cartCount.innerText = 0;
                    return;
                }

                if (cartCount) cartCount.innerText = data.count;

                let html = `
                <table class="mini-cart-table">
                    <tbody>
            `;
                data.items.forEach((item) => {
                    html += `
                    <tr class="mini-cart-row">
                        <td class="cart-info">
                <div class="cart-name">
                    ${item.name} - ${item.size}
                </div>
                <div class="cart-price">
                    Giá: ${formatPrice(item.price)}
                </div>
            </td>
                    <td>x ${item.quantity}</td>
                        <td>
                            <button class="btn-remove-item" data-id="${item.product_id}">
                                ❌
                            </button>
                        </td>
                    </tr>
                `;
                });
                html += `
                    </tbody>
                </table
            `;
                miniCartItems.innerHTML = html;
                // tính total
                if (totalPrice) {
                    totalPrice.innerText = formatPrice(data.total);
                }
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
//format price
function formatPrice(price) {
    return new Intl.NumberFormat("vi-VN").format(price) + "đ";
}
