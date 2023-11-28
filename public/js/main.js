// tasks.js

document.addEventListener("DOMContentLoaded", function() {
    $("#sortable").sortable({
        update: function(event, ui) {
            let taskIdArray = [];
            $("#sortable li").each(function() {
                taskIdArray.push($(this).data("task-id"));
            });

            // Send task order to the server using AJAX
            $.ajax({
                url: reorderRoute, // Using the variable from Blade
                method: "POST",
                data: {
                    taskIds: taskIdArray,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log("Tasks reordered successfully.");
                },
                error: function(xhr) {
                    console.error("Error: ", xhr);
                }
            });
        }
    });
    $("#sortable").disableSelection();
});
