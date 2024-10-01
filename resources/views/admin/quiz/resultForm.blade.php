@extends('components.dashmaster')

@section('body')
<div class="content-wrapper custom-dashboard">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>Upload Quiz Result</h1>
                    </div>
                    <div class="card-body border p-4 rounded">
                        <form action="{{ route('admin.quizzes.uploadResults', $quiz->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="results" required>
                            <button type="submit">Upload Quiz Results</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>                    