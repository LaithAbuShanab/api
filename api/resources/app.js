$("#input").focus();


const baseURL = "http://project1.local";
$.ajax({
    type: 'GET',
    url: baseURL + "/items",
    success: function (data) {
        data.body.forEach(element => {
            $("#list").append(`
            <div data-id=${element.id} class="item justify-content-around align-items-center w-50 m-auto mt-4 border-bottom  ${element.completed == 1 ? "completed" : "" }">
            <div class="form-check form-switch mt-4">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"${element.completed == 1 ? "checked" : "" }>
                <p class="mx-4">${element.name}</p>
            </div>
            <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
            </div>`);

            $(`div[data-id="${element.id}"] input`).change(function () {
                $(this).parent().parent().toggleClass("completed");
                $.ajax({
                    type: "PUT",
                    url: baseURL + "/items/update",
                    data: JSON.stringify({
                        id: element.id
                    }),
                    dataType: "application/JSON",
                    success: function (response) {
                        console.log(response)
                    },
                    error: function (e) {
                        console.log(e)
                    }
                });
            });

            $(`div[data-id="${element.id}"] button`).click(function () {
                $(this).parent().hide(1000, function () {
                    $(this).remove();
                    $.ajax({
                        type: "DELETE",
                        url: baseURL + "/items/delete",
                        data: JSON.stringify({
                            id: element.id
                        }),
                        dataType: "application/JSON",
                        success: function (element) {
                            console.log(element)
                        },
                        error: function (e) {
                            console.log(e)
                        }
                    });
                });
            })
        });
    }
});


$("#button-addon2").click(function () {

    let inputText = $("#input").val();
    console.log(inputText);

    if (inputText == "") {
        alert("Pleas Enter The New List");
        return;
    }

    //check if the item is already existed in the app
    //Get all items
    let items = $(".item p");
    let additionSwitch = false;
    //Loop through all items
    items.each(function (i) {
        //Check if the current item in the loop equals the new item.
        if ($(this).text() == inputText) {
            alert('This Item Is Already Exists!');
            additionSwitch = true;
        }
    })



    if (additionSwitch) {
        return
    }

    $.ajax({
        type: "POST",
        url: baseURL + "/items/create",
        data: JSON.stringify({
            name: inputText
        }),
        dataType: "application/JSON",
        success: function (response) {
            $("#list").append(`
            <div data-id=${response.id} class="item justify-content-around align-items-center w-50 m-auto mt-4 border-bottom">
            <div class="form-check form-switch mt-4">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault ">
                <p class="mx-4">${response}</p>
            </div>
            <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button>
            </div>`);
            $(`div[data-id="${element.id}"] input`).change(function () {
                $(this).parent().parent().toggleClass("completed");
                $.ajax({
                    type: "PUT",
                    url: baseURL + "/items/update",
                    data: JSON.stringify({
                        id: response.id
                    }),
                    dataType: "application/JSON",
                    success: function (response) {
                        console.log(response)
                    },
                    error: function (e) {
                        console.log(e)
                    }
                });
            });
            $(`div[data-id="${element.id}"] button`).click(function () {
                $(this).parent().hide(1000, function () {
                    $(this).remove();
                });
            })
        }
    })
    location.reload();
    //Add Css class And Remove Using CheckBox
    $("#input").val('')
    $("#input").focus();
})








/*
Add Css and Remove

    $(`[data-id="${Counter}"] input`).change(function () {
        if ($('input.form-check-input').is(':checked')) {
            $(this).parent().parent().css('text-decoration', 'line-through');
        } else {
            $(this).parent().parent().css('text-decoration', '');
        }
    })
*/


/*
Add Css and Remove

    $(`div[data-id="${Counter}"] input`).change(function () {
        if ($(this).parent().parent().hasClass("completed")) {
            $(this).parent().parent().removeClass("completed");
        } else {
            $(this).parent().parent().addClass("completed");
        }
        $(this).parent().parent().toggleClass("completed");
    });

*/