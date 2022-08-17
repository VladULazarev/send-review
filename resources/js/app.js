$(document).ready(function(){

// Show errors
function showErrors(fieldName, ) {

    $("." + fieldName).fadeTo(300, 1);
    return false;
}

// Show content
$(".content").fadeTo(300, 1);

// Hide 'error' messages
$(document).on("keydown", "input, textarea", function(){
    $(".form-error").css({'display' : 'none'});
});

// Click 'btn-review'
$(".btn-review").on('click', function(event) {

    event.preventDefault();

    // Set variables
    let name     = $("#name").val();
    let review   = $("#review").val();

    $.post("/app/Http/Controllers/HomeController.php", {

        name:   name,
        review: review

    }, function(data) {

        if (! data) {

            showErrors('wrong');

        } else if (data.length > 100) {

            // Show reviews
            $(data).prependTo("#reviews");

            // Hide 'no-reviews' message
            $(".no-reviews").fadeTo(1, 0).empty().css({'display' : 'none'});

            // Hide 'no-reviews' message
            $(".btn-delete-review").fadeTo(300, 1);

            // Empty the form fields
            $("input, textarea").val('');

            return false;

        } else {

            showErrors(data);
        }
    });

    return false;
});

// Delete all reviews
$(".btn-delete-review").on('click', function(event) {

    event.preventDefault();

    // Set variable
    let deleteReview = 'delete';

    $.post("/app/Http/Controllers/HomeController.php", {

        deleteReview: deleteReview

    }, function(data) {

        if (data == 'deleted') {

            $(location).attr("href", "/");
        }
    });

    return false;
});

});
