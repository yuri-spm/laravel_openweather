document.getElementById("search_button").addEventListener("click", function () {
    document.getElementById("city_name").value = "";
});

document.addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        document.getElementById("city_name").value = "";
    }
});

document.addEventListener("livewire:load", function () {
    Livewire.on("closeModal", function () {
        var modalElement = new bootstrap.Modal(
            document.getElementById("forecastModal")
        );
        modalElement.hide();
    });

    Livewire.on("openModal", function () {
        setTimeout(function () {
            var modalElement = new bootstrap.Modal(
                document.getElementById("forecastModal")
            );
            modalElement.show();
        }, 300);
    });
});
