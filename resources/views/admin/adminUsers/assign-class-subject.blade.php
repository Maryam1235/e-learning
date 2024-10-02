{{-- @extends('components.dashmaster')
@section('body')

  <div class="content-wrapper custom-dashboard">
    <div class="form-container">
<h3>Assign Class and Subject to {{ $teacher->name }}</h3>

<form method="POST" action="{{ route('adminUsers.store-class-subject-assign', $teacher->id) }}">
    @csrf

        <!-- Select Class -->
        <div class="form-group">
            <label for="class_id">Select Class</label>
            <select name="class_id" id="class_id" class="form-control" required>
                <option value="">Select Class</option>
                @foreach($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
            @error('class_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Subject Dropdown -->
        <div class="form-group">
            <label for="subject_id">Select Subject</label>
            <select name="subject_id" id="subject_id" class="form-control" required>
                <option value="">Select Subject</option>
            </select>
            @error('subject_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

    <button type="submit" class="btn btn-primary">Assign Class and Subject</button>
</form>
  </div>
  </div>


  <script>
    document.getElementById('class_id').addEventListener('change', function() {
    const classId = this.value;
    
    // Fetch subjects based on the selected class
    fetch(`/admin/get-subjects/${classId}`)
        .then(response => response.json())
        .then(data => {
            const subjectSelect = document.getElementById('subject_id');
            subjectSelect.innerHTML = '<option value="">Select Subject</option>'; // Reset the dropdown

            // Populate the subjects dropdown
            data.forEach(subject => {
                const option = document.createElement('option');
                option.value = subject.id;
                option.textContent = subject.name;
                subjectSelect.appendChild(option);
            });
        })
        .catch(error => console.error('Error fetching subjects:', error));
});

    </script>
@endsection --}}

@extends('components.dashmaster')
@section('body')

<div class="content-wrapper custom-dashboard">
 <div class="Apadding-c"> 
    <div class="form-container">
        <h3>Assign Class and Subject to {{ $teacher->name }}</h3>

        <form method="POST" action="{{ route('adminUsers.store-class-subject-assign', $teacher->id) }}">
            @csrf

            <div id="class-subject-container">
                <div class="class-subject-pair">
                    <!-- Select Class -->
                    <div class="form-group">
                        <label for="class_id">Select Class</label>
                        <select name="classes[]" class="form-control class-select" required>
                            <option value="">Select Class</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                        </select>
                        @error('classes.*')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Subject Dropdown -->
                    <div class="form-group">
                        <label for="subject_id">Select Subject</label>
                        <select name="subjects[]" class="form-control subject-select" required>
                            <option value="">Select Subject</option>
                        </select>
                        @error('subjects.*')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="button" class="btn btn-secondary add-class-subject">Add Class</button>
            <button type="submit" class="btn btn-primary">Assign Class</button>
        </form>
    </div>
    </div>
</div>

<script>
    // Fetch subjects when the class is selected
    document.addEventListener('change', function(event) {
        if (event.target.classList.contains('class-select')) {
            const classId = event.target.value;
            const subjectSelect = event.target.closest('.class-subject-pair').querySelector('.subject-select');

            // Fetch subjects based on the selected class
            fetch(`/admin/get-subjects/${classId}`)
                .then(response => response.json())
                .then(data => {
                    subjectSelect.innerHTML = '<option value="">Select Subject</option>'; // Reset the dropdown
                    data.forEach(subject => {
                        const option = document.createElement('option');
                        option.value = subject.id;
                        option.textContent = subject.name;
                        subjectSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching subjects:', error));
        }
    });

    // Add another class-subject pair
    document.querySelector('.add-class-subject').addEventListener('click', function() {
        const newClassSubjectPair = document.querySelector('.class-subject-pair').cloneNode(true);
        newClassSubjectPair.querySelector('.class-select').value = ''; // Clear the class selection
        newClassSubjectPair.querySelector('.subject-select').innerHTML = '<option value="">Select Subject</option>'; // Reset subjects
        document.getElementById('class-subject-container').appendChild(newClassSubjectPair);
    });
</script>
@endsection
