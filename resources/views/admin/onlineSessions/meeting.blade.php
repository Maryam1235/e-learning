@extends('components.dashmaster')

@section('body')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper custom-dashboard">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Your Meeting is Ready</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <p>Share the meeting code with your students so they can join.</p>
                        <div class="card-body">
                            <p>Meeting URL: <a href="{{ $meeting->meeting_url }}" target="_blank">{{ $meeting->meeting_url }}</a></p>
                            <p id="meetingCode">Meeting Code: {{ $meeting->meeting_code }}</p> <!-- Added ID here -->
                            <button id="copyButton" onclick="copyMeetingCode()" class="btn btn-primary">Copy Code</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
function copyMeetingCode() {
    // Select the meeting code text
    var meetingCode = document.getElementById("meetingCode").innerText.split(": ")[1]; // Get only the code part

    // Create a temporary textarea element to hold the meeting code
    var tempInput = document.createElement("textarea");
    tempInput.value = meetingCode; // Use the extracted code
    document.body.appendChild(tempInput);

    // Select the text in the temporary textarea
    tempInput.select();
    tempInput.setSelectionRange(0, 99999); // For mobile devices

    // Copy the text to the clipboard
    document.execCommand("copy");

    // Remove the temporary textarea from the document
    document.body.removeChild(tempInput);

    // Optional: Alert the user that the code has been copied
    alert("Join code copied: " + meetingCode);
}
</script>


@endsection
