
@extends('components.dashmaster')
@section('body')

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper custom-dashboard">

        <div class="Apadding-c"> 
            
            <a href="{{ route('admin.subjects', [$class, $subject]) }}" class="btn btn-secondary link">Return to Subject</a>
            
            <div class="form-container">
            <h2>Upload Material for Subject: {{ $subject->name }}</h2>
            <form method="POST" id="material-form" action="{{ route('adminMaterials.store',  ['class' => $class->id, 'subject' => $subject->id]) }}" enctype="multipart/form-data" >
                @csrf
                <div>
                    <label for="title">Material Title:</label><br>
                    <input type="text" name="title" id="title" required><br>
                </div>
                <br>
                <div> 
                    <label for="type">Material Type:</label><br>
                    <select name="type" id="type" required>
                        <option value="" selected disabled>Choose Material Type</option>
                        <option value="document">Document</option>
                        <option value="link">Link</option>
                        <option value="video">Video</option>
                    </select>
                </div>
                <br>
                <div id="file-input" style="display: none;">
                    <label for="file">Upload File (Document/Video):</label><br>
                    <input type="file" name="file" id="file">
                </div>
                <br>
                <div id="url-input" style="display: none;">
                    <label for="url">Material Link:</label><br>
                    <input type="url" name="url" id="url">
                </div>
                <br>
                <input type="hidden" name="class_id" value="{{ $class->id }}">
                <input type="hidden" name="subject_id" value="{{ $subject->id }}">  
                <div>
                    <input type="submit" value="Upload">
                </div>

               </form>
            </div>
        </div>
    <div>

<script>
    document.getElementById('type').addEventListener('change', function() {
        var type = this.value;
        if (type === 'document' || type === 'video') {
            document.getElementById('file-input').style.display = 'block';
            document.getElementById('url-input').style.display = 'none';
        } else if (type === 'link') {
            document.getElementById('file-input').style.display = 'none';
            document.getElementById('url-input').style.display = 'block';
        } else {
            document.getElementById('file-input').style.display = 'none';
            document.getElementById('url-input').style.display = 'none';
        }
    });
</script>

<script>
    $(document).ready(function() {
    $('#material-form').submit(function(event) {
        event.preventDefault();
        console.log('Form submission prevented');
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                console.log('AJAX submission successful');
                console.log(data);
                // Display a success message to the user
                $('#material-form').append('<div class="alert alert-success">Material uploaded successfully!</div>');
            },
            error: function(xhr, status, error) {
                console.log('AJAX submission error');
                console.log(xhr.responseText);
                // Display an error message to the user
                $('#material-form').append('<div class="alert alert-danger">Error uploading material. Please try again.</div>');
            }
        });
    });
});
</script>

@endsection

