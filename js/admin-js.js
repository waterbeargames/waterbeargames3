jQuery('document').ready(function($){
    var $window = $(window),
        $chooseSectionArea = $('#choose-section-area'),
        $chooseSectionButtons = $('#choose-section-area .button'),
        $addSectionButton = $('.wbg-add-section'),
        $allColumns = $('.wbg-add-section-area > .row > .column, #wbg-header-options .row'),
        $sectionTypeField = $('#wbg_section_type');
    
    // Choose section
    $chooseSectionButtons.click(function(e) {
       e.preventDefault();
       
       var $sectionButton = $(this),
           sectionName = $sectionButton.attr('id'),
           sectionTypeValue = /wbg-(.*)/.exec(sectionName)[1],
           $sectionArea = $('#' + sectionName + '-area');
       
       $sectionArea.addClass('show');
       $sectionTypeField.val(sectionTypeValue);
       $chooseSectionArea.remove();
       $('.wbg-add-section-area:not(.show)').remove();
    });
    
    if (!$chooseSectionArea.hasClass('show')) {
        $('.wbg-add-section-area:not(.show)').remove();
    }

    // Show and hide areas depending on template
    var templateCheck = function() {
        if ($('#page_template').val() === 'template-section.php') {
            $('#postdivrich').hide();
            $('#page_builder_options').show();
        } else {
            $('#postdivrich').show();
            $('#page_builder_options').hide();
        }
    };
    
    templateCheck();
    $('#page_template').change(templateCheck);
    
    // Allow user to sort columns using jQuery UI sortable
    var $sortableAreas = $('.added-sections');
    $sortableAreas.sortable();
    
    // Show and hide columns
    var collapsableColumn = function(column) {
        column.find($('.wbg-column-collapse')).click(function() {
            t = $(this);
            t.toggleClass('fa-chevron-down');
            t.toggleClass('fa-chevron-up');
            t.parents('.column').find('.wbg-column-content').toggleClass('show');
            
            if (t.siblings('input').val() === 'hide') {
                t.siblings('input').val('show');
            } else {
                t.siblings('input').val('hide');
            }
        });
    };
    
    // Add Image
    var custom_uploader;
    
    var addImage = function(column) {
        column.find($('.wbg_add_image_button')).click(function(e) {
            e.preventDefault();
            $button = $(this);

            // If the uploader object has already been created, reopen the dialog
            if (custom_uploader) {
                custom_uploader.open();
                return;
            }

            // Extend the wp.media object
            custom_uploader = wp.media.frames.file_frame = wp.media({
                title: 'Choose File',
                button: {
                    text: 'Choose File'
                },
                multiple: false
            });

            // When a file is selected, grab the URL and set it as the text field's value
            custom_uploader.on('select', function() {
                attachment = custom_uploader.state().get('selection').first().toJSON();
                $button.siblings('input').val(attachment.url);
                $button.siblings('img').attr('src', attachment.url);
            });

            // Open the uploader dialog
            custom_uploader.open();
        });
    };
    
    // Remove Image
    var removeImage = function(column) {
        column.find($('.wbg_remove_image_button')).click(function(e) {
           e.preventDefault();
           $button = $(this);
           $button.siblings('input').val('');
           $button.siblings('img').attr('src', '');
        });
    };
    
    // Resize pop up areas
    var $popUpArea = $('.wbg-pop-up-area');
    
    var resizePopUp = function() {
        windowHeight = $window.height();
        $popUpArea.height(windowHeight);
    };
    
    resizePopUp();
    $window.resize(resizePopUp);
    
    // WYSIWYG Editor
    var $wbgEditor = $('#wbg-text-editor-area'),
        $wbgEditorHTML = $('#wbgcustomeditor'),
        $visualButton = $('#wbgcustomeditor-tmce'),
        $textButton = $('#wbgcustomeditor-html'),
        $updateButton = $('#wbg-update-content'),
        $cancelButton = $('#wbg-cancel-editor');
    
    var openEditor = function(column) {
        column.find($('.open-editor-button')).click(function(e) {
            e.preventDefault();
            
            var $button = $(this),
                $originalTextBox = $button.siblings('textarea');
            
            $textButton.trigger('click');
            $wbgEditorHTML.val($originalTextBox.val());
            $visualButton.trigger('click');
            
            $wbgEditor.addClass('show');
    
            $updateButton.click(function(e) {
                e.preventDefault();
                $textButton.trigger('click');
                $originalTextBox.val($wbgEditorHTML.val());
                $wbgEditor.removeClass('show');
                $updateButton.off('click');
            });
    
            $cancelButton.click(function(e) {
                e.preventDefault();
                $wbgEditor.removeClass('show');
            });
        });
    };
    
    // Initialize column functions
    var initColumn = function(column) {
        collapsableColumn(column);
        addImage(column);
        removeImage(column);
        openEditor(column);
    };
    
    initColumn($allColumns);
    
    // Reinitialization for newly added columns
    $addSectionButton.click(function() {
        setTimeout(function() {
            initColumn($('.wbg-add-section-area > .added-sections > .column:last-child'));
        }, 10);
    });
});