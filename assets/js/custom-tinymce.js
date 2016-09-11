jQuery('document').ready(function($){
    // Water Bear Games Button
    tinymce.create('tinymce.plugins.WBGButton', {
        init : function(ed, url) {
            ed.addButton('wbgbutton', {
                title : 'Water Bear Games Button',
                image : url + '/../../puzzle_pieces/assets/images/tinymce-puzzle-button-icon.png',
                onclick : function() {
                    var $insertButtonArea = $('#puzzle-insert-button-shortcode-area'),
                        $insertButtonSubmit = $('#puzzle-insert-button-submit'),
                        $insertButtonCancel = $('#puzzle-insert-button-cancel'),
                        $colorField = $('#puzzle-insert-button-color'),
                        $sizeField = $('#puzzle-insert-button-size'),
                        $iconField = $('#puzzle-insert-button-icon'),
                        $linkField = $('#puzzle-insert-button-link'),
                        $newTabField = $('#puzzle-insert-button-new-tab'),
                        $textField = $('#puzzle-insert-button-text'),
                        resetValues = function() {
                            $colorField.val('primary-color');
                            $sizeField.val('medium');
                            $iconField.prop('checked', false);
                            $linkField.val('');
                            $newTabField.prop('checked', false);
                            $textField.val('');
                        };
                    
                    $insertButtonArea.addClass('show');
                    
                    $insertButtonSubmit.on('click', function(e) {
                        e.preventDefault();
                        
                        var $newTabValue = 'false';
                            
                        if ($iconField.is(':checked')) {
                            $iconValue = 'true';
                        }
                        
                        if ($newTabField.is(':checked')) {
                            $newTabValue = 'true';
                        }
                        
                        ed.execCommand('mceInsertContent', false, '[wbg_button color="' + $colorField.val() + '" size="' + $sizeField.val() + '" link="' + $linkField.val() + '" open_link_in_new_tab="' + $newTabValue + '" text="' + $textField.val() + '"]');
                        
                        $insertButtonArea.removeClass('show');
                        resetValues();
                        
                        $insertButtonSubmit.off('click');
                        $insertButtonCancel.off('click');
                    });
                    
                    $insertButtonCancel.on('click', function(e) {
                        e.preventDefault();
                        resetValues();
                        $insertButtonArea.removeClass('show');
                        
                        $insertButtonSubmit.off('click');
                        $insertButtonCancel.off('click');
                    });
                }
            });
        },
        createControl : function(n, cm) {
            return null;
        },
        getInfo : function() {
            return {
                longname : "Water Bear Games Button Shortcode",
                author : 'Cara Heacock',
                authorurl : 'http://caraheacock.com/',
                infourl : 'http://caraheacock.com/',
                version : "1.0"
            };
        }
    });
    tinymce.PluginManager.add('wbgbutton', tinymce.plugins.WBGButton);
});