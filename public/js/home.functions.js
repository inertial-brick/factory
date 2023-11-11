const perPageSelect = document.getElementById("per_page");

perPageSelect.addEventListener("change", (event) => {
    const url = new URL(window.location.href);

    url.searchParams.set("per_page", event.target.value);

    window.location.href = url;
});

const categorySelect = document.getElementById("category");

categorySelect.addEventListener("change", (event) => {
    const url = new URL(window.location.href);

    url.searchParams.set("category_id", event.target.value);

    window.location.href = url;
});
