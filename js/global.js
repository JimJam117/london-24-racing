/**
 * Created by James on 20/07/2017.
 */

$(document).ready(function (){
    tinymce.init({
        selector: 'textarea',
        

        extended_valid_elements : 'img[class|src|border=5|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name]',

        plugins: ["advlist autolink link image lists charmap print preview hr anchor pagebreak searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking table contextmenu directionality emoticons paste textcolor responsivefilemanager code spellchecker"],

        toolbar1 : "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
        toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor | print preview code | caption | spellchecker | emoticons",

        image_caption: true,
        image_advtab: true,

        external_filemanager_path: "/filemanager/",
        filemanager_title: "myPHPnotes",
        external_plugins : {"filemanager": "/filemanager/plugin.min.js"},

        visualblocks_default_state: true,

        style_formats_autohide: true,
        style_formats_merge: true

    });

});