document.addEventListener("DOMContentLoaded", () => {
    const imgInput = document.querySelector("#avatarInput");
    const imgPreview = document.querySelector("#avatarPreview");
    const photo = document.querySelector(".photo");
    const cancelBtn = document.querySelector("#cancelAvatar");
    const tabs = document.querySelectorAll(".tab-btn");
    const contents = document.querySelectorAll(".tab-content");
    if (!imgInput || !imgPreview || !photo) return;
    const originalSrc = imgPreview.src || "";
    // PREVIEW
    imgInput.addEventListener("change", () => {
        const file = imgInput.files[0];
        if (!file || !file.type.startsWith("image/")) return;

        const reader = new FileReader();
        reader.onload = (e) => {
            imgPreview.src = e.target.result;
            imgPreview.style.display = "block";
            photo.classList.add("has-image");
        };
        reader.readAsDataURL(file);
    });
    // CANCEL
    if (cancelBtn) {
        cancelBtn.addEventListener("click", () => {
            imgPreview.src = originalSrc;

            if (!originalSrc) {
                imgPreview.style.display = "none";
                photo.classList.remove("has-image");
            }

            imgInput.value = "";
        });
    }
    // tabs info
    tabs.forEach((tab) => {
        tab.addEventListener("click", () => {
            const target = tab.dataset.tab;

            // active tab
            tabs.forEach((t) => t.classList.remove("active"));
            tab.classList.add("active");

            // show content
            contents.forEach((c) => {
                c.classList.toggle("active", c.dataset.content === target);
            });
        });
    });
});
