
<!-- BEGIN CONTENT BODY -->
<div class="page-content">

    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))

        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
        @endforeach
    </div> <!-- end .flash-message -->

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">
                </i>Create Student
            </div>
        </div>
        <div class="portlet-body form" style="display: block;">
            <form class="form-horizontal" role="form" action="<?= url('student');?>" method="POST">
                <div class="form-body">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

                    <div class="form-group">
                        <div class="col-md-3">
                            <label>Username <span style="color: red;">*</span></label>
                        </div>
                        <div class="col-md-4">
                            <input required class="form-control input-sm" type="text" name="username" placeholder="Enter Student's Username" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3">
                            <label>Program <span style="color: red;">*</span></label>
                        </div>
                        <div class="col-md-4">
                            <select required name="program" id="semester" class="form-control input-sm" required>
                                <option value="">-- SELECT A PROGRAM --</option>
                                @foreach($programs as $program)
                                <option value="{{ $program['id'] }}">{{ $program['program_title_en'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3">
                            <label>Registration Code <span style="color: red;">*</span></label>
                        </div>
                        <div class="col-md-4">
                            <input required class="form-control input-sm" type="text" name="regCode" placeholder="Enter Student's Registration Code" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3">
                            <label>Student Code <span style="color: red;">*</span></label>
                        </div>
                        <div class="col-md-4">
                            <input required class="form-control input-sm" type="text" name="stdCode" placeholder="Enter Student's Code" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-3">
                            <label></label>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn green"> Create Student </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>