document.addEventListener("DOMContentLoaded", function () {
    var addButton = document.getElementById("addIngredient");
    var ingredientsContainer = document.querySelector(".ingredients");
    var ingredientCount =
        ingredientsContainer.querySelectorAll(".ingredient").length + 1;

    addButton.addEventListener("click", function () {
        var newIngredient = document.createElement("div");
        newIngredient.className = "ingredient";
        newIngredient.innerHTML =
            '<input type="text" name="ingredient_' +
            ingredientCount +
            '" id="ingredient_' +
            ingredientCount +
            '" placeholder="Naziv namirnice">';
        ingredientsContainer.appendChild(newIngredient);
        ingredientCount++;
    });
});
