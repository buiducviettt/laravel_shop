document.addEventListener("DOMContentLoaded", () => {
    const provinceSelect = document.getElementById("province");
    const districtSelect = document.getElementById("district");
    const wardSelect = document.getElementById("ward");

    if (!provinceSelect || !districtSelect || !wardSelect) return;

    loadProvinces();

    // 🔥 Load tỉnh
    async function loadProvinces() {
        try {
            const res = await fetch(
                "https://provinces.open-api.vn/api/?depth=1",
            );
            const provinces = await res.json();

            provinces.forEach((province) => {
                const option = document.createElement("option");
                option.value = province.code;
                option.textContent = province.name;
                provinceSelect.appendChild(option);
            });
        } catch (err) {
            console.error("Load provinces failed", err);
        }
    }

    // 🔥 Khi chọn tỉnh → load quận
    provinceSelect.addEventListener("change", async () => {
        const provinceCode = provinceSelect.value;
        districtSelect.innerHTML = '<option value="">Chọn Quận/Huyện</option>';
        wardSelect.innerHTML = '<option value="">Chọn Phường/Xã</option>';
        if (!provinceCode) return;
        try {
            const res = await fetch(
                `https://provinces.open-api.vn/api/p/${provinceCode}?depth=2`,
            );
            const data = await res.json();

            data.districts.forEach((district) => {
                const option = document.createElement("option");
                option.value = district.code;
                option.textContent = district.name;
                districtSelect.appendChild(option);
            });
        } catch (err) {
            console.error("Load districts failed", err);
        }
    });
    // 🔥 Khi chọn quận → load phường
    districtSelect.addEventListener("change", async () => {
        const districtCode = districtSelect.value;

        wardSelect.innerHTML = '<option value="">Chọn Phường/Xã</option>';

        if (!districtCode) return;

        try {
            const res = await fetch(
                `https://provinces.open-api.vn/api/d/${districtCode}?depth=2`,
            );
            const data = await res.json();

            data.wards.forEach((ward) => {
                const option = document.createElement("option");
                option.value = ward.code;
                option.textContent = ward.name;
                wardSelect.appendChild(option);
            });
        } catch (err) {
            console.error("Load wards failed", err);
        }
    });
});
