


jQuery(document).ready(function () {

    var buttonContainer = jQuery('.parameter-buttons');
    var templateContainer = jQuery('.parameter-template');
    var templateTitle = jQuery('.parameter-template h1');
    var templateDesc = jQuery('.parameter-desc');
    var templateFormfields = jQuery('.parameter-formfields');
    var fileName = '';
    var backButton = jQuery('.button-back');



    jQuery('.parameter-item').on('click', function (e) {

        templateTitle.appendTo(jQuery(this).data("title"));
        templateDesc.appendTo(jQuery(this).data("desc"));
        fileName = jQuery(this).data("id");
        jQuery.get('templates/' + fileName + '.php', function (data) {
            templateFormfields.appendTo(data);
        });

        buttonContainer.hide('fast');
        templateContainer.show('fast');
        backButton.show('fast');

    });

    jQuery('.button-back').on('click', function () {
        buttonContainer.show('fast');
        templateContainer.hide('fast');
        templateContainer.detach();
        backButton.hide('fast');
    });



});