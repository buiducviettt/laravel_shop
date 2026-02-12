document.addEventListener("DOMContentLoaded", () => {
    const countrySelect = document.getElementById("country");
    const citySelect = document.getElementById("city_state");
    // ❗ Nếu trang không có select thì thoát luôn
    if (!countrySelect || !citySelect) return;
    loadCountries();
    async function loadCountries() {
        try {
            const res = await fetch(
                "https://countriesnow.space/api/v0.1/countries",
            );
            const json = await res.json();

            json.data.forEach((c) => {
                const option = document.createElement("option");
                option.value = c.country;
                option.textContent = c.country;
                countrySelect.appendChild(option);
            });
        } catch (err) {
            console.error("Load country failed", err);
        }
    }

    countrySelect.addEventListener("change", async () => {
        const country = countrySelect.value;
        if (!country) return;

        citySelect.innerHTML = "<option>Loading...</option>";

        try {
            const res = await fetch(
                "https://countriesnow.space/api/v0.1/countries/states",
                {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify({ country }),
                },
            );

            const json = await res.json();

            citySelect.innerHTML =
                '<option value="">Select city/state</option>';

            json.data.states.forEach((state) => {
                const option = document.createElement("option");
                option.value = state.name;
                option.textContent = state.name;
                citySelect.appendChild(option);
            });
        } catch (err) {
            console.error("Load state failed", err);
            citySelect.innerHTML = "<option>Error loading data</option>";
        }
    });
});
