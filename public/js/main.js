function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#preview').attr('src', e.target.result);
            $('#imgModal').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(document).ready(function () {
    $('.delete-item').on('click', function () {
      $('.modal-delete').attr('href', $(this).attr('data-href'));
    });

    $(document).on('click', '.preview', function () {
        $('#imgModal').attr('src', $(this).attr('src'));
    });

    var fileCollection = new Array();
    $('#images').on('change',function(e){
    	var files = e.target.files;
    	$.each(files, function(i, file){
    		fileCollection.push(file);
    		var reader = new FileReader();
    		reader.readAsDataURL(file);
    		reader.onload = function(e){
      var template = '<a href="#" data-toggle="modal" data-target="#previewImgModal">' +
      '<img src="' + e.target.result +'" class="image img-thumbnail preview" alt="preview">' +
      '</a>';
    			$('.images-to-upload').append(template);
    		};
    	});
    });

    if($('#editor').length){
        var toolbarOption = [
            ['bold', 'italic', 'underline', 'strike'],
            ['blockquote', 'code-block'],
            [{'header': [1, 2, 3, 4, 5, 6, false]}],
            [{'list': 'ordered'}, {'list': 'bullet'}],
            [{'script': 'sub'}, {'script': 'super'}],
            [{'indent': -1}, {'indent': +1}],
            [{'size': ['small', false, 'large', 'huge']}],
            ['link', 'image', 'video', 'formula'],
            [{'color': []}, {'background': []}],
            [{'font': []}],
            [{'align': []}]
        ];

        var editor = new Quill('#editor', {
            modules: {
            'toolbar': toolbarOption
            },
            theme: 'snow',
        });
        
        $('#editor').on('focusout', function () {
            $('#description').text(editor.root.innerHTML);
        });
    }

});
