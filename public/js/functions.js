document.addEventListener("DOMContentLoaded", function () {
    const addButton = document.getElementById("addIngredient");
    const ingredientsContainer = document.querySelector(".ingredients");

    let ingredientCount =
        ingredientsContainer.querySelectorAll(".ingredient").length + 1;

    addButton.addEventListener("click", function () {
        const newIngredient = document.createElement("div");

        newIngredient.className = "ingredient";
        newIngredient.innerHTML = `
            <input
                type="text"
                name="ingredient_${ingredientCount}"
                id="ingredient_${ingredientCount}"
                placeholder="Naziv namirnice"
            >
        `;

        ingredientsContainer.appendChild(newIngredient);

        ingredientCount++;
    });
});
