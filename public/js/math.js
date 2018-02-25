$(function(){
    // Reset the round on every page load
    var mathGameRoundPlayed = false;
    var answer = $("#answer").attr("data-answer");
    var pokemonImage = $("#pokemon").attr("data-pokemon-to-appear");
    var pokemonName = $("#pokemon").attr("data-pokemon-name");
    var pokemonToLose = $("#pokemon-to-lose").attr("data-pokemon-to-lose-name");
    var pokemonToLoseImage = $("#pokemon-to-lose").attr("data-pokemon-to-lose-image");
    var nextEquationID = $("#next-equation").attr("data-next-equation");
    var haveUser = haveUserID();
    var havePokemonToLose = havePokemonIDToLose();

    // Prevent the page from reloading if the enter/return key is pressed
    $("form").submit(function(e){
        e.preventDefault();
    });

    $("button").click(function(){
        var $this = $(this);

        if (mathGameRoundPlayed === true) {
            // Round already played
            return;
        }

        $this.removeClass('btn-primary');
        $this.addClass('btn-default');

        mathGameRoundPlayed = true;

        // Set the correct answer in the equation
        $("#answer").text(answer);

        if ($this.val() == answer) {
            $this.addClass('btn-success');
            $("#pokemon").attr("src", "/img/pokemon/" + pokemonImage);
            $(".alert").addClass("alert-success");

            if (haveUser) {
                var jqxhr = $.post("/pokemon/user", $("#add-pokemon").serialize(), function (data) {
                    if (data != '') {
                        console.log("Attempted to add " + pokemonName + " to collection: " + data);
                    } else {
                        console.log("Added " + pokemonName + " to your collection!");
                    }
                });
                $(".alert").text("Correct! You just caught " + pokemonName + "!");
            } else {
                $(".alert").text("Correct!");
            }
        } else {
            $this.addClass('btn-warning');
            $(".alert").addClass("alert-danger");

            // Only do this if user is logged in
            if (haveUser && havePokemonToLose) {
                $("#pokemon").fadeTo(500, 0.25, function () {
                    $("#pokemon").attr("src", "/img/pokemon/" + pokemonToLoseImage);
                });

                var jqxhr = $.post("/pokemon/user", $("#lose-pokemon").serialize(), function (data) {
                    if (data != '') {
                        console.log("Attempted to remove " + pokemonToLose + " from collection: " + data);
                    } else {
                        console.log("Removed " + pokemonToLose + " from your collection.");
                    }
                });

                $(".alert").text("Oh no! Wrong answer! You just lost " + pokemonToLose + "!");
            } else {
                $(".alert").text("Oh no! Wrong answer!");
            }
        }
        $(".alert").removeClass("invisible");

        $("#next-equation").removeClass("invisible");
    });

    $("#next-equation").click(function(){
        window.location = "/pokemon/math-game/" + nextEquationID;
    });

    // Helper functions
    function haveUserID() {
        var userID = $("#user-id").attr("value");
        return userID !== '' && userID !== null && userID !== undefined;
    }

    function havePokemonIDToLose() {
        var pokemonToLoseID = $("#pokemon-to-lose-id").attr("value");
        return pokemonToLoseID !== '' && pokemonToLoseID !== null && pokemonToLoseID !== undefined;
    }

});