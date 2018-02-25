$(function(){
    var currentPokemonWord = $("#word-to-type").text();
    var pokemonImage = $("#pokemon").attr("data-pokemon-to-appear");
    var nextPokemonIndex = $("#next-word").attr("data-next-word");
    var userID = $("#user-id").attr("value");

    // Auto focus on the input
    $("#word-input").focus();

    // Prevent the page from reloading if the enter/return key is pressed
    $("form").submit(function(e){
        e.preventDefault();
    });

    $("#word-input").keyup(function(e) {
        if ( $("#word-to-type").text() == $(this).val()) {
            $("#pokemon").attr("src", "/img/pokemon/" + pokemonImage);

            $("#next-word").removeClass("invisible");

            // If user is logged in, add Pokemon to their collection
            if (userID !== '' && userID !== null && userID !== undefined) {
                var jqxhr = $.post("/pokemon/user", $("#add-pokemon").serialize(), function (data) {
                    if (data != '') {
                        console.log("Attempted to add to Pokemon collection: " + data);
                    } else {
                        console.log("Added " + currentPokemonWord + " to your collection!");
                        $("#add-to-collection-message").removeClass("invisible");
                    }
                });
            } else {
                // TODO: add message that not logged in
            }
        } else {
            $("#pokemon").attr("src", "/img/pokemon/pokeball.png")
        }
    });

    $("#next-word").click(function(){
        window.location = "/pokemon/typing-game/" + nextPokemonIndex;
    });
});