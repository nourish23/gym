<div class="box box-info padding-1">
    <div class="box-body d-flex flex-column">
        <div class="d-flex mb-3">
            <div class="col-6 form-group me-2">
                {{ Form::label('title') }}
                {{ Form::text('title', $planClass->title, ['required' => 'required', 'class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title']) }}
                {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-6 form-group">
                {{ Form::label('Arabic title') }}
                {{ Form::text('title_ar', $planClass->getTranslation('title', 'ar', false), ['class' => 'form-control' . ($errors->has('title_ar') ? ' is-invalid' : ''), 'placeholder' => 'Arabic Title']) }}
                {!! $errors->first('title_ar', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="d-flex my-3">
            <div class="col-6 form-group me-2">
                {{ Form::label('description') }}
                {{ Form::textarea('description', $planClass->description, ['rows' => 3, 'required' => 'required', 'class' => 'form-control' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
                {!! $errors->first('description', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-6 form-group">
                {{ Form::label('Arabic description') }}
                {{ Form::textarea('description_ar', $planClass->getTranslation('description', 'ar', false), ['rows' => 3, 'class' => 'form-control' . ($errors->has('description_ar') ? ' is-invalid' : ''), 'placeholder' => 'Arabic Description']) }}
                {!! $errors->first('description_ar', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="d-flex my-3">
            <div class="col-6 form-group me-2 d-flex flex-column">
                {{ Form::label('coache ') }}
                {{ Form::select('coache_id', $coaches, $planClass->coache_id, ['required' => 'required', 'class' => 'form-control' . ($errors->has('coache_id') ? ' is-invalid' : ''), 'placeholder' => 'Coache ']) }}
                {!! $errors->first('coache_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-6 form-group">
                {{ Form::label('class_type') }}
                {{ Form::select('class_type', [1 => 'Recorded', 0 => 'Not-Recorded'], $planClass->class_type, ['required' => 'required', 'class' => 'form-control' . ($errors->has('class_type') ? ' is-invalid' : ''), 'placeholder' => 'Select ...']) }}
                {!! $errors->first('class_type', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="d-flex my-3">
            <div class="col-6 form-group ">
                {{ Form::label('burn_rate') }}
                {{ Form::text('burn_rate', $planClass->burn_rate, ['required' => 'required', 'class' => 'form-control' . ($errors->has('burn_rate') ? ' is-invalid' : ''), 'placeholder' => 'Burn Rate']) }}
                {!! $errors->first('burn_rate', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            {{-- <div class="col-6 form-group me-2" hidden>
                {{ Form::label('duration') }}
                {{ Form::input('datetime-local', 'duration', $planClass->duration, ['required' => 'required', 'class' => 'form-control' . ($errors->has('duration') ? ' is-invalid' : ''), 'placeholder' => 'Duration']) }}
                {!! $errors->first('duration', '<div class="invalid-feedback">:message</div>') !!}
            </div> --}}
        </div>
        <div class="d-flex my-3">
            <div class="col-6 form-group  d-flex flex-column">
                {{ Form::label('video') }}
                {{ Form::file('video_url', ['id' => 'video_url'], null, ['accept' => 'video/*', 'class' => 'form-control' . ($errors->has('video_url') ? ' is-invalid' : ''), 'placeholder' => 'Video Url']) }}
                {!! $errors->first('video_url', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="col-6 form-group  d-flex flex-column ">
                {{ Form::label('thumbnail ') }}
                {{ Form::file('thumbnail_url', null, ['accept' => 'image/*', 'class' => 'form-control mt-2' . ($errors->has('thumbnail_url') ? ' is-invalid' : ''), 'placeholder' => 'Thumbnail Url']) }}
                {!! $errors->first('thumbnail_url', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

        <div class="d-flex col-12 my-3">
            <div class="form-group col-6 me-2">
                <label for="equipment_id">Select Equipments</label>
                <select name="equipment_id[]" id="equipment_id" class="form-control" multiple>
                    @foreach ($equipments as $id => $equipment)
                        <option value="{{ $id }}">{{ $equipment }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-6 form-group me-2">
                {{ Form::label('status') }}
                {{ Form::select('status', [1 => 'Enable', 0 => 'Disable'], $planClass->status, ['required' => 'required', 'class' => 'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => 'Select ...']) }}
                {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}

            </div>
        </div>
    </div>
    <div class="box-footer mt-4 d-flex justify-content-end ">
        <a class="btn btn-secondary me-1" href="{{ route('planclasses.index') }}"> {{ __('Back') }}</a>
        <button type="submit" id="uploadButton" class="btn btn-primary">
            {{ __('Submit') }}
        </button>
        <div id="spinner" style="display: none;">
            <div class="spinner"></div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/aws-sdk/2.1053.0/aws-sdk.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        function formHandler(videoUrl = "") {
            const form = document.getElementById('plan_class_form');
            const formData = new FormData(form);

            formData.append('_token', (document.querySelector(
                'meta[name="csrf-token"]')).getAttribute('content'));
            formData.append('title', (document.querySelector('input[name="title"]'))
                .value);
            formData.append('title_ar', (document.querySelector(
                'input[name="title_ar"]')).value);
            formData.append('description', (document.querySelector(
                'textarea[name="description"]')).value);
            formData.append('description_ar', (document.querySelector(
                'textarea[name="description_ar"]')).value);
            formData.append('coache_id', (document.querySelector(
                'select[name="coache_id"]').value));
            formData.append('class_type', (document.querySelector(
                'select[name="class_type"]')).value);
            formData.append('burn_rate', (document.querySelector(
                'input[name="burn_rate"]')).value);
            formData.append('status', (document.querySelector('select[name="status"]')).value);
            formData.append('equipment_id[]', Array.from(document.querySelector('#equipment_id').selectedOptions).map(option => option.value));
            formData.append('thumbnail_url', (document.querySelector('input[name="thumbnail_url"]')).files[0]);
            formData.append('link', videoUrl == "" ? "{{ $planClass->video_url }}" : videoUrl);


            if (window.location.pathname.includes("create"))
                var url = "/admin/planclasses";
            else {
                formData.append('_method', "PUT");
                var url = "/admin/planclasses/{{ $planClass->id }}";
            }

            // Send form data to the backend
            fetch(window.location.origin + url, {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    window.location.href = "{{ route('planclasses.index') }}"
                    if (response.ok) {
                        
                    } else {
                        console.error('Error sending form data to the backend:',
                            response.statusText);
                    }
                })
                .catch(error => {
                    console.error('Network error:', error);
                });
        }

        // Configure AWS credentials and region
        AWS.config.update({
            accessKeyId: '{{ env('AWS_ACCESS_KEY_ID') }}',
            secretAccessKey: '{{ env('AWS_SECRET_ACCESS_KEY') }}',
            region: '{{ env('AWS_DEFAULT_REGION') }}',
        });

        // Create an S3 instance
        const s3 = new AWS.S3({
            params: {
                Bucket: '{{ env('AWS_BUCKET') }}',
                ResponseContentDisposition: 'inline'
            },
            httpOptions: {
                timeout: -1
            },
            region: '{{ env('AWS_DEFAULT_REGION') }}',
            'ACL': 'public-read',

        });

        // Get references to the input element and button
        const fileInput = document.getElementById('video_url');
        const uploadButton = document.getElementById('uploadButton');
        const spinner = document.getElementById('spinner');
 
        uploadButton.addEventListener('click', function(event) {
            event.preventDefault();

            if (fileInput.files.length !== 0) {
                const file = fileInput.files[0];
                let fileName = file.name.replace(/\s+/g, '_');

                const bucketName = '{{ env('AWS_BUCKET') }}';
                const key = 'uploads/' + fileName;

                uploadButton.disabled = true;
                spinner.style.display = 'block';
 
                const params = {
                    Bucket: bucketName,
                    Key: key,
                    Body: file,
                };

                s3.upload(params, (err, data) => {
                    if (err) {
                        console.error('Error uploading file:', err);
                    } else {
                        console.log("success");
                        formHandler(data.Location)
                    }
                });
            } else {
                formHandler()
            }
        });
    });
</script>
